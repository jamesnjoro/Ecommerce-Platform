<?php
include('common.php');
include("config.php");

if(isset($_POST['ProductN']) &&
isset($_POST['ProductC']) &&
isset($_POST['ProductS']) &&
isset($_POST['ProductA']) &&
isset($_POST['ProductP']) &&
isset($_POST['ProductD']) &&
isset($_POST['ProductSi']) &&
isset($_POST['ProductQ'])){
    
    $name = $_POST['ProductN'];
    $category = $_POST['ProductC'];
    $sub = $_POST['ProductS'];
    $feature = $_POST['ProductF'];
    $age = $_POST['ProductA'];
    $keyword = $_POST['ProductK'];

    $sql = 'INSERT INTO products (productName,category,subcategory,features,keywords,age,active)
    VALUES("'. $name. '","' . $category. '","' . $sub .'","' . $feature . '","' . $keyword . '","' . $age . '","yes")';
    $message = 'product created';

    if($conn->query($sql)===TRUE){
        writelog("product created");
        $Prid = mysqli_insert_id($conn);
        writelog($Prid);
    }else{
        writelog('product creation failed :' . $conn->error);
        header("location:../index.php?status=2&message=".$conn->error."");
    }

    $prices = $_POST['ProductP'];
    $sizes = $_POST['ProductSi'];
    $colors = $_POST['ProductCo'];
    $quantities = $_POST['ProductQ'];
    $index = 0;


    foreach($prices as $price){
        $discount = (isset($_POST['ProductD']))? (int) $_POST['ProductD'][$index] : 0;
        $size = $sizes[$index];
        $color = $colors[$index];
        $quantity = (int) $quantities[$index];
        

        $sql = 'INSERT INTO Subproducts (productID,price,size,color,quantity,discount)
        VALUES ("'.$Prid.'","'.(int) $price.'","'.$size.'","'.$color.'","'.$quantity.'","'.$discount.'")';

        if($conn->query($sql)===TRUE){
            writelog("subproduct saved");
            $pictureID = mysqli_insert_id($conn);
        }else{
            writelog("subproduct failed to create" . $conn->error);
            header("location:../index.php? status=2&message=".$conn->error."");
        }
        echo $index;

        if(isset($_FILES['file'.$index.''])){
            $photos = rearrange($_FILES['file'.$index.'']);          
            $fileerrors = array(
                0 => 'Success',
                1 => 'File too large',
                2 => 'File too large as per html form',
                3 => 'File partially uploaded',
                4 => 'No file',
                6 => 'Missing a temporary folder',
                7 => 'Unable to write file  to disk',
                8 => 'Extension error'
            );
    
            for($i=0;$i<count($photos);$i++){
                if($photos[$i]['error']){
                     writelog($photos[$i]['name']. '-' .$fileerrors[$photos[$i]['error']]);
                     header("location:index.php? status=2&message=".$fileerrors[$photos[$i]['error']]."");
                 }else{
                    $allow = array('jpg','jpeg','png','gif');
                    $exte = explode('.', $photos[$i]['name']);
                    $ext = end($exte);
                    if(!in_array($ext,$allow)){
                        writelog($photos[$i]['name'].'Does not have the required extension');
                        header("location:../index.php?status=2&message=some files dont have the required extention");
                    }else{
    
                    $nameT = microtime() ;
                    $nameT1 = explode(" ",$nameT) ;
                    $exte = explode('.', $photos[$i]['name']);
                    $ext = end($exte);
                    $name = end($nameT1) .$i . '.' . $ext;
                    move_uploaded_file($photos[$i]['tmp_name'],"../photos/".$name);
                    writelog($photos[$i]['name']. "had been saved");
    
                    $sql = 'INSERT INTO photos(productID,photopath)
                     VALUES("'.$pictureID . '","' . $name .'")';
    
                    if($conn->query($sql)===TRUE){
                        writelog("photo succesfully saved");
                        header("location:../index.php?status=1&message=Product successfully saved");
                    }else{
                        writelog("photo not saved" . $conn->error);
                        header("location:../index.php?status=2&message = ".$conn->error."");
                    }
                   
                }
            }
    
        }
    }else{
            echo 'no photo selected';
          
            
                
            
        }
        $index++;
    }




    

}else{
    echo "boos shit happened";
    
}

function rearrange($files){
    $file2 = array();
    $count = count($files['name']);
    $keys = array_keys($files);

    for($i=0;$i<$count;$i++){
        foreach($keys as $key){
            $file2[$i][$key] = $files[$key][$i];
        }
    }

    return $file2;
}



?>