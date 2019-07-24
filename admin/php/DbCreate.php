<?php
    include "common.php";

   $servername = "localhost";
   $user = "root";
   $password = 'password';
   $Dbname = 'EcommercePlatform';

    $conn = new mysqli($servername,$user,$password);

    if($conn->connect_error){
        die("connection failed".$conn->connect_error);
        writelog($conn->connect_error);
        
    }else{
        writelog("connection Successful");
    }

    $sql = "CREATE DATABASE EcommercePlatform";

    if($conn->query($sql)=== TRUE){
        writelog('Database Created');
    }else{
        writelog("Creation Error:" . $conn->error);
    }

    $conn->close();

    $conn = new mysqli($servername,$user,$password,$Dbname);

    if($conn->connect_error){
        writelog("connection error:". $conn->connect_error);
    }else{
        writelog("connection successful");
    }

    $sql = "CREATE TABLE products(
        id INT  UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        productName VARCHAR(30) NOT NULL,
        category VARCHAR(30) NOT NULL,
        subcategory VARCHAR(30),
        age VARCHAR(10) NOT NULL,
        active VARCHAR(4) NOT NULL,
        features VARCHAR(100) NOT NULL,
        keywords VARCHAR(100) NOT NULL
    )";

    if($conn->query($sql) === TRUE){
        writelog("Product table created successfully");
    }else{
        writelog("Unable to create product table:" . $conn->error );
    }

    $sql = "CREATE TABLE Subproducts(
        id INT  UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        productID INT NOT NULL,
        price INT UNSIGNED NOT NULL,
        size VARCHAR(2) NOT NULL,
        color VARCHAR(10) NOT NULL,
        quantity INT UNSIGNED NOT NULL,
        discount INT UNSIGNED
        
    )";

    if($conn->query($sql) === TRUE){
        writelog("SubProduct table created successfully");
    }else{
        writelog("Unable to create Subproduct table:" . $conn->error );
    }

    $sql = "CREATE TABLE categories(
        id INT  UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(30) NOT NULL
    )";

    if($conn->query($sql) === TRUE){
        writelog("categories table created successfully");
    }else{
        writelog("Unable to create categories table:" . $conn->error );
    }

    $sql = "CREATE TABLE subcategories(
        id INT  UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        categoryID INT NOT NULL,
        category VARCHAR(30) NOT NULL
    )";

    if($conn->query($sql) === TRUE){
        writelog("subcategory table created successfully");
    }else{
        writelog("Unable to create subcategory table:" . $conn->error );
    }

    $sql = 'CREATE TABLE users(
        id INT UNSIGNED AUTO_INCREMENT UNIQUE PRIMARY KEY,
        Name VARCHAR(30) NOT NULL,
        email VARCHAR(50) UNIQUE NOT NULL,
        password VARCHAR(30) NOT NULL
        
    )';

if($conn->query($sql) === TRUE){
    writelog("Users table created successfully");
}else{
    writelog("Unable to create users table:" . $conn->error );
}

$sql = 'CREATE TABLE admin(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(30) NOT NULL,
    email  VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(30) NOT NULL
)';

if($conn->query($sql) === TRUE){
    writelog("admin table created successfully");
}else{
    writelog("Unable to create admin table:" . $conn->error );
}

$sql = 'CREATE TABLE orders(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    amount int(70) NOT NULL,
    time TIMESTAMP,
    phone int(40)   NOT NULL,
    county VARCHAR(30) NOT NULL,
    subcounty VARCHAR(30) NOT NULL,
    city VARCHAR(30) NOT NULL,
    address VARCHAR(100) NOT NULL,
    status VARCHAR(30) NOT NULL
)';

if($conn->query($sql) === TRUE){
    writelog("order table created successfully");
}else{
    writelog("Unable to create order table:" . $conn->error );
}

$sql = 'CREATE TABLE suborders(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    orderID INT UNSIGNED NOT NULL,
    productID INT UNSIGNED NOT NULL,
    quantity INT UNSIGNED NOT NULL
)';

if($conn->query($sql) === TRUE){
    writelog("suborder table created successfully");
}else{
    writelog("Unable to create suborder table:" . $conn->error );
}

$sql = 'CREATE TABLE photos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    productID INT UNSIGNED NOT NULL,
    photopath VARCHAR(50) NOT NULL
)';

if($conn->query($sql) === TRUE){
    writelog("photo table created successfully");
}else{
    writelog("Unable to create photo table:" . $conn->error );
}

$sql = 'CREATE TABLE cart(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    product INT UNSIGNED NOT NULL,
    email VARCHAR(50) NOT NULL
)';

if($conn->query($sql) === TRUE){
    writelog("cart table created successfully");
}else{
    writelog("Unable to create cart table:" . $conn->error );
}

$conn->close();
?>