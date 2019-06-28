<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Groundz clothes</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="../awesomefont/css/all.css">
    
</head>
<body>
   <div class="sidenav">
       <a id="clsBtn" onclick="collapse()">&times</a>
       <h1 id="sideHeading"> Admin </h1>
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
                        <span><h2>100</h2></span>
                        <span><h3>Products</h3></span>
                    </div>
                    
                    

                </div>
                <div class="menu" id="one">
                    <div>
                        <i class="fas fa-shopping-cart"></i>
                        <span><h2>100</h2></span>
                        <span><h3>Orders</h3></span>
                    </div>
                    
                </div>
                <div class="menu" id="two">
                    <div>
                        <i class="fas fa-users"></i>
                        <span><h2>100</h2></span>
                        <span><h3>Users</h3></span>
                    </div>
                    
                    
                </div>
            </div>
            <div class="topP">
                <h1>Top Products</h1>
                <ul>
                    <li>
                        <div class="pp">
                            <img src="photos/todo.png" alt="testing">
                            <span>Name of product</span>
                            <span>Prices of product<span>
                        </div>
                    </li>
                    <li>
                        <div class="pp">
                            <img src="photos/todo.png" alt="testing">
                            <span>Name of product</span>
                            <span>Prices of product<span>
                        </div>
                    </li>
                </ul>

            </div>
       
        </div>
   
   
      
       <div class="users">
            <h1>Users</h1>
            <table id="usersT">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Town</th>
                <th>City</th>
                <th>Orders<th>
            </tr>
            <tr>
                <td>James Njoroge</td>
                <td>jnjoroge501@gmail.com</td>
                <td>0721544707</td>
                <td>Male</td>
                <td>Nairobi</td>
                <td>Kahawa west</td>
                <td>10</td>
            </tr>
            <tr>
                <td>James Njoroge</td>
                <td>jnjoroge501@gmail.com</td>
                <td>0721544707</td>
                <td>Male</td>
                <td>Nairobi</td>
                <td>Kahawa west</td>
                <td>10</td>
            </tr>
            </table>
       </div>

       <div class="orders">
            <h1>Order</h1>
            <table id="usersT">
            <tr>
               <th>Order No</th>
               <th>Email</th>
               <th>Phone Number</th>
               <th>Amount</th>
               <th>Status</th>
            </tr>
            <tr>
                <td>1</td>
                <td>jnjoroge501@gmail.com</td>
                <td>0721544707</td>
                <td>1500</td>
                <td>Shipping</td>
            </tr>
            <tr>
                <td>1</td>
                <td>jnjoroge501@gmail.com</td>
                <td>0721544707</td>
                <td>1500</td>
                <td>Shipping</td>
            </tr>
            
            </table>
       </div>

       <div class="products">
            <h1>Products</h1>
            <table id="usersT">
            <tr>
               <th>Image</th>
               <th>Name</th>
               <th>Price</th>
               <th>Stock</th>
               
            </tr>
            <?php
            include("php/common.php");
              $servername = "localhost";
              $user = "root";
              $password = 'password';
              $Dbname = 'EcommercePlatform';
            
              $conn = new mysqli($servername, $user, $password, $Dbname);
            
              if($conn->connect_error){
                  writelog("Connection failed:" . $conn->connect_error);
                  die();
              }else{
                  writelog("connection Successful");
                  
              }
            
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
                    echo "<tr><td><img id='pro' src='photos/".$pic."'/></td>
                    <td>".$row['productName']."</td>
                    <td>".$row['price']."</td>
                    <td>".$row['quantity']."</td>
                    <td><i class='fas fa-trash-alt'></i></td></tr>";
                  }
              }else{
                  echo "no results";
              }

                  $conn->close();
                  writelog("Connection Closed");
            
            ?> 
            </table>
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
                        <span>Gender</span>
                        <select type="text" name="ProductG" id="ProductG">
                        <option value="male">male</option>
                        <option value="female">female</option>
                        </select>
                    </div>
                    <div class="Det">
                        <span>Price</span>
                        <input type="text" name="ProductP" id="ProductP">
                    </div>
                    <div class="Det">
                        <span>Discount</span>
                        <input type="text" name="ProductD" id="ProductD">
                    </div>
                    <div class="Det">
                        <span>Size</span>
                        <input type="text" name="ProductSi" id="ProductSi">
                    </div>
                    <div class="Det">
                        <span>Quantity</span>
                        <input type="text" name="ProductQ" id="ProductQ">
                    </div>
                    <div class="Det">
                        <span>Keywords</span>
                        <input type="text" name="ProductK" id="ProductK">
                    </div>
                    <div id="pic">
                    <span id="files"> Pictures</span>
                    <input type="file" name="files[]" multiple="">
                </div>
                    
             </div>
            
               <input type="submit" value="submit">
           </form>
       </div>
   </div>
<script type="text/javascript">

function validate(){
    var name = document.getElementById("ProductN");
    var price = document.getElementById("ProductP");
    var size = document.getElementById("ProductSi");
    var quantity = document.getElementById("ProductQ");
    
    var err = document.getElementById("validateerror");

    if(name.value == ""||price.value == ""||size.value == ""||quantity.value == ""){
        err.innerHTML = "Fill all required fields";
        return false
    }else{
        return true;
    }
}
</script>

<script src="js/jquery.js"></script>
<script src="js/main.js"></script>

</body>
</html>