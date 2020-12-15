<?php
include_once('../../../connect.php');
header("Content-type: application/json; charset=utf-8"); 

$obj = array($_POST['cart']);
$shop_id = $_SESSION['ShopID'];
$receipt_id = rand(0,99999) * 99999999;
$discount = 0;

$decode = json_decode($obj[0], true);




$AllTotal = 0;
for($i = 0; $i < count($decode); $i++){
    $name = $decode[$i]['name'];
    $price = $decode[$i]['price'];
    $count = $decode[$i]['count'];
    $id = $decode[$i]['id'];
    $shop = $decode[$i]['shop'];
    $amount = $decode[$i]['amount'];
    $total = $decode[$i]['total'];

    $updated_count = $amount - $count;
    $AllTotal = $AllTotal + $total;
    if($updated_count <= 0 ) $updated_count = 0;
    $updated = "UPDATE `products` SET `product_amount` = '".$updated_count."' WHERE `product_id` = $id ;";
    $re_up = $conn->query($updated) or die($conn->error);

    $sql = "INSERT INTO `receipt` (`receipt_id`, `product_id`, `shop_id`, `product_name`, `amount`, `price`) 
    VALUES ('".$receipt_id."', '".$id."', '".$shop_id."', '".$name."', '".$count."', '".$price."');";
    $result = $conn->query($sql) or die($conn->error);
    
}

$money = $_POST['money'];
$temp = 0;

if(!empty($_POST['coupon'])){
  $coupon = $_POST['coupon'];
  $sql_cou = "SELECT * FROM coupon WHERE id_coupon = '".$coupon."' AND shop_id = '".$shop_id."'";
  $result_cou = $conn->query($sql_cou);
  
  if($result_cou->num_rows){
    $row = $result_cou->fetch_assoc();
    
    if($AllTotal >=$row['percent']){

      $discount = $row['percent'];

      $temp = ($AllTotal * $discount) / 100;
      
    }

    $quantity = $row['quantity'] - 1;
    $sql_updated = "UPDATE `coupon` SET `quantity` = '".$quantity."' WHERE `id_coupon` = '". $coupon."' AND shop_id = '".$shop_id."';";
    $result_updated = $conn->query($sql_updated);

  }else{
    echo json_encode(["status"=>false,"message"=>"code ไม่ถูกต้อง !"]);
  }

}

$before_dis = 0;

if(empty($_POST['coupon'])){
  $change = $money - $AllTotal;

}else{

  $change = $money - $temp;
  $before_dis = $AllTotal - $temp;
}


$total_sql = "INSERT INTO `simple_receipt` (`receipt_id`, `total`,`receive`,`change_money`,`shop_id`,`discount`) 
VALUES ('".$receipt_id."', '".$AllTotal."','".$money."','".$change."','".$shop_id."','".$discount."');";

$result_total = $conn->query($total_sql) or die($conn->error);

$tag_a = "../receipts/reciept-detail.php?recipt_id=$receipt_id";
if($result){

  if($result_total){
    echo json_encode(["status"=>true,"receipt"=>"$receipt_id","total"=>"$AllTotal","link"=>"$tag_a","income"=>"$money","change"=>"$change","before_dis"=>"$before_dis","discount"=>"$discount"]);

  }else{
    echo json_encode(["status"=>false,"message"=>"ชำระเงินไม่สำเร็จ 1 !"]);

  }

}else{
  echo json_encode(["status"=>false,"message"=>"ชำระเงินไม่สำเร็จ 2 !"]);

}

?>