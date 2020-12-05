<?php
    include_once('../../../connect.php');
    header("Content-type: application/json; charset=utf-8"); 

    $user_id = $_SESSION['UserID'];

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $line = $_POST['line_notify'];

    $shop_name = $_POST['shopname'];
    $address = $_POST['address'];

        $sql = "UPDATE `members` SET 
                `name`= '".$name."',
                `phone`= '".$phone."',
                `line_notify`= '".$line."',
                `shop_name`= '".$shop_name."',
                `address`= '".$address."' WHERE `user_id` = '".$user_id."'";
        $query = $conn->query($sql) or die($conn->error);

        
        if($query){
            echo json_encode(["status"=>true,"message"=>"แก้ไขข้อมูลสำเร็จ !"]);

        }else{
            echo json_encode(["status"=>false,"message"=>"แก้ไขข้อมูลไม่สำเร็จ !"]);

        }

?>