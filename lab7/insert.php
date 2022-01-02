<?php
$link = mysqli_connect("localhost", "root", "", "register");
 
if(!$link){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$sql = "INSERT INTO users (id, name, password, email, user_type) VALUES
('$_POST[id]','$_POST[name]','$_POST[cpassword]','$_POST[email]','$_POST[user_type]')";

if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

header("location: login_form.php");
 
mysqli_close($link);
?>