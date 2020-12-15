<?php 

include_once('../../../connect.php');
header("Content-type: application/json; charset=utf-8"); 

$name = $_POST['name_coupon'];
$id_coupon = $_POST['id_coupon'];
$percent = $_POST['percent'];
$quantity = $_POST['quantity'];
$date = $_POST['date-end'];
$price = $_POST['price_condition'];
$shop_id = $_SESSION['ShopID'];

$sql = "SELECT * FROM coupon WHERE id_coupon LIKE '".$id_coupon."' AND shop_id LIKE '".$shop_id."'";
$result = $conn->query($sql) or die($conn->error);


if(!$result->num_rows){

    if(!empty($_POST)){
        $sql = "INSERT INTO `coupon` (`name`, `id_coupon`, `shop_id`,`percent`, `price_condition`, `quantity`, `date_end`) 
        VALUES ('".$name."', '".$id_coupon."', '".$shop_id."', '".$percent."', '".$price."','".$quantity."', '".$date."');";
        $result = $conn->query($sql) or die($conn->error);
    
        if($result){
        echo json_encode(["status"=>true,"message"=>"เพิ่มคูปองสำเร็จ !"]);
        }else{
        echo json_encode(["status"=>false,"message"=>"เพิ่มคูปองไม่สำเร็จ !"]);
        }
    }else{
        echo json_encode(["status"=>false,"message"=>"เพิ่มคูปองไม่สำเร็จ !"]);
    
    }

}else{

    echo json_encode(["status"=>false,"message"=>"คูปองซ้ำ !"]);
    
}



?>