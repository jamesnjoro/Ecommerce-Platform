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
               <th>Product No</th>
               <th>Image</th>
               <th>Name</th>
               <th>Price</th>
               <th>Stock</th>
               
            </tr>
            <tr>
                <td>1</td>
                <td><img id="pro" src="photos/todo.png"/></td>
                <td>Vance</td>
                <td>1500</td>
                <td>3</td>
                <td><i class="fas fa-trash-alt"></i></td>
            </tr>
            <tr>
                <td>1</td>
                <td><img id="pro" src="photos/todo.png"/></td>
                <td>Vance</td>
                <td>1500</td>
                <td>3</td>
                <td><i class="fas fa-trash-alt"></i></td>
            </tr>
            
            </table>
       </div>
   
   </div>

   <div id="modal">
       <div id="modalContent">
            <a id="cls">&times</a>
            <h1>Add Product</h1>
           
           <form action="" method="post">
              <div id="details">
                    <div class="Det">
                        <span>Product Name</span>
                        <input type="text" name="ProductN" id="ProductN">
                    </div>
                    <div class="Det">
                        <span>Category</span>
                        <input type="text" name="ProductC" id="ProductC">
                    </div>
                    <div class="Det">
                        <span>Price</span>
                        <input type="text" name="ProductP" id="ProductP">
                    </div>
                    <div class="Det">
                        <span>Size</span>
                        <input type="text" name="ProductS" id="ProductS">
                    </div>
                    <div class="Det">
                        <span>Quantity</span>
                        <input type="text" name="ProductQ" id="ProductQ">
                    </div>
             </div>
               <div id="pic">
                   <span><img src="photos/todo.png"/></span>
                   <input type="text" name="picL" id="picL">
                   <input type="button" value="Load">
                   <i class="fas fa-plus"></i>
               </div>
           </form>
       </div>
   </div>
<script src="js/jquery.js"></script>
<script src="js/main.js"></script>

</body>
</html>