<html>
<body>

<form method="post">
  <label for="input">Input: </label>
  <br>
  <input type="number" id="input" name="input"><br>
  <input type="submit" name="submit" value="submit">
</form>


<?php

 if(isset ($_POST['submit'])){
     $n=$_POST['input'];
     x($n);
 }

function x($n)
{
    for ($i=1; $i<=$n;$i++)
        {
            for ($k=1;$k<$i;$k++)
                echo "&nbsp&nbsp";
            for ($j=$i;$j<=$n;$j++)
                echo "*&nbsp&nbsp";    
                echo "<br>";
    }
    
    for ($i=$n-1;$i>=1;$i--)
        {
 
        for ($k=1;$k<$i;$k++)
            echo "&nbsp&nbsp";
        for ($j=$i;$j<=$n;$j++)
            echo "*&nbsp&nbsp";    
            echo "<br>";
    }
}

?>


</body>
</html>