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
           
                <div class="items active" id="dashboard">
                <i class="fas fa-tachometer-alt"></i>
                <span class="it"><a>Dashboard</a></span>  
                </div>
         
                <div class="items" id="users">
                <i class="fas fa-users"></i>
                <span class="it"><a>Users</a></span> 
                </div>
           
                <div class="items" id="orders">
                <i class="fas fa-shopping-cart"></i>
                <span class="it"><a>Orders</a></span>
                </div>

                <div class="items" id="products">
                <i class="fas fa-shopping-bag"></i>
                <span class="it"><a>Products</a></span>
                </div>

                
          

</div>

   </div>
   <div class="container">
       <div class="header">
           <div class="addP">
                <i class="fas fa-plus"></i>
                <a> Add product</a>
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
   </div>

   
<script src="js/main.js"></script>
<script src="js/jquery.js"></script>
</body>
</html>