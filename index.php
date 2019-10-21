<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Groundz clothes</title>
    <link rel="stylesheet" href="awesomefont/css/all.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Next Collections</title>
</head>
<body>
    <header>
        <div class="navbar">
            <span id="logo">
                <img src="admin/photos/logo.png" alt="">
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
                            <li><a href="login/logout.php">Logout</a></li>
                        </ul>';
                    }else{
                        echo '<span> <a href="login/index.php">Login</a></span>';
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
            <div><i class="fas fa-user"></i><span><br>
            <?php
                    

                    if(isset($_SESSION['email'])){
                        echo '<span><a href="login/logout.php">Logout</a></span>';
                      
                    }else{
                        echo '<span> <a href="login/index.php">Login</a></span>';
                    }
                ?>
        
        
        
        </span></div>
        </div>
    </header >
        <div class="carosel" id="home">
        <div class="picture">
                <img id='pic' src="admin/photos/girl.png" alt="">
            </div>
            <div class="text">
                <span><h3>Get best value for money.</h3></span>
                <span ><h1><br>To Look Good Is To Feel Good</h1></span>
            </div>
            
        </div>
        <div class="container" id="products">
            <div class="mainC">
                <div class="categories">
                    <div>
                        <a id="tongle" class="click" onclick="expandT()"><i class="fas fa-ellipsis-v"></i></a>
                    </div>
                    <div>
                        <a href=""class="others" id="all">All</a>
                        
                        <?php
                            include("admin/php/common.php");
                            include("admin/php/config.php");
                            $sql = "SELECT * FROM categories";

                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo '<a href="" class="others" id='.$row["Name"].'>'.$row["Name"].'</a>';
                                }
                            }
                        ?>
                        
                    </div>
                    
                </div>
            </div>
            
            <div class="products" id="product">
                
            </div>
            
        </div>

        

        <footer id="contactsus">
          <div class="wrapper">
                <div class="social">
                    <ul>
                        <li><a href=""><i class="fab fa-facebook"></i></a></li>
                        <li><a href=""><i class="fab fa-instagram"></i></a></li>
                        <li><a href=""><i class="fab fa-twitter"></i></a></li>
                        <li><a href=""><i class="fab fa-whatsapp"></i></a></li>
                    </ul>
                </div>
                <div class="contact">
                    
                        <span>07********</span>
                        <span>test@gmail.com</span>
                        <span>xxxx, lenana road</span>
                    
                </div>
                <div class="reg">
                    <span>&reg Next Collections</span>
                </div>
          </div>
        </footer>
    <script src="admin/js/jquery.js"></script>      
   <script src="js/main.js"></script> 
</body>
</html>