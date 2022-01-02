<?php

function swap(&$x,&$y)
{
	$x^=$y^=$x^=$y;
}

function sortarr($a,$n)
{
	for ($i=$n;$i>=0;$i--)
	{
		for ($j=$n; $j>$n-$i; $j--)
		{
			if ($a[$j]> $a[$j-1])
				swap($a[$j],$a[$j-1]);
		}
	}
	printsorted($a,$n);
}

function printsorted($a,$n)
{
	echo "Sorting array of numbers in descending order using bubble sort: <br>";
	for ($i = 0; $i <= $n; $i++)
		echo ($a[$i]."<br>");
}

$p=array();
$n=9;
array_push($p,10);
array_push($p,11);
array_push($p,1);
array_push($p,2);
array_push($p,5);
array_push($p,6);
array_push($p,25);
array_push($p,3);
array_push($p,14);
array_push($p,31);
sortarr($p,$n);

?>
