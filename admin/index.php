<?php
        session_start();
        if(isset($_SESSION['admin'])){
       
       
        ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Next Collections</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="../awesomefont/css/all.css">
    <link rel="stylesheet" href="../AlertJS/alert.css">
    
</head>
<body>
<div class="message">
        <span id="M">testing out</span>
        <span id="cancel">&times</span>
</div>
    <?php
        if(isset($_GET['status'])){
            
            echo '
            <script src="../AlertJS/alert.js"></script>
            <script>
            showAlert("'.$_GET['message'].'");
            </script>';

        }
    ?>

      
   <div class="sidenav">
       <a id="clsBtn" onclick="collapse()">&times</a>
       <h1 id="sideHeading"> Admin </h1>
       <a id ="exp" onclick='exp()'><i class="fas fa-chevron-right"></i></a>
       <div class="links">
           
                <div class="items active" onclick="dashboard()" id="dashboard">
                <i class="fas fa-tachometer-alt"></i>
                <span class="it"><a>Dashboard</a></span>  
                </div>
         
                <div class="items" onclick="users()" id="users">
                <i class="fas fa-users"></i>
                <span class="it"><a>Users</a></span> 
                </div>
           
                <div class="items" onclick="orders()" id="orders">
                <i class="fas fa-shopping-cart"></i>
                <span class="it"><a>Orders</a></span>
                </div>

                <div class="items"  onclick="products()" id="products">
                <i class="fas fa-shopping-bag"></i>
                <span class="it"><a>Products</a></span>
                </div>
                
                
        </div>
    </div>

                
          



  
  
  
  
  
  
  
  
  
   <div class="container">
       <div class="header">
           <div class="addP">
                <i class="fas fa-plus"></i>
                <a onclick="modalA()"> Add product</a>
           </div>
           <div class="openorders">
                <i class="fas fa-shopping-cart"></i>
                <a>Orders</a>
           </div>
       </div>
       <div class="dashboard">
            <h1>Dashboard </h1>
            <div class="upper">
                <div class="menu" id="three">
                    <div>
                        <i class="fas fa-shopping-bag"></i>
                        <span><h2>
                        <?php
                        include("php/common.php");
                        include("php/config.php");
                        
                        $sql = "SELECT * FROM products";
                        $results = $conn->query($sql);
                        
                        echo $results->num_rows;
                        
                        ?>
                        
                        </h2></span>
                        <span><h3>Products</h3></span>
                    </div>
                    
                    

                </div>
                <div class="menu" id="one">
                    <div>
                        <i class="fas fa-shopping-cart"></i>
                        <span><h2>
                        
                        <?php
                            $sql = "SELECT * FROM orders";

                            $result = $conn->query($sql);

                            echo $result->num_rows;
                        
                        ?>
                        
                        </h2></span>
                        <span><h3>Orders</h3></span>
                    </div>
                    
                </div>
                <div class="menu" id="two">
                    <div>
                        <i class="fas fa-users"></i>
                        <span><h2>
                        
                        <?php
                        $sql = 'SELECT * FROM users';
                        $result = $conn->query($sql);
                        echo $result->num_rows
                        
                        ?>
                        
                        </h2></span>
                        <span><h3>Users</h3></span>
                    </div>
                    
                    
                </div>
            </div>
            <div class="topP">
                <h1>Top Products</h1>
                <?php
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
                    ?>
                        <div>
                        <div>
                            <div class="pp">
                                <img src="photos/<?php echo $pic;?>" alt="testing">
                                <span><?php echo $row['productName'];?></span>
                                <span><?php echo $row['price'];?><span>
                            </div>
                        </div>
                       
                    </div>
                <?php
                    }
                }
                ?>
               
                       
            </div>
                    
        </div>
   
   
      
       <div class="users">
            <h1>Users</h1>
            <table id="usersT">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Orders<th>
            </tr>
                <?php
                    $sql = 'SELECT * FROM users';
                    $result = $conn->query($sql);
                    $sql = 'SELECT * FROM orders';
                    $result2 = $conn->query($sql);
                    $order = 0;

                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                            $order = 0;
                            if($result2->num_rows>0){
                                while($rows2 = $result2->fetch_assoc()){
                                    if($row['email']==$rows2['email']){
                                        $order++;
                                    }
                                }
                            }



                        ?>
                <tr>
                <td><?php echo $row['Name']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $order?></td>
                </tr>
                <?php

                        }
                    }else{echo "no users registered";}
                ?>
            </table>
       </div>

       <div class="orders">
            <h1>Order</h1>
            <table id="usersT">
            <tr>
               <th>Order No</th>
               <th>Phone Number</th>
               <th>Amount</th>
               <th>Status</th>
            </tr>

            <?php
            $sql = "SELECT * FROM orders";
            $result = $conn->query($sql);

            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){



                    ?>

                <tr class="ord">
                <td class="orderID"><?php echo $row['id'];?></td>
                <td>0<?php echo $row['phone'];?></td>
                <td><?php echo $row['amount'];?></td>
                
                <?php
                 if($row['status']== 'Being Processed'){
                     ?>
                <td> 
                    <select name="status" class="status">
                    <option  value="Being Processed">Being Processed</option>
                    <option  value="In Transit">In Transit</option>
                    <option value="Fulfilled">Fulfilled</option>
                    <option value="Cancelled">Cancelled</option>
                    </select></td>
                </tr>
                <?php
                 }if($row['status']== 'In Transit'){
                    ?>
                    <td> 
                    <select name="status" class="status">
                    <option  value="Being Processed">Being Processed</option>
                    <option selected value="In Transit">In Transit</option>
                    <option value="Fulfilled">Fulfilled</option>
                    <option value="Cancelled">Cancelled</option>
                    </select></td>
                </tr>
                <?php
                 }if($row['status']== 'Fulfilled'){
                    
                    ?>
                    <td> 
                    <select name="status" class="status">
                    <option  value="Being Processed">Being Processed</option>
                    <option  value="In Transit">In Transit</option>
                    <option selected value="Fulfilled">Fulfilled</option>
                    <option value="Cancelled">Cancelled</option>
                    </select></td>
                </tr>
                    <?php
                 }if(($row['status']== 'Cancelled')){
                     ?>
                    <td> 
                    <select name="status" ="status">
                    <option  value="Being Processed">Being Processed</option>
                    <option  value="In Transit">In Transit</option>
                    <option  value="Fulfilled">Fulfilled</option>
                    <option selected value="Cancelled">Cancelled</option>
                    </select></td>
                </tr>

                <?php
                 }
                    
                ?>
               

            <?php
                }
            }
            
            ?> 
            </table>
       </div>

       <div class="products">

      





            





            
           
           
       </div>
   
   </div>

   <div id="modal">
       <div id="modalContent">
            <a id="cls">&times</a>
            <h1>Add Product</h1>
           <div id="validateerror" ></div>
           <form action="php/productReg.php" onsubmit="return validate()" method="post" enctype="multipart/form-data">
              <div id="details">
                    <div class="Det">
                        <span>Product Name</span>
                        <input type="text" name="ProductN" id="ProductN">
                    </div>
                    <div class="Det">
                        <span>Category</span>
                        <select type="text" name="ProductC" id="ProductC">
                        <option value="shirt">shirt</option>
                        <option value="trouser">trouser</option>
                        <option value="shoe">shoe</option>
                        </select>
                    </div>
                    <div class="Det">
                        <span>Subcategory</span>
                        <select type="text" name="ProductS" id="ProductS">
                        <option value="none">none</option>
                        <option value="sweats">Sweats</option>
                        <option value="kaki">Kaki</option>
                        <option value="material">Material</option>
                        </select>
                    </div>
                    <div class="Det">
                        <span>Age</span>
                        <select type="text" name="ProductA" id="ProductA">
                        <option value="children">children</option>
                        <option value="grown ups">grown ups</option>
                        </select>
                    </div>
                    <div class="Det">
                        <span>Features</span>
                        <input type="text" name="ProductF" id="ProductF">
                    </div>
                    <div class="Det">
                        <span>Keywords</span>
                        <input type="text" name="ProductK" id="ProductK">
                    </div>
                </div>
                    <h2 id="subH">SubProducts</h2>
                <div id="details" class="clone">
                    <div class="Det">
                        <span>Price</span>
                        <input type="text" name="ProductP[]" class="ProductP">
                    </div>
                    <div class="Det">
                        <span>Discount</span>
                        <input type="text" name="ProductD[]" class="ProductD">
                    </div>
                    <div class="Det">
                        <span>Size</span>
                        <select type="text" name="ProductSi[]" id="ProductSi">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        </select>
                    </div>
                    <div class="Det">
                        <span>Color</span>
                        <input type="text" name="ProductCo[]" class="ProductCo">
                    </div>
                    <div class="Det">
                        <span>Quantity</span>
                        <input type="text" name="ProductQ[]" class="ProductQ">
                    </div>
                   
                    <div id="pic">
                    <span id="files"> Pictures</span>
                    <input type="file" name="files[]" class="file" multiple="">
                </div>
                    
             </div>
             <p><a href="#" rel=".clone" class="clon">Add Subproduct</a></p> 
             <input type="submit" value="submit" id="submit">
           </form>
       </div>
   </div>
 
<script type="text/javascript">

function validate(){
    var name = document.getElementById("ProductN");
    var price = document.querySelectorAll(".ProductP");
    
    var quantity = document.querySelectorAll(".ProductQ");
    var color = document.querySelectorAll(".ProductCo");
    
    var err = document.getElementById("validateerror");
    err.innerHTML = "";
    var bool = false;

    price.forEach(function(value,index){
            if(name.value == "" || value.value == ""||color[index].value == ""||quantity[index].value == ""){
                err.innerHTML = "Fill all subproduct required fields";
                bool = false;
            }else{
                err.innerHTML = "okay";
                bool = true;
                }
        });

    var fil = document.querySelectorAll('.file');
    fil.forEach(function(value,index){
        value.setAttribute("name","file"+index+"[]");
    });

    return bool;
}

</script>

<script src="js/jquery.js"></script>
<script src="js/refcopy.js"></script>
<script src="js/main.js"></script>
<script src="../AlertJS/alert.js"></script>
</body>
</html>

<?php
        }
        else{
            header("location: login/index.php");
        }
?>