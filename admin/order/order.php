<?php
if(isset($_GET['action'])){
    if($_GET['action'] == 'viewOrder'){

        include('../php/common.php');
        include('../php/config.php');
        $sql = 'SELECT * FROM orders WHERE id ="'.$_GET['id'].'"';
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
            $sql = 'SELECT Name FROM users WHERE email="'.$row['email'].'"';
            $result = $conn->query($sql);
            $name = $result->fetch_assoc();
            
       
        ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="order.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="personal">
            <h1>Personal Information</h1>
            <input type="hidden" name="id" class="orderID" value="<?php echo $row['id'];?>">
            <div class="details">
                <div>
                    <span>Name</span>
                    <input type="text" value="<?php echo $name['Name'];?>" readonly>
                </div>
                <div>
                    <span>Email</span>
                    <input type="text" value="<?php echo $row['email'];?>" readonly>
                </div>
                <div>
                    <span>Phone Number</span>
                    <input type="number" value="0<?php echo $row['phone']?>" readonly>
                </div>
                <div>
                    <span>County</span>
                    <input type="text" value="<?php echo $row['county']?>" readonly>
                </div>
                <div>
                    <span>Subcounty</span>
                    <input type="text" value="<?php echo $row['subcounty']?>" readonly>
                </div>
                <div>
                    <span>City</span>
                    <input type="text" value="<?php echo $row['city']?>" readonly>
                </div>
                <div>
                    <span>Address</span>
                    <input type="text" value="<?php echo $row['address']?>" readonly>
                </div>
                <div>
                    <span>Status</span>

                    <?php
                 if($row['status']== 'Being Processed'){
                     ?>
                
                    <select name="status" class="status">
                    <option  value="Being Processed">Being Processed</option>
                    <option  value="In Transit">In Transit</option>
                    <option value="Fulfilled">Fulfilled</option>
                    <option value="Cancelled">Cancelled</option>
                    </select>
                
                <?php
                 }if($row['status']== 'In Transit'){
                    ?>
                    
                    <select name="status" class="status">
                    <option  value="Being Processed">Being Processed</option>
                    <option selected value="In Transit">In Transit</option>
                    <option value="Fulfilled">Fulfilled</option>
                    <option value="Cancelled">Cancelled</option>
                    </select>
            
                <?php
                 }if($row['status']== 'Fulfilled'){
                    
                    ?>
                    
                    <select name="status" class="status">
                    <option  value="Being Processed">Being Processed</option>
                    <option  value="In Transit">In Transit</option>
                    <option selected value="Fulfilled">Fulfilled</option>
                    <option value="Cancelled">Cancelled</option>
                    </select>
                
                    <?php
                 }if(($row['status']== 'Cancelled')){
                     ?>
                    
                    <select name="status" ="status">
                    <option  value="Being Processed">Being Processed</option>
                    <option  value="In Transit">In Transit</option>
                    <option  value="Fulfilled">Fulfilled</option>
                    <option selected value="Cancelled">Cancelled</option>
                    </select>
                <?php
                 }
                    
                ?>




                  
                </div>
            </div>
        </div>
        <div class="products">
            <h1>Products</h1>
            <div class="list">
            <div class="product">
                    <span><b>Image</b></span>
                    <span><b>Name</b></span>
                    <span><b>Quantity</b></span>
                    <span><b>Price</b></span>
                </div>
                <?php
                $sql = 'SELECT * FROM suborders WHERE orderID="'.$_GET['id'].'" ';
                $results2 = $conn->query($sql);
                while($row2 = $results2->fetch_assoc()){
                    $sql = 'SELECT * FROM products WHERE id="'.$row2['productID'].'"'; 
                    $result3 = $conn->query($sql);
                    while($row3 = $result3->fetch_assoc()){
                        $sql = 'SELECT * FROM photos WHERE productID ="'.$row3['pictureID'].'"';
                        $result4 = $conn->query($sql);
                        while($row4 = $result4->fetch_assoc()){
                ?>
                
                
                <div class="product">
                    <img src="../photos/<?php echo $row4['photopath'];?>" alt="">
                    <span><?php echo $row3['productName'];?></span>
                    <span><?php echo $row2['quantity'];?></span>
                    <span><?php echo $row3['price'];?></span>
                </div>
            <?php  break;}
            } 
        }?>
            </div>
        </div>
        <?php }?>
        <button  id="return"> <a href="../index.php">Return to admin</a> </button>
    </div>
    <script src="order.js"></script>
</body>
</html>
<?php
 
}
}

?>