<?php 
 include_once('../connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create shop</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/MDB-Pro/css/mdb.min.css">
    <link rel="stylesheet" href="../node_modules/FontAwesomePro/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../assets/style.css">

</head>

<body class="fixed-sn">

    <!--Main layout-->

    <div class="container my-4 mt-5">

        <div class="row">

            <!--Grid column-->
            <div class="col-md-12 mb-4 ">

                <div class="card">
                    <div class="card-header text-center">
                        Create your shop
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <p>กรุณาสร้างร้านค้าก่อนเข้าใช้งาน</p>

                                <form action="" method="post" id="form">
                                    <div class="md-form">
                                        <input type="text" id="name" name="name" class="form-control" required>
                                        <label for="name">ชื่อ - นามสกุล</label>
                                    </div>
                                    <div class="md-form">
                                        <input type="text" id="shop_name" name="shop_name" class="form-control" required>
                                        <label for="shop_name">ชื่อร้านค้า</label>
                                    </div>

                                    <div class="md-form md-outline">
                                        <textarea id="address" name="address" class="md-textarea form-control" rows="3" required></textarea>
                                        <label for="address">ที่อยู่</label>
                                    </div>

                                    <button class="float-right btn btn-dark-green" type="submit">Confirm</button>
                                
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/MDB-Pro/js/mdb.min.js"></script>
    <script src="../node_modules/mdbootstrap/js/addons/datatables.min.js"></script>
    <script src="../node_modules/MDB-Pro/src/js/pro/sidenav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="assets/js/create_shop.js"></script>

</body>

</html>