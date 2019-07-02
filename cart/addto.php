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
                'pic' => $_POST['hidden_pic']
    
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
       

    }else{
        echo "something went wrong";
    }
?>