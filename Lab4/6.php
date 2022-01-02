<html>
<body>
<form method="post">
  <label for="input">Input: </label>
  <br>
  <input type="number" id="input" name="input">
  <br>
  <input type="submit" name="submit" value="submit">
</form>

<?php

    $arr1[50][50]=0;
 if(isset ($_POST['submit'])){
     $n=$_POST['input'];
     x($n);
 }
 

function x($n)
   {	 
        echo "<br><br>Find sum of right diagonals of a matrix :<br>";	 
	    echo "Input elements in the first matrix :<br>";

       for($i=0;$i<$n;$i++)
        {
            for($j=0;$j<$n;$j++)
            {
	           echo "element ".$i,$j."<br>";
            }
        }
        echo "The matrix is :<br>";
        
    for($i=0; $i<$n; $i++)
        {
          for($j=0; $j<$n ;$j++)
          {
            echo ($i.$j."<br>");
            }
        }
       }

?>

</body>
</html>

