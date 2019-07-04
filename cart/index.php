<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="../awesomefont/css/all.css">
</head>
<body>
<header>
        <div class="navbar">
            <span id="logo">
                <img src="../admin/photos/logo.png" alt="">
            </span>
            <nav >
                <a href="../index.php">Home</a>
                <a href="../index.php#products">Products</a>
                <a href="../index.php#contactsus">Contact us</a>
            </nav>
            <div class="cartT" id="user">
                <div><i class="fas fa-shopping-cart"><span id="hes" class='num'>
                <?php
                    if(isset($_COOKIE['shoppingCart'])){
                        echo $_COOKIE['itemsNum'];
                    }else{
                        
                    }
                ?>
                
                </span> </i><span><a class="cartbtn">Cart</a></span></div>
                <div id="t">
                
                <?php
                    session_start();

                    if(isset($_SESSION['email'])){
                        echo '<span>'.$_SESSION['user'].'</span><i class="fas fa-caret-down" style="font-size: 10px;padding-left: 5px;"></i></i>
                        <ul id="c">
                            <li>View Orders</li>
                            <li><a href="../admin/login/logout.php">Logout</a></li>
                        </ul>';
                    }else{
                        echo '<span> <a href="../admin/login/">Login</a></span>';
                    }
                ?>



                
                
                </div>
                
            </div>
        </div>
        <div class="bottomNav">
           <div><i class="fas fa-home"></i><span><br> <a href="../index.php">Home</a> </span></div> 
            <div><i class="fas fa-shopping-bag"></i><span><br> <a href="../index.php#products">Products</a> </span></div>
            <div class='cartT'><i class="fas fa-shopping-cart"><span id="hesab" class='num' >
            <?php
                    if(isset($_COOKIE['itemsNum'])){
                        echo $_COOKIE['itemsNum'];
                    }else{
                        
                    }
                ?>
            </span></i><span><br><a class="cartbtn">Cart</a></span>  </div>
            <div><i class="fas fa-user"></i><span><br>User</span></div>
        </div>
    </header >

    <div class="cart">

    <?php
if(isset($_COOKIE['shoppingCart'])){
    ?>
    <div id="h" class="grid">
        <span>Item</span>
        <span>Price</span>
        <span>Quantity</span>
    </div>

    <?php
    $Ca = stripslashes($_COOKIE['shoppingCart']);
    $c = json_decode($Ca,true); 
    foreach($c as $keys => $values){
    $name = $values['name'];
    $pic = $values['pic'];
    $price = $values['price'];
    $id = $values['id'];
?>


    <div class="grid">
        <div>
            <span class="pic"><img src="../admin/photos/<?php echo $pic;?>"></span>
            <span class="name"><?php echo $name;?></span>
        </div>
        <div class="p"><?php echo $price;?></div>
        <div>
        <select onchange="sum()" name="Quantity" class="quantity">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select> 
        </div>
        <input type="hidden" name="id" class="id" value="<?php echo $id;?>">
        <div class="del"><a href="addto.php?action=delete&id=<?php echo $id;?>">&times</a></div>
        
        
    </div>
       


    <?php } 


?> 
            <div class="total">
            <span><b>Totals</b>:</span>
            <span ><b id="value">12343445</b></span>
            <div id="dis">shipping fees not included</div>
            </div>
  
            <a id="check" href="checkout.php"> checkout</a>
<?php
}else{
echo "<span style='text-align:center;'>No items have been added to cart<span>";
}
?>
</div>
<script src="../js/jquery.js"></script>
<script src="main.js"></script>
</body>
</html>