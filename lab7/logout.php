<?php
   session_start();
   
   if(session_destroy()) {
      echo "Session Ended, Logged out Successfully. <br>";
      echo "Redirecting to login page in 5 seconds";
      header("refresh:5;url=login_form.php");
   }
?>