<?php

include("connection.php");

if(isset($_POST['ProductN']) &&
isset($_POST['ProductC']) &&
isset($_POST['ProductS']) &&
isset($_POST['ProductG']) &&
isset($_POST['ProductP']) &&
isset($_POST['ProductD']) &&
isset($_POST['ProductSi']) &&
isset($_POST['ProductQ']) &&
isset($_POST['ProductK'])){
    
    $name = $_POST['ProductN'];
    $category = $_POST['ProductC'];
    $sub = $_POST['ProductS'];
    $gender = $_POST['ProductG'];
    $discount = (int)$_POST['ProductD'];
    $price = (int)$_POST['ProductP'];
    $size =(int)$_POST['ProductSi'];
    $quantity =(int) $_POST['ProductQ'];
    $keyword = $_POST['ProductK'];
    $id = microtime();
    $id2 = explode(" ",$id);
    $pictureID = end($id2);

    $sql = 'INSERT INTO products (productName,category,subcategory,price,size,age,quantity,keyword,discount,pictureID)
    VALUES("'. $name. '","' . $category. '","' . $sub .'","' . $price .'","' .$size. '","' . $gender . '","' . $quantity . '","' . $keyword . '","' .$discount. '","' . $pictureID .'")';
    $message = 'product created';

    query($sql,$message);

    if(isset($_FILES['files'])){
        $photos = rearrange($_FILES['files']);
        
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
             }else{
                $allow = array('jpg','jpeg','png','gif');
                $exte = explode('.', $photos[$i]['name']);
                $ext = end($exte);
                if(!in_array($ext,$allow)){
                    writelog($photos[$i]['name'].'Does not have the required extension');
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

                query($sql,"Photo saved and uploaded");
                header('Location: ../index.php');
             
            }
        }

    }
}else{
        echo 'no photo selected';
        header('Location: ../index.php');
        
            
        
    }

    

}else{
    echo "boos shit happened";
    header('Location: ../index.php');
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