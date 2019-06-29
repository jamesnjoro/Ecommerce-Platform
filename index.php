<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Groundz clothes</title>
    <link rel="stylesheet" href="awesomefont/css/all.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="navbar">
            <span id="logo">
                <img src="admin/photos/todo.png" alt="">
            </span>
            <nav >
                <a href="#home">Home</a>
                <a href="#products">Products</a>
                <a href="#contactsus">Contact us</a>
            </nav>
            <div id="user">
                <div><i class="fas fa-shopping-cart"><span id='num'>5</span> </i><span>Cart</span></div>
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
            <div><i class="fas fa-shopping-cart"><span id='num'>5</span></i><span><br>Cart</span>  </div>
            <div><i class="fas fa-user"></i><span><br>User</span></div>
        </div>
    </header >
        <div class="carosel" id="home">
            <div class="text">
                <span><h3>To Look Good Is To Feel Good</h3></span>
                <span><h1>To Look Good Is To Feel Good</h1></span>
            </div>
            <div class="picture">
                <img src="admin/photos/todo.png" alt="">
            </div>
        </div>
        <div class="container" id="products">
            <div class="mainC">
                <div class="categories">
                    <div>
                        <a id="tongle" class="click" onclick="expandT()"><i class="fas fa-ellipsis-v"></i></a>
                    </div>
                    <div>
                        <a href="" class="others">All</a>
                        <a href="" class="others">Shoes</a>
                        <a href="" class="others">Trousers</a>
                        <a href="" class="others">Shirts</a>
                        
                    </div>
                    
                </div>
                <div class="sub">
                    <span>Age<i class="fas fa-caret-down"></i></i></span>
                    <span>Sex<i class="fas fa-caret-down"></i></span>
                </div>
            </div>
            
            <div class="products">
                <ul>
                <?php
                     include("admin/php/common.php");
                     include("admin/php/config.php");
                     $sql = "SELECT * FROM products";
                     
       
                     $results = $conn->query($sql);
                     
       
                     if($results->num_rows > 0){
                         while($row = $results->fetch_assoc()){
                             $photoId = $row['pictureID'];
                           $sql2 = "SELECT * FROM photos WHERE productID ='".$photoId."'";
                           $results2 = $conn->query($sql2);
                             if($results2->num_rows>0){
                                 while($row2 = $results2->fetch_assoc()){
                                     $pic = $row2['photopath'];
                                     break;
                                 }
                             }
                           echo "<li>
                           <img src='admin/photos/". $pic ."'>
                           <span id='Pname'>".$row['productName']."</span>
                           <span id='Pprice'>".$row['price']."</span>
                           <a>Add to Cart</a>
                       </li>";
                         }
                     }else{
                         echo "no results";
                     }
       
                         $conn->close();
                         writelog("Connection Closed");

                ?>
                </ul>
            </div>
            <div class="products">
                <span><h1>Hot Products</h1></span>
                <ul>
                <?php
                     
                     include("admin/php/config.php");
                   
                     $sql = "SELECT * FROM products";
                     
       
                     $results = $conn->query($sql);
                     
       
                     if($results->num_rows > 0){
                         while($row = $results->fetch_assoc()){
                             $photoId = $row['pictureID'];
                           $sql2 = "SELECT * FROM photos WHERE productID ='".$photoId."'";
                           $results2 = $conn->query($sql2);
                             if($results2->num_rows>0){
                                 while($row2 = $results2->fetch_assoc()){
                                     $pic = $row2['photopath'];
                                     break;
                                 }
                             }
                           echo "<li>
                           <img src='admin/photos/". $pic ."'>
                           <span id='Pname'>".$row['productName']."</span>
                           <span id='Pprice'>".$row['price']."</span>
                           <a>Add to Cart</a>
                       </li>";
                         }
                     }else{
                         echo "no results";
                     }
       
                         $conn->close();
                         writelog("Connection Closed");

                ?>
                </ul>
            </div>
        </div>
        <footer id="contactsus">
            <div id="contacts">

            </div>
            <div id="socialM">

            </div>
            <div id="location">

            </div>
        </footer>
   <script src="js/main.js"></script> 
</body>
</html>