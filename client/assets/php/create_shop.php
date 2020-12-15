<?php
    include_once('../../../connect.php');
    header("Content-type: application/json; charset=utf-8"); 

    $user_id = $_SESSION['UserID'];
    $name = $_POST['name'];
    $shop_name = $_POST['shop_name'];
    $address = $_POST['address'];


    $shop_id = rand(0,9999) * 9999;
    $sql_id = "SELECT * FROM `members` WHERE `shop_id` = '".$shop_id."' ";
    $sql_checkid = $conn->query($sql_id) or die($conn->error);

    if(!$sql_checkid->num_rows){
        $shop = "UPDATE `members` SET 
                `name`= '".$name."',
                `shop_name`= '".$shop_name."',
                `shop_id`= '".$shop_id."',
                `address`= '".$address."',
                `verify`= 'true' WHERE `user_id` = '".$user_id."'";
        $query = $conn->query($shop) or die($conn->error);
        $_SESSION['verify'] = "true";
        $_SESSION['ShopID'] = $shop_id;
        
        if($query){
            echo json_encode(["status"=>true,"message"=>"สร้างร้านค้าสำเร็จ !"]);

        }else{
            echo json_encode(["status"=>false,"message"=>"ระบบขัดข้อง โปรดติดต่อเจ้าหน้าที่ !"]);

        }
    }else{
        echo json_encode(["status"=>false,"message"=>"ระบบขัดข้อง โปรดติดต่อเจ้าหน้าที่ !"]);

    }
?>