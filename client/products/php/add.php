<?php
include_once('../../../connect.php');

echo exec('whoami');


print_r($_POST);
// print_r($_FILES);
$products_id = rand(0,99999999) *999999;
echo $products_id;

$temp = explode('.',$_FILES['image']['name']);
echo '</br>';
$new_name = $_POST['name'].'_'.$products_id.'_'.$_SESSION['UserID'].'.'.end($temp);
$url_upload = '../../assets/images/'.$new_name;
if(move_uploaded_file($_FILES['image']['tmp_name'],$url_upload)){
    echo 'Success to upload file';
}else{
    echo 'Failed to upload file';
}


// print_r($_FILES[0]);
// echo $temp;

?>