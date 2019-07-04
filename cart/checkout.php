<?php
        session_start();
        if(isset($_SESSION['email'])){
       
       
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="checkout.css">
</head>
<body>
    <div class="container">
        <span><h1>Checkout Page</h1></span>
        <div id="error"></div>
        <form action="addto.php" onsubmit="return validate()" method="post" enctype="multipart/form-data">
              <div id="details">
                    <div class="Det">
                        <span>Phone Number</span>
                        <input type="number" name="phone" id="phone">
                    </div>
                    <div class="Det">
                        <span>County</span>
                        <input type="text" name="county" id="county">
                    </div>
                    
                    <div class="Det">
                        <span>Subcounty</span>
                        <input type="text" name="subcounty" id="subcounty">
                    </div>
                    
                    
                    <div class="Det">
                        <span>City</span>
                        <input type="text" name="city" id="city">
                    </div>
                    
                    <div class="Det">
                        <span>Address</span>
                        <input type="text" name="Address" id="Address">
                    </div>
  
                    
                    
             </div>
            
               <input type="submit" value="submit" id ="submit">
           </form>

    </div>
    <script>
        
        function validate(){
            var phone = document.getElementById('phone');
            var county= document.getElementById('county');
            var subcounty= document.getElementById('subcounty');
            var city= document.getElementById('city');
            var address= document.getElementById('address');
            var error = document.getElementById('error');
            

    if(phone.value.length == 0 || county.value.length == 0|| subcounty.value.length == 0 || city.value.length == 0|| address.value.length == 0){
        error.innerHTML = "Fill all fields";
        return false;
    }else{
        return true;
    }
    }

    </script>
    <script src="checkout.js"></script>
</body>
</html>

<?php
        }else{
            header('location:../login/index.php');
        }
?>