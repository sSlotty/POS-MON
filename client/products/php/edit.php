<?php
include_once('../../../connect.php');
header("Content-type: application/json; charset=utf-8"); 

$shop_id = $_SESSION['ShopID'];
$product_name = $_POST['name'];
$price = $_POST['price'];
$amount = $_POST['amount'];
$type = $_POST['type'];
$products_id = $_POST['product_id'];


if(empty($_FILES)){
    
        $sql = "UPDATE `products` SET 
                `product_name` = '".$product_name."',
                `product_amount` = '".$price."',
                `product_type` = '".$type."',
                `product_price` = '".$price."'
                WHERE `product_id` = '".$products_id."';";
        $result = $conn->query($sql) or die($conn->error);
    
        if($result){
            echo json_encode(["status"=>true,"message"=>"แก้ไขข้อมูลสำเร็จ !"]);
        }else{
            echo json_encode(["status"=>false,"message"=>"แก้ไขข้อมูลสินค้าไม่สำเร็จ !"]);
        }
}else{
    $ran_new = rand(0,99999999) *999999;
    $temp = explode('.',$_FILES['image']['name']);
    $new_name = $_POST['name'].'_'.$products_id.'_'.$shop_id.'_'.$ran_new.'.'.end($temp);
    $url_upload = '../../assets/images/'.$new_name;
    if(move_uploaded_file($_FILES['image']['tmp_name'],$url_upload)){
        $sql = "UPDATE `products` SET 
                `product_name` = '".$product_name."',
                `product_amount` = '".$amount."',
                `product_type` = '".$type."',
                `product_image` = '".$new_name."',
                `product_price` = '".$price."'
                WHERE `product_id` = '".$products_id."';";
        $result = $conn->query($sql) or die($conn->error);
    
        if($result){
            echo json_encode(["status"=>true,"message"=>"แก้ไขข้อมูลสำเร็จ !"]);
        }else{
            echo json_encode(["status"=>false,"message"=>"แก้ไขข้อมูลสินค้าไม่สำเร็จ !"]);
        }
    }else{
        echo json_encode(["status"=>false,"message"=>"กรุณาลองใหม่อีกครั้ง !"]);
    }
}










?>