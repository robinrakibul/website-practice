<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color:red;}
</style>
</head>
<body> 

<h2>LOGIN</h2>
<form method="post" action="login.php">
	User ID:<br>
	<input type="text" name="id"><br>
	Password:<br>
	<input type="password" name="password">
	<br><br>
	<input type="checkbox" value="remember" name="remember">Remember Me<br>
	<hr>
	<input type="submit" name="submit" value="Login">
  	<a href="index.php">Register</a>
</form>
</body>
</html>