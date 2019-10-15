<?php

if(isset($_GET['id'])){
    include('../php/common.php');
    include('../php/config.php');

    $sql = 'SELECT * FROM products WHERE id ="'.$_GET['id'].'"';
    $results = $conn->query($sql);
    while($row = $results->fetch_assoc()){

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="../../awesomefont/css/all.css">
    <title>Next Collections</title>
    
</head>
<body>
    <div class="container">
        <h1>Product View</h1>
        <form method="POST" action="update.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
        <div id="name" class="Det"><span>Product Name</span> <input type="text" name="Pname" id="Pname" value="<?php echo $row['productName'];?>"></div>
        <div id="cat">
           <div class="Det"><span>Category</span>  <input type="text" name="category" id="category" value="<?php echo $row['category'];?>"></div> 
           <div class="Det"><span>Subcategory</span> <input type="text" name="subcategory" id="subcategory" value="<?php echo $row['subcategory'];?>"></div> 
           <div class="Det"><span>Age</span> <input type="text" name="age" id="age" value="<?php echo $row['age'];?>"></div> 
           <div class="Det"><span>Features</span> <input type="text" name="features" id="features" value="<?php echo $row['features'];?>"></div> 
           <div class="Det"><span>Keywords</span> <input type="text" name="keywords" id="keywords" value="<?php echo $row['keywords'];?>"></div> 
           <div class="Det"><span>Active</span> <input type="text" name="active" id="active" value="<?php echo $row['active'];?>"></div> 
        </div>
        <h2>Subproducts</h2>
        
        <?php
            $sql='SELECT * from Subproducts WHERE productID = "'.$row['id'].'"';
            $sub = $conn->query($sql);
            while($row2 = $sub->fetch_assoc()){

            
        ?>
        <div class="subcategory">
        <input type="hidden" name="sid[]" value="<?php echo $row2['id'];?>">
                    <div class="Det">
                        <span>Price</span>
                        <input type="text" name="ProductP[]" class="ProductP" value="<?php echo $row2['price'];?>">
                    </div>
                    <div class="Det">
                        <span>Discount</span>
                        <input type="text" name="ProductD[]" class="ProductD" value="<?php echo $row2['discount'];?>">
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
                        <input type="text" name="ProductCo[]" class="ProductCo" value="<?php echo $row2['color'];?>">
                    </div>
                    <div class="Det">
                        <span>Quantity</span>
                        <input type="text" name="ProductQ[]" class="ProductQ" value="<?php echo $row2['quantity'];?>">
                    </div>
                    <div class="Det">
                        <span>Pictures</span>
                        <button id ="<?php echo $row2['id'];?>" class="photo">View photos</button>
                    </div>
      </div>
        <?php
                }
            }
        ?>
    
        <input type="submit" value="save" id="submit">
</form>
    </div>
    <div id="modal">
       <div id="modalContent">
            <a id="cls">&times</a>
            <h1>Photos</h1>
            <div class="content">
                
            </div>
       </div>
   </div>
   <script src="../js/jquery.js"></script>
   <script src="main.js"></script>
  
</body>
</html>
<?php
}else{

}

?>