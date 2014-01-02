<?php
$first = rand(130,139);
$end = rand(10000000,99999999);
$res = $first.$end;
echo substr_replace($res,'****',3,4);
//echo rand(1000,9999);
?>