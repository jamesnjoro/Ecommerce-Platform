<?php
$servername = "localhost";
  $user = "root";
  $password = 'password';
  $Dbname = 'EcommercePlatform';

  $conn = new mysqli($servername, $user, $password, $Dbname);

  if($conn->connect_error){
      writelog("Connection failed:" . $conn->connect_error);
      die();
  }else{
      writelog("connection Successful");
      
  }
  ?>