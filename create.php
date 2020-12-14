<?php include_once('../authen.php') ?>
<meta charset="utf-8">

<?php

    if(isset($_POST['submit'])){
        $tag = 'All,'. join(',', $_POST['tags']);
        $status = isset($_POST['status']) ? 'true': 'false';
        $temp = explode('.',$_FILES['file']['name']);
        $detail = str_replace('../../../', './', $_POST['detail']);
        $new_name = 'OW_' . round(microtime(true)*9999) . '.' . end($temp);
        $url_upload = '../../../assets/images/blog/'.$new_name;
        $username = $_POST['username'];
        if( move_uploaded_file($_FILES['file']['tmp_name'], $url_upload) ){
            $sql = "INSERT INTO `articles` (`subject`, `sub_title`, `detail`, `image`, `tag`, `status`, `created_at`, `updated_at`,`created_by`, `updated_by`) 
                    VALUES ('".$_POST['subject']."', 
                            '".$_POST['sub_title']."', 
                            '".$detail."', 
                            '".$new_name."', 
                            '".$tag."', 
                            '".$status."', 
                            '".date("Y-m-d H:i:s")."', 
                            '".date("Y-m-d H:i:s")."',
                            '".$username."',
                            '".$username."');";
            $result = $conn->query($sql) or die($conn->error);
            if($result){
                echo '<script> alert("Create complete!")</script>';
                header('Refresh:0; url=index.php'); 
            } else {
                echo '<script> alert("Failed to create") </script>';
                header('Refresh:0; url=form-create.php');
            }

        } else {
            echo 'No';
        }

    } else {
        header('location:index.php');
    }

?>