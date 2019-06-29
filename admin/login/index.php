<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../awesomefont/css/all.css">
    <link rel="stylesheet" href="main.css">
    <title>Next Collections</title>
</head>
<body>
    <div class="container">
        <div class="heading">
            <h1>Next Collection</h1>
        </div>
        <form action="login.php" onsubmit="return validate()" method="post">
        <span id="error">
        <?php
            session_start();
            if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                $_SESSION['error']="";
            }
        ?>
        </span>
            <div class="entry" id="username">
                <span><i class="fas fa-user"></i></span>
                <input type="text" name="username" id="user" >
            </div>
            <div class="entry">
                <span><i class="far fa-envelope"></i></span>
                <input type="email" name="email" id="email">
            </div>
            <div class="entry">
                <span><i class="fas fa-unlock"></i></span>
                <input type="password" name="password" id="password">
            </div>
            <input type="submit" value="submit" id="submit">
        </form>
        <div class="signup">
            <span id="text">Don't You have an account?<br></span>
            <a id="link"> <span id="linkT">Sign Up</span> </a>
        </div>
    </div>
    <script>
        function validate(){
        var text = document.getElementById('text');
        var link = document.getElementById('link');
        var email = document.getElementById('email');
        var password = document.getElementById('password');
        var user = document.getElementById('user');
        var linkT = document.getElementById('linkT');
        var username = document.getElementById('username');
        var error = document.getElementById('error');
        if(link.className == ''){
            if(email.value =="" || password.value ==""){
                error.innerHTML = "Please Fill all fields";
                return false;
            }else{
                return true;
            }
        }else{
            if(email.value =="" || password.value ==""||user.value ==""){
                error.innerHTML = "Please Fill all fields";
                return false;
            }
            else{
                return true;
            }
        }
        }
    </script>
    <script src="../js/jquery.js"></script>
   <script src="main.js"></script>
</body>
</html>

