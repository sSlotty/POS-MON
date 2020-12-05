<?php
include_once('../../../connect.php');
header("Content-type: application/json; charset=utf-8"); 


$id = $_POST['id'];

$check = "SELECT * FROM products WHERE product_id = $id";
$result_check = $conn->query($check) or die($conn->error);
$row = $result_check->fetch_assoc();

if($row['status'] == 'on'){
    $status = 'off';
}else{
    $status = 'on';
}

$sql = "UPDATE `products` SET `status` = '".$status."' WHERE `product_id` = $id";
$result = $conn->query($sql) or die($conn->error);

if($result){
    echo json_encode(["status"=>true,"message"=>"Updated successfully!"]);
}else{
    echo json_encode(["status"=>false,"message"=>"Updated failed !"]);
}



?>