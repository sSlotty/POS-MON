<?php 
    require_once('../../connect.php');


    header("Content-type: application/json; charset=utf-8"); 

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user_id = rand(0,99999999) * 999999;
        

        $sql_username = "SELECT * FROM `members` WHERE `username` LIKE '".$username."' ";
        $sql_check = $conn->query($sql_username) or die($conn->error);

        $sql_id = "SELECT * FROM `members` WHERE `user_id` LIKE '".$user_id."' ";
        $sql_checkid = $conn->query($sql_id) or die($conn->error);

        $sql_mail = "SELECT * FROM `members` WHERE `email` LIKE '".$email."' ";
        $sql_checkmail = $conn->query($sql_mail) or die($conn->error);

        if(!$sql_checkmail->num_rows){

            if(!$sql_checkid->num_rows){

                if(!$sql_check->num_rows){
    
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $sql_create = "INSERT INTO `members` (`user_id`, `username`, `password`,`email`) 
                    VALUES ('".$user_id."', 
                            '".$username."',
                            '".$hashed_password."',
                            '".$email."');";
                    
                    $result = $conn->query($sql_create) or die($conn->error);
                    

                    if($result){
                        echo json_encode(["status"=>true,"message"=>"สมัครสำเร็จ !"]);
        
                    }else{
                        echo json_encode(["status"=>false,"message"=>"ระบบผิดพลาดกรุณาติดต่อ Dev"]);
                    }
                }else{
                    echo json_encode(["status"=>false,"message"=>"Username ซ้ำ กรุณาเลือก Username ใหม่"]);
                }
            }else{
                echo json_encode(["status"=>false,"message"=>"Invalid UserID"]);
            }

        }else{
                echo json_encode(["status"=>false,"message"=>"Invalid Email"]);
        }
        
        
    
        // header('Refresh:0; url= ../../index.php');


?>