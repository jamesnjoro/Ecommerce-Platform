<?php
if(isset($_GET['id'])){


include('../php/common.php');
include('../php/config.php');
$output = '<form action="update.php" method="POST" enctype="multipart/form-data" >
<input type="file" onchange="upload(this.files[0])" id="photo">
';
$output .= '<input type="hidden" name="subid" id="subid" value="'.$_GET['id'].'"></form>';
$output .= '<div id ="photoView">';
$sql ="SELECT * FROM photos WHERE productID='".$_GET['id']."'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    $output.='<div class="holder">
    <i class="fas fa-trash-alt del" id="'.$row["id"].'"></i>
    <img src="../photos/'.$row["photopath"].'"/>
    </div>';
}
$output .= '</div>';

echo $output;
}
?>