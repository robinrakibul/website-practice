<html>
<body>
    
<form method="post">
  <label for="input">Input a string including special charecters: </label>
  <br>
  <input type="text" id="input" name="input"><br>
  <input type="submit" name="submit" value="submit">
</form>


<?php

 if(isset ($_POST['submit'])){
     $str=$_POST['input'];
     x($str);
 }

function x($str) {
    $res = str_replace( array( '\'', '"',
    ',' , ';', '<', '>' ), ' ', $str);
    return $res;
    }
   
$str1 = x($str); 
echo $str1; 
?>

</body>
</html>
