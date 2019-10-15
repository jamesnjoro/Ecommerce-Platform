<?php
include('../php/common.php');
include('../php/config.php');
if(isset($_GET['action'])){
    if($_GET['action']=='delete'){
$sql = 'SELECT * FROM photos WHERE id="'.$_GET['id'].'"';
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    unlink('../photos/'.$row['photopath']);
}
$sql = 'DELETE FROM photos WHERE id="'.$_GET['id'].'"';
if($conn->query($sql)=== true){
    writelog('delete successful');
}else{
    writelog('delete failed' . $conn->error());
}
}
}

if(isset($_FILES['files'])){
        $file = $_FILES['files'];
        $allow = array('jpg','jpeg','png','gif');
        $exte = explode('.', $file['name']);
        $ext = end($exte);
        if(!in_array($ext,$allow)){
            writelog($photos[$i]['name'].'Does not have the required extension');
                    }
        else{
            $nameT = microtime() ;
                    $nameT1 = explode(" ",$nameT) ;
                    $exte = explode('.', $file['name']);
                    $ext = end($exte);
                    $name = end($nameT1) .rand(10,100) . '.' . $ext;
                    move_uploaded_file($file['tmp_name'],"../photos/".$name);
                    writelog($file['name']. "had been saved");
    
                    $sql = 'INSERT INTO photos(productID,photopath)
                     VALUES("'.$_POST['subid'] . '","' . $name .'")';
    
                    if($conn->query($sql)===TRUE){
                        writelog("photo succesfully saved");
                    }else{
                        writelog("photo not saved" . $conn->error);
                    }
                    }
    }
 if(isset($_POST['id'])){
     $id = $_POST['id'];
     $productName= $_POST['Pname'];
     $category= $_POST['category'];
     $subcategory= $_POST['subcategory'];
     $age= $_POST['age'];
     $active= $_POST['active'];

     $sql = 'UPDATE products 
     SET productName="'.$productName.'",category="'.$category.'",subcategory="'.$subcategory.'",age="'.$age.'",active="'.$active.'"
      WHERE id="'.$id.'" ';

      if($conn->query($sql)=== true){
          writelog('update succesful');
      }else{
          writelog('update failed '. $conn->error);
      }

      $sid = $_POST['sid'];
      $price= $_POST['ProductP'];
      $size=$_POST['ProductSi'];
      $color=$_POST['ProductCo'];
      $quantity=$_POST['ProductQ'];
      $discount=$_POST['ProductD'];
      $index = 0;
      foreach($sid as $sub){
        $sql = 'UPDATE Subproducts 
        SET price="'.$price[$index].'",size="'.$size[$index].'",color="'.$color[$index].'",quantity="'.$quantity[$index].'",discount="'.$discount[$index].'" 
        WHERE id="'.$sub.'"';

        if($conn->query($sql)=== true){
            writelog('update succesful');
        }else{
            writelog('update failed '. $conn->error);
        }

        $index++;
      }
 }

?>