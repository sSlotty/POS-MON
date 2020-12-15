<?php
include_once('../../../connect.php');
header("Content-type: application/json; charset=utf-8"); 


$id = $_POST['id'];
$shop_id = $_SESSION['ShopID'];


$sql = "DELETE FROM `coupon` WHERE `id_coupon` = '".$id."' AND `shop_id` = '".$shop_id."'";
$result = $conn->query($sql) or die($conn->error);

if($result){
    echo json_encode(["status"=>true,"message"=>"ลบข้อมูลสำเร็จ !"]);
}else{
    echo json_encode(["status"=>false,"message"=>"ลบข้อมูลไม่สำเร็จ !"]);
}



?>