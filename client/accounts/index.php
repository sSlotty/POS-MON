<?php 
 include_once('../../connect.php');
 require_once('../authen.php');

 $sql = "SELECT * FROM members WHERE `username` LIKE '".$_SESSION['username']."'";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Management</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../node_modules/MDB-Pro/css/mdb.min.css">
    <link rel="stylesheet" href="../../node_modules/FontAwesomePro/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../assets/sidebar.css">
    <link rel="stylesheet" href="../assets/style.css">

</head>

<body class="fixed-sn cyan-skin">

    <!-- Sidebar -->
    <?php require_once('../include/sidebar.php'); ?>
    <!--Main layout-->
    <main>
        <div class="container-fluid mb-5">
            <div class="row">
                <div class="col-md-12">
                    <!-- Card -->
                    <div class="card testimonial-card">

                        <!-- Background color -->
                        <div class="card-up indigo lighten-1"></div>

                        <!-- Avatar -->
                        <div class="avatar mx-auto white">
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%2810%29.jpg"
                                class="rounded-circle" alt="woman avatar">
                        </div>

                        <!-- Content -->
                        <div class="card-body">
                            <!-- Name -->
                            <h4 class="card-title"><? echo $row['name'];?></h4>
                            <hr>
                            <!-- Form -->
                            <form class="text-center" style="color: #757575;" action="#!">

                                <!-- Email -->
                                <div class="md-form">
                                    <input type="text" id="name" name="name" class="form-control" value="<? echo $row['name'];?>" disabled>
                                    <label for="name">Name</label>
                                </div>

                                <!-- Password -->
                                <div class="md-form">
                                    <input type="text" id="shopid" name="shopid" class="form-control" value="<? echo $row['id_shop'];?>" disabled>
                                    <label for="shopid">Shop ID</label>
                                </div>

                                <div class="md-form">
                                    <input type="text" id="userid" name="userid" class="form-control" value="<? echo $row['user_id'];?>" disabled>
                                    <label for="userid">User ID</label>
                                </div>

                                <div class="md-form">
                                    <input type="text" id="shopname" name="shopname" class="form-control" value="<? echo $row['shop_name'];?>" disabled>
                                    <label for="shopname">Shop name</label>
                                </div>

                                <div class="md-form">
                                    <input type="email" id="email" name="email" class="form-control" value="<? echo $row['email'];?>" disabled>
                                    <label for="email">E-mail</label>
                                </div>

                                <div class="md-form">
                                    <input type="text" id="line_notify" name="line_notify" class="form-control" value="" disabled>
                                    <label for="line_notify">Line Notify</label>
                                </div>

                                <div class="md-form">
                                    <input type="text" id="phone" name="phone" class="form-control" value="" disabled>
                                    <label for="phone">Phone</label>
                                </div>

                                <!-- Sign in button -->
                                <a href="um-edit.php"class="btn btn-outline-warning btn-rounded btn-block my-4 waves-effect z-depth-0"
                                    type="submit">Edit</a>

                                

                        

                            </form>
                            <!-- Form -->

                        </div>
                        <!-- Card -->
                    </div>
                </div>
            </div>
    </main>
    <!--/Main layout-->

    <!-- Footer -->
    <?php require_once('../include/footer.php');?>


    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../node_modules/MDB-Pro/js/mdb.min.js"></script>
    <script src="../../node_modules/mdbootstrap/js/addons/datatables.min.js"></script>
    <script src="../../node_modules/MDB-Pro/src/js/pro/sidenav.js"></script>
    <script src="../assets/sidebar.js"></script>
</body>

</html>