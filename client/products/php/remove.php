<?php
include_once('../../../connect.php');
header("Content-type: application/json; charset=utf-8"); 


$id = $_POST['id'];

$sql = "DELETE FROM `products` WHERE `product_id` = $id";
$result = $conn->query($sql) or die($conn->error);

if($result){
    echo json_encode(["status"=>true,"message"=>"ลบข้อมูลสำเร็จ !"]);
}else{
    echo json_encode(["status"=>false,"message"=>"ลบข้อมูลไม่สำเร็จ !"]);
}



?>