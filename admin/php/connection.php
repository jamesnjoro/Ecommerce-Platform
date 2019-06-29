<?php

include("common.php");


function query($sql,$message){

    include('config.php');

  if($conn->query($sql)=== TRUE){
          writelog($message." sucessfull");
          $message = 1;
          return $message;
      }else{
          writelog($message." failed:".$conn->error);
          $message= $conn->error;
          return $message;
      }

      $conn->close();
      writelog("Connection Closed");
  }

  

  
?>