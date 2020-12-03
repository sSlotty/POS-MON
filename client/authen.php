<?php
require_once('../authen_verify.php');
if(!$_SESSION['UserID']){
    header('Location: ../../index.php');
}


?>