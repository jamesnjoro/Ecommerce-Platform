<?php

include("common.php");


function query($sql,$message){

  $servername = "localhost";
  $user = "root";
  $password = 'password';
  $Dbname = 'EcommercePlatform';

  $conn = new mysqli($servername, $user, $password, $Dbname);

  if($conn->connect_error){
      writelog("Connection failed:" . $conn->connect_error);
  }else{
      writelog("connection Successful");
  }

  if($conn->query($sql)=== TRUE){
          writelog($message." sucessfull");
      }else{
          writelog($message." failed:".$conn->error);
      }

      $conn->close();
      writelog("Connection Closed");
  }

  
?>