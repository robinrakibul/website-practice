<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$connect = mysqli_connect($dbhost, $dbuser, $dbpass);

if(!$connect)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$sql = "CREATE DATABASE fall2020";
if(mysqli_query($connect, $sql)){
    echo "Database created successfully";
} else{
    echo "ERROR: Could not able to execute $sql." . mysqli_error($connect);
}
 

?>