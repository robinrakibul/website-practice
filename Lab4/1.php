<?php

$x = 2000;
$y = 8000;

function primenumber($MyNum) 
{
  $n = 0;

  for($i=2; $i<($MyNum/2+1); $i++) {
    if($MyNum%$i == 0){
      $n++;
      break;
    }
  }
  if ($n == 0){
    echo $MyNum." ";
	
  } 
}


echo "Prime numbers between ".$x." and ".$y." are: <br>";

for($i=$x; $i<$y+1; $i++) {
	primenumber($i);
        
}


?>
