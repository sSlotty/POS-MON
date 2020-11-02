<?php

header("Content-type: application/json; charset=utf-8"); 


$obj = array($_POST['myCart']);

$jsontoArray = $obj[0];

$cart = json_decode($jsontoArray, true);

// print_r($cart);

for($i = 0; $i <= count($cart); $i++){
   $name = $cart['cart'][$i]['name'];
   $price = $cart['cart'][$i]['price'];
   $count = $cart['cart'][$i]['count'];
   $id = $cart['cart'][$i]['id'];
   $shop = $cart['cart'][$i]['shop'];
   $total = $cart['cart'][$i]['total'];

   sendData($name,$price,$count,$id,$shop,$total);

}


function sendData($name, $price,$count, $id, $shop, $total){
    echo json_encode(["name"=>$name,"price"=>$price,"count"=>$count,"id"=>$id,"shop"=>$shop,"total"=>$total]);

}
?>

