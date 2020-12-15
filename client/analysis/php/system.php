<?php
include_once('../../../connect.php');
header("Content-type: application/json; charset=utf-8"); 

$shop_id = $_SESSION['ShopID'];




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
}
?>