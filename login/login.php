<?php


include('../admin/php/connection.php');


if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && $_POST['username']!=""){
    $user = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "INSERT INTO users(Name,email,password) VALUES ('".$user."','".$email."','".$password."')";

    $result = query($sql,"User created");
    if($result == 1){
        header('location: ../index.php');
        session_start();
        $_SESSION['email'] = $email;
        $userName = explode(' ',$user);
        $name = reset($userName);
        $_SESSION['user'] = $name;
        $_SESSION['error'] = "";
    }else{
        session_start();
        $_SESSION['error'] = $result;
        header('location:index.php');
    }

}else{
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    include('../admin/php/config.php');
    
    $sql ="SELECT * FROM users where email='".$email."'";

    $results = $conn->query($sql);

    if($results->num_rows!=0){
        while($row = $results->fetch_assoc()){
            if($row['password']=== $_POST['password']){
            session_start();
            $_SESSION['email'] = $row['email'];
            $userName = explode(' ',$row['Name']);
            $name = reset($userName);
            $_SESSION['user'] =$name;
            writelog($row['email']. ' session started');
            header('location:../index.php');
            }else{
               session_start();
               $_SESSION['error'] = "Incorrect password";
               header('location:index.php');
            }
        }
    }else{
        session_start();
        $_SESSION['error'] = "Incorrect username";
        header('location:index.php');
    }

    $conn->close();
}

?>