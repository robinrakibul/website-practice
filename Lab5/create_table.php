<?php

$connect = mysqli_connect("localhost", "root", "", "fall2020");
 
if(!$connect){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$sql = "CREATE TABLE user
    (    
    name VARCHAR(27) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(20) NOT NULL,
    ip_address VARCHAR(50) NOT NULL,
    url VARCHAR(150) NOT NULL,
    age INT NOT NULL,
    gender VARCHAR(70) NOT NULL,
    mobile VARCHAR(20) NOT NULL,
    briefinfo VARCHAR (80) NOT NULL
    )";
if(mysqli_query($connect, $sql)){
    echo "Table created successfully.";
} 
else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
}

?>