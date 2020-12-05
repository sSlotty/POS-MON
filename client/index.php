<?php
 include_once('../connect.php');

 if($_SESSION['UserID']){
  
   header( "location: dashboard/index.php" );
   exit(0);
 }else{
    header( "location: ../index.php" );
    exit(0);
 }

?>