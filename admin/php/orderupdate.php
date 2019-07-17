<?php
include('common.php');
include('config.php');


if(isset($_GET['action'])){
    if($_GET['action'] == 'updateStatus'){
        
        $sql ='UPDATE orders
        SET status ="'.$_GET['status'].'"
        WHERE id="'.$_GET['id'].'"';

        if($conn->query($sql)===true){
            echo "success";
        }else{
            echo "failure";
        }
        
        echo "everything okay";
    }

    
}
?>