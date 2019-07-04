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
                <a href="#home">Home</a>
                <a href="#products">Products</a>
                <a href="#contactsus">Contact us</a>
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
                            <li><a href="login/logout.php">Logout</a></li>
                        </ul>';
                    }else{
                        echo '<span> <a href="login/">Login</a></span>';
                    }
                ?>



                
                
                </div>
                
            </div>
        </div>
        <div class="bottomNav">
           <div><i class="fas fa-home"></i><span><br> <a href="#home">Home</a> </span></div> 
            <div><i class="fas fa-shopping-bag"></i><span><br> <a href="#products">Products</a> </span></div>
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
    
        <div class="container">
            <div class="prod">
                <div class="image">
                    <img src="../admin/photos/todo.png" alt="">
                </div>
                <div class="detail">
                    <div class="name"><b>Italian shoe</b></div>
                    <div class="description">Its is a type of made for.</div>
                    <div class="price">1500</div>
                    <div><a href="">add to cart</a></div>
                </div>
            </div>
        </div>

</body>
</html>