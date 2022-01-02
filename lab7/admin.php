<?php
   include('session.php');
?>
<!DOCTYPE html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session."!"; ?></h1> 
      <h3><a href = "profile.php">Profile</a></h3>
      <h3><a href = "changepassword.php">Change Password</a></h3>
      <h3><a href = "viewusers.php">View Users</a></h3>
      <h3><a href = "logout.php">Logout</a></h3>
   </body>
   
</html>