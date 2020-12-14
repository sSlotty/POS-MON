<?php



$std_id = $_POST['std_id'];

$arr = array($std_id);

$fac = strtoupper($arr[0][0].$arr[0][1]);

$sub_id = substr($std_id, 2, 11);

echo "sub text : =>".$sub_id;
echo "</br>";
echo "faculy text : =>".$fac;




?>