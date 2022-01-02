<html>
<body>
    
<form method="post">
  <label for="input">Input = </label>
  <br>
  <input type="number" id="input" name="input"><br>
  <input type="submit" name="submit" value="submit">
</form>


<?php

 if(isset ($_POST['submit'])){
     $n=$_POST['input'];
     x($n);
 }

function x($n) {
    echo "<table border=black>";
        for ($r=1; $r<=$n; $r++) { 
            echo "<tr>";
            for ($c=1; $c<=$n; $c++) { 
               $a=$c*$r;
               echo "<td>$a</td>";
                   }
            echo "</tr>";
            }
    echo "</table>";
        }
?>

</body>
</html>