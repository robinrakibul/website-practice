<?php
$link = mysqli_connect("localhost", "root", "", "register");
 
if(!$link){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$sql = "CREATE TABLE Users(
    id VARCHAR(15) NOT NULL PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE,
	user_type VARCHAR(10) NOT NULL
)";
if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
mysqli_close($link);
?>