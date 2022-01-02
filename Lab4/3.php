<?php


function casechange($input,$caseuplow)
{
$case=$caseuplow;
$n=array();

if(!is_array($input))
{
return $n;
}

foreach($input as $key=>$value)
{
    if(is_array($value))
    {
        $n[$key]=casechange($value, $case);
        continue;
    }
$n[$key]=($case==CASE_UPPER ? strtoupper($value):strtolower($value));
}

return $n;
}



$a=array('A'=>'Blue','B'=>'Green','c'=>'Red');
echo 'Actual array ';
print_r($a);
echo '<br>Values are in lower case:<br>'; 
$col=casechange($a,CASE_LOWER);
print_r($col);
echo '<br>Values are in upper case:<br>';
$col=casechange($a,CASE_UPPER);
print_r($col);
?>