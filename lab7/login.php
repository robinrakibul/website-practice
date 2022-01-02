<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myusername = mysqli_real_escape_string($db,$_POST['id']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

        if(isset($_POST['remember'])){
        	setcookie("id",$myusername, time()+3600*24);
    		setcookie("pass",$mypassword, time()+3600*24);
        }
        
      
      $sql = "SELECT id FROM users WHERE id = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      if($count == 1) {
         
         $_SESSION['login_user'] = $myusername;
         $sql = "SELECT user_type FROM users WHERE id = '$myusername' and password = '$mypassword'";
         $result = mysqli_query($db,$sql);
         $row = $result->fetch_assoc();

         if($row['user_type']=="Admin"){
            header("location: admin.php");
         } else {
            header("location: user.php");
         }
         
      } else {
         $error = "Username Or Password is invalid";
               }
   }
?>