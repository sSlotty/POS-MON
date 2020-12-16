<?php 
    require_once('../../connect.php');
    header("Content-type: application/json; charset=utf-8"); 

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM members WHERE username = ?;");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    

    if(!empty($row)){

        if(password_verify($password, $row['password'])){

            

            $sql = "SELECT * FROM members WHERE `username` LIKE '".$username."'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
           

            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];
            $_SESSION['UserID'] = $row['user_id'];
            $_SESSION['ShopID'] = $row['shop_id'];
            $_SESSION['verify'] = $row['verify'];
            $_SESSION['email'] = $row['email'];

            // $cookie_value = $username;
            // setcookie('UserID', $cookie_value, time() + (86400 * 30), "/");

            echo json_encode(["status"=>true,"message"=>"Login!"]);
        } else {
            echo json_encode(["status"=>false,"message"=>"Login failed!"]);
        }
    } else {
        echo json_encode(["status"=>false,"message"=>"The user account can't be found!"]);
    }
    
    header('Refresh:0; url= ../../index.php');


?>