<?php
    $response = array();
    if(isset($_POST['hidden_id'])){
        if(isset($_COOKIE['shoppingCart'])){
            $cookieCart = stripslashes($_COOKIE['shoppingCart']);
            $cart = json_decode($cookieCart);
        }else{
            $cart = array();
        }
    
        $list = array_column($cart , 'id');
       
       
        if(in_array($_POST['hidden_id'], $list)){
            $message = "item already added";
        }else{
            $items = array(
                'id' => $_POST['hidden_id'],
                'name' => $_POST['hidden_name'],
                'price' => $_POST['hidden_price'],
                'pic' => $_POST['hidden_pic'],
                'quantity' => 1
    
            );
            $cart[] = $items;
            $message = "item added";
        }
       
      
        $cartData = json_encode($cart);
        setcookie('shoppingCart', $cartData, time()+(86400 * 30),'/');
        $itemNumber = count($cart);
        setcookie('itemsNum', $itemNumber,time()+(86400 * 30),'/');
        $response = array(
            'one'=>$message,
            'two'=>$itemNumber
        );
        

        echo json_encode($response);
       

    }

    if(isset($_GET['action'])){
        if($_GET['action']== 'delete'){
            echo "processing";
            $sCart =stripslashes($_COOKIE['shoppingCart']);
            $cCart = json_decode($sCart,true);
            
            foreach($cCart as $key => $value){
                if($cCart[$key]['id']==$_GET['id']){
                    unset($cCart[$key]);
                    $item = json_encode($cCart);
                    $count = count($cCart);
                    setcookie('itemsNum', $count,time()+(86400 * 30),'/');
                    setcookie('shoppingCart',$item,time()+(86400 * 30),'/');
                    header('location:index.php');
                }
            }
        }
    }

    if(isset($_GET['action'])){
        if($_GET['action']=='update'){
            $cookCart = stripslashes($_COOKIE['shoppingCart']);
            $cookieCart = json_decode($cookCart,true);
            foreach($cookieCart as $keys => $values){
                if($cookieCart[$keys]['id']== $_GET['id']){
                    $cookieCart[$keys]['quantity']= $_GET['quantity'];
                    $item = json_encode($cookieCart);
                    setcookie('shoppingCart',$item,time()+(86400 * 30),'/');
                }
            }
        
        }
    }


    if(isset($_POST['phone'])){
        $phone = $_POST['phone'];
        $county = $_POST['county'];
        $subcounty = $_POST['subcounty'];
        $city = $_POST['city'];
        $address = $_POST['Address'];
        $status = "Being Processed";
        include('../admin/php/common.php');
        include('../admin/php/config.php');
        session_start();
        $email = $_SESSION['email'];
       
       
        $final = stripslashes($_COOKIE['shoppingCart']);
        $finalcart = json_decode($final,true);
        $amount = 0;
        

        $prod = $conn->query("SELECT * FROM products");
        while($row = $prod->fetch_assoc()){
        foreach($finalcart as $keys => $value){
                if($row['id']== $value['id']){
                    $amount = $amount + ($row['price'] * $value['quantity']);
                }
                else{
                   
                }
            }
        }
        

        $sql = 'INSERT INTO orders (phone,email,county,subcounty,city,address,status,amount) VALUES
        ("'.$phone.'","'.$email.'","'.$county.'","'.$subcounty.'","'.$city.'","'.$address.'","'.$status.'","'.$amount.'")';
        
      
        
        if($conn->query($sql)=== true){
            echo  "successfully saved";
        }else{
            echo $conn->error;
        }
        
        $id = mysqli_insert_id($conn);
        foreach($finalcart as $keys => $values){
            $sql = "INSERT INTO suborders (orderID,productID,quantity)
            VALUES('".$id."','".$values['id']."','".$values['quantity']."')";
            if($conn->query($sql)===true){
                echo 'sueccesful';
            }else{
                echo $conn->error;
            }
        }
        echo 'everything a okay';
        setcookie('shoppingCart','non',time()-3600,'/');
        $conn->close();
        

    }
?>