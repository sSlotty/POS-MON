<?php
include_once('../../../connect.php');
header("Content-type: application/json; charset=utf-8"); 

// print_r($_POST);
 // print_r($_FILES['image']['name']);

$products_id = rand(0,99999999) *999999;

$shop_id = $_SESSION['ShopID'];
$product_name = $_POST['name'];
$price = $_POST['price'];
$amount = $_POST['amount'];
$type = $_POST['type'];

$temp = explode('.',$_FILES['image']['name']);

$new_name = $_POST['name'].'_'.$products_id.'_'.$shop_id.'.'.end($temp);
$url_upload = '../../assets/images/'.$new_name;

if(move_uploaded_file($_FILES['image']['tmp_name'],$url_upload)){
    $sql = "INSERT INTO `products` (`id_shop`, `product_name`, `product_id`, `product_amount`, `product_type`, `product_image`, `product_price`) 
    VALUES ('".$shop_id."', '".$product_name."', '".$products_id."', '".$amount."', '".$type."', '".$new_name."', '".$price."');";
    $result = $conn->query($sql) or die($conn->error);

    if($result){
        echo json_encode(["status"=>true,"message"=>"เพิ่มสินค้าสำเร็จ !"]);
    }else{
        echo json_encode(["status"=>false,"message"=>"เพิ่มสินค้าไม่สำเร็จ !"]);
    }
}else{
    echo json_encode(["status"=>true,"message"=>"กรุณาลองใหม่อีกครั้ง !"]);
}


?>