<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="../awesomefont/css/all.css">
    <link href="src/jquery.exzoom.css" rel="stylesheet">
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
                <div class="exzoom" id="exzoom">
                    <!-- Images -->
                    <div class="exzoom_img_box">
                        <ul class='exzoom_img_ul'>
                    <?php

                    if(isset($_GET['id'])){

                    
                        include("../admin/php/common.php");
                        include("../admin/php/config.php");
                        

                        $sql = "SELECT * FROM products WHERE id=".$_GET['id'];
                        $results = $conn->query($sql);
                        if($results->num_rows>0){
                            while($row = $results->fetch_assoc()){
                                $ProductId = $row['id'];
                                $ProductName = $row['productName'];
                                if(isset($_GET['subId'])){
                                    $sql3 = "SELECT * FROM Subproducts WHERE productID ='".$ProductId."'";
                                    $results3 = $conn->query($sql3);
                                    if($results3->num_rows > 0){
                                        while($row3 = $results3->fetch_assoc()){
                                            if($row3['id'] == $_GET['subId']){
                                            $photoId = $row3['id'];
                                            $price = $row3['price'];
                                            }
                                            
                                }
                                    }
                                    

                                }else{
                                    $sql3 = "SELECT * FROM Subproducts WHERE productID ='".$ProductId."'LIMIT 0,1 ";
                                    $results3 = $conn->query($sql3);
                                    if($results3->num_rows > 0){
                                    while($row3 = $results3->fetch_assoc()){
                                        $photoId = $row3['id'];
                                        $price = $row3['price'];
                                       
                            }
                                }
                                
                        }
                        $sql2 = "SELECT * FROM photos WHERE productID ='".$photoId."'";
                        $results2 = $conn->query($sql2);
                          if($results2->num_rows>0){
                              while($row2 = $results2->fetch_assoc()){
                                  $pic = $row2['photopath'];

                                  ?>
                                    <li><img src="../admin/photos/<?php echo $pic;?>"/></li>
                                  <?php

                              }
                          }
                          

                        
                    ?>
                        
                       



                        <?php
                          }
                        }
                        ?>
                        </ul>
  </div>
  <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->
  <div class="exzoom_nav"></div>
  <!-- Nav Buttons -->
  <p class="exzoom_btn">
      <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
      <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
  </p>
</div>
                </div>
                <div class="detail">
                    <div class="name" id="<?php echo $_GET['id'];?>"><b><?php echo $ProductName?></b></div>
                    <div class="price"><?php echo $price?></div>
                    <div class="change">

                    
        <?php
            $sql = "SELECT * FROM Subproducts WHERE productID ='".$_GET['id']."'";
            $subs = $conn->query($sql);
            if($subs->num_rows>0){
                $size[] = array();
                $color[] = array();
                $x = 0;
                while($row4 = $subs->fetch_assoc()){
                    $s = $row4['size'];
                    $c = $row4['color'];
                    if(!in_array($s,$size)){
                        $size[$x] = $row4['size'];
                    }
                    if(!in_array($c,$color)){
                        $color[$x] = $row4['color'];
                    }
                    $x++;
                }
            }
        ?>
        <div class="size">
            <select class="ch">
                <?php
                for($i=0;$i<sizeof($size);$i++){
                    if($i+1 == $_GET['subId']){
                        echo '<option  selected value="'.$size[$i].'">'.$size[$i].'</option>';
                    }else{
                        echo '<option  value="'.$size[$i].'">'.$size[$i].'</option>';
                    }
                  
                }
                ?>
            </select>
        </div>
        <div class="color">
            <select class="ch">
                <?php
                for($i=0;$i<sizeof($color);$i++){
                    if($i+1 == $_GET['subId']){
                        echo '<option  selected value="'.($i+1).'">'.$color[$i].'</option>';
                    }else{
                        echo '<option  value="'.($i+1).'">'.$color[$i].'</option>';
                    }


                    
                }
                ?>
                </select>
        </div>
                    </div>
                    <div><a href="">add to cart</a></div>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
<script src="jquery.js"></script>
<script src="src/jquery.exzoom.js"></script>
<script src="main.js"></script>
</body>
</html>