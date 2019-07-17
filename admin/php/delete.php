<?php
    if(isset($_GET['action'])){
        if($_GET['action']=='deleteProduct'){
            include('common.php');
            include('config.php');

            $sql = 'DELETE FROM products WHERE id = "'.$_GET['id'].'"';
            $conn->query($sql);
            
        }
    }
?>