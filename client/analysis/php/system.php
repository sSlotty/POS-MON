<?php
include_once('../../../connect.php');
header("Content-type: application/json; charset=utf-8"); 

$shop_id = $_SESSION['ShopID'];
$user_id = $_SESSION['UserID'];


empty($row['line_notify']);


if($_POST['data'] == 'All'){

    $sql = "SELECT
    YEAR(`created_at`) AS `year`,
    SUM(IF(MONTH(`created_at`)=1,`total`,NULL)) AS `1`,
    SUM(IF(MONTH(`created_at`)=2,`total`,NULL)) AS `2`,
    SUM(IF(MONTH(`created_at`)=3,`total`,NULL)) AS `3`,
    SUM(IF(MONTH(`created_at`)=4,`total`,NULL)) AS `4`,
    SUM(IF(MONTH(`created_at`)=5,`total`,NULL)) AS `5`,
    SUM(IF(MONTH(`created_at`)=6,`total`,NULL)) AS `6`,
    SUM(IF(MONTH(`created_at`)=7,`total`,NULL)) AS `7`,
    SUM(IF(MONTH(`created_at`)=8,`total`,NULL)) AS `8`,
    SUM(IF(MONTH(`created_at`)=9,`total`,NULL)) AS `9`,
    SUM(IF(MONTH(`created_at`)=10,`total`,NULL)) AS `10`,
    SUM(IF(MONTH(`created_at`)=11,`total`,NULL)) AS `11`,
    SUM(IF(MONTH(`created_at`)=12,`total`,NULL)) AS `12`
    FROM `simple_receipt` WHERE shop_id = '".$shop_id."'
    GROUP BY `year`";
    
    $result = $conn->query($sql) or die($conn->error);
    $row = $result->fetch_assoc();
    
    echo json_encode(["status"=>true,"year"=>$row['year'],"Jan"=>$row['1'],"Feb"=>$row['2'],"Mar"=>$row['3'],"Apr"=>$row['4'],"May"=>$row['5'],"Jun"=>$row['6'],"Jul"=>$row['7'],"Aug"=>$row['8'],"Sep"=>$row['9'],"Oct"=>$row['10'],"Nov"=>$row['11'],"Dec"=>$row['12']]);

}else if ($_POST['data'] == 'product'){
    $sql = "SELECT
    YEAR(`created_at`) AS `year`,
    SUM(IF(MONTH(`created_at`)=1,`amount`,NULL)) AS `1`,
    SUM(IF(MONTH(`created_at`)=2,`amount`,NULL)) AS `2`,
    SUM(IF(MONTH(`created_at`)=3,`amount`,NULL)) AS `3`,
    SUM(IF(MONTH(`created_at`)=4,`amount`,NULL)) AS `4`,
    SUM(IF(MONTH(`created_at`)=5,`amount`,NULL)) AS `5`,
    SUM(IF(MONTH(`created_at`)=6,`amount`,NULL)) AS `6`,
    SUM(IF(MONTH(`created_at`)=7,`amount`,NULL)) AS `7`,
    SUM(IF(MONTH(`created_at`)=8,`amount`,NULL)) AS `8`,
    SUM(IF(MONTH(`created_at`)=9,`amount`,NULL)) AS `9`,
    SUM(IF(MONTH(`created_at`)=10,`amount`,NULL)) AS `10`,
    SUM(IF(MONTH(`created_at`)=11,`amount`,NULL)) AS `11`,
    SUM(IF(MONTH(`created_at`)=12,`amount`,NULL)) AS `12`
    FROM `receipt` WHERE shop_id = '".$shop_id."'
    GROUP BY `year`";
    
    $result = $conn->query($sql) or die($conn->error);
    $row = $result->fetch_assoc();
    echo json_encode(["status"=>true,"year"=>$row['year'],"Jan"=>$row['1'],"Feb"=>$row['2'],"Mar"=>$row['3'],"Apr"=>$row['4'],"May"=>$row['5'],"Jun"=>$row['6'],"Jul"=>$row['7'],"Aug"=>$row['8'],"Sep"=>$row['9'],"Oct"=>$row['10'],"Nov"=>$row['11'],"Dec"=>$row['12']]);
}else if($_POST['data'] == 'period'){
    
    // $start = $_POST['start'];
    // $end = $_POST['end'];

    $start = new DateTime($_POST['start']);
    $end = new DateTime($_POST['end']);

    $sql = "SELECT sum(total) as total FROM simple_receipt WHERE created_at BETWEEN '".$start->format('Y-m-d')."' AND '".$end->format('Y-m-d')."' AND shop_id = '".$shop_id."';";
    $result = $conn->query($sql) or die($conn->error);
    $row = $result->fetch_assoc();

    $sql2 = "SELECT count(id) as total FROM receipt WHERE created_at BETWEEN '".$start->format('Y-m-d')."' AND '".$end->format('Y-m-d')."' AND shop_id = '".$shop_id."';";
    $result2 = $conn->query($sql2) or die($conn->error);
    $row2 = $result2->fetch_assoc();

    echo json_encode(["status"=>true,"total_money"=>$row['total'],"total_product"=>$row2['total']]);
    

    // $sql = "SELECT line_notify FROM members WHERE user_id = '".$user_id."'";
    // $result = $conn->query($sql) or die($conn->error);
    // $row = $result->fetch_assoc();

    // if(!empty($row['line_notify'])){

    //     $line = $row['line_notify'];
    //     $now = date("h:i:sa");
    //     sendLine($text,$line);

    // }else{
    //     echo json_encode(["status"=>false,"message"=>"Your line notify is valid"]);

    // }
    
}else{

}

function sendLine($text,$line){
    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set("Asia/Bangkok");

	$sToken = $line;
	$sMessage = $text;

	
	$chOne = curl_init(); 
	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

	//Result error 
	// if(curl_error($chOne)) 
	// { 
	// 	echo 'error:' . curl_error($chOne); 
	// } 
	// else { 
	// 	$result_ = json_decode($result, true); 
	// 	echo "status : ".$result_['status']; echo "message : ". $result_['message'];
	// } 
	curl_close( $chOne );   
}

?>