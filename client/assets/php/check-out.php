<?php
header("Content-type: application/json; charset=utf-8"); 
$obj = array($_POST['myCart']);

$jsontoArray = $obj[0];

$cart = json_decode($jsontoArray, true);

if(count($cart) <= 0 ){

    for($i = 0; $i <= count($cart)-1; $i++){
        $name = $cart[$i]['name'];
        $price = $cart[$i]['price'];
        $count = $cart[$i]['count'];
        $id = $cart[$i]['id'];
        $shop = $cart[$i]['shop'];
        $total = $cart[$i]['total'];
    }

}else{

}
echo json_encode(["status"=>false,"message"=>"ไม่มีสินค้า"]);




