<?php 
    // Start session 
    session_start();
    // Set timezone 
    date_default_timezone_set('Asia/Bangkok'); 

    error_reporting(E_ALL); 
    // error_reporting(0); //ปิด Error กรณีเราสร้างตัวแสดง Error ของเราขึ้นมาเอง
    
    //เชื่อมต่อ Database
    $conn = new mysqli('oatwant.com','thanathi_pos','Cp251POS','thanathi_pos');

    // $conn = new mysqli('localhost','thanathi_pos','Cp251POS','thanathi_pos');

    // $conn = new mysqli('localhost','root','','cp251db');

    $conn->set_charset('utf8');
    if ($conn->connect_errno) {
        echo "Connect Error : ".$conn->connect_error ;
        exit();
    }
    // echo "Connected successfully";
    

?>