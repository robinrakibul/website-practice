<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color:red;}
</style>
</head>
<body>  

<?php
$nameErr = $emailErr = $passErr = $passErr2 = "";
$name = $email = $password = $tpassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  


  if (empty($_POST["id"])) {
    $idErr = "ID is required";
  } else {
    if(!preg_match("/^(\d){4}[\-](\d){1}[\-](\d){2}[\-](\d){3}$/", $_POST["id"])){
       $idErr+ "Enter valid id";
    }
    else{
      $id= test_input($_POST["id"]);
    }
  }

   if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } 
   else {
    $name = test_input($_POST["name"]);
    
    if (!preg_match("/^[a-zA-Z ]{5,20}$/i",$name)) {
      $nameErr = "Username must be 5-20 chars long"; 
    }
  }


  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  }
   else {
    $email = test_input($_POST["email"]);
  
    if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email)) {
      $emailErr = "Invalid email format"; 
    }
  }  
  

  if (empty($_POST["password"])) {
    $passErr = "Password is required";
  } else {
    if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[_]).*$/", $_POST["password"]) === 0){
      $passErr = "Must contain at least one number and one uppercase and lowercase letter, a special charecter";
    } else {
      $tpassword = test_input($_POST["password"]);
    }    
  }

  if(empty($_POST["cpassword"])){
    $passErr = "Password is required";
  } else if($_POST["password"]!=$_POST["cpassword"]){
    $passErr = "Password not matched";
  } else {
    $password = test_input($_POST["cpassword"]);
  }

 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Registration</h2>
<form method="post" action="insert.php">  
  
  Id:<br><input type="text" name="id" maxlength="10" minlength="5" required>
  <br>
  Password:<br><input type="password" name="password">
  <span class="error">* <?php echo $passErr;?></span>
  <br>
  Confirm Password:<br><input type="password" name="cpassword">
  <span class="error">* <?php echo $passErr2;?></span>
  <br>
  Name:<br><input type="text" name="name" >
  <span class="error">* <?php echo $nameErr;?></span>
  <br>
  Email:<br><input type="email" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br>
  User Type:<br>
  <select name="user_type">
    <option value="User">User</option>
    <option value="Admin">Admin</option>
  </select><br>
  <hr>
  <input type="submit" name="submit" value="Register" onclick="login_form.php">
  <a href="login_form.php">Login</a>
</form>

</body>
</html>