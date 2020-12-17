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

    <style>
        body {
            background: url("https://images.unsplash.com/photo-1573002922402-c8f094eebf16?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80") no-repeat center center;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .touch {
            margin-top: 25px;
            margin-bottom: 25px;
        }

        .touch .card {
            border: none;
            border-radius: 3rem;
        }

        @media (min-width: 992px) {
            .touch .card:hover {
                margin-top: -.25rem;
                margin-bottom: .25rem;
                box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
                transition: .2s;
            }

        }
    </style>

</head>

<body class="fixed-sn">

    <!--Main layout-->

    <div class="container my-4 mt-5">

        <div class="row">

            <!--Grid column-->
            <div class="col-md-12 mb-4 ">
                <div class="touch">

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
                                            <input type="text" id="shop_name" name="shop_name" class="form-control"
                                                required>
                                            <label for="shop_name">ชื่อร้านค้า</label>
                                        </div>
    
                                        <div class="md-form md-outline">
                                            <textarea id="address" name="address" class="md-textarea form-control" rows="3"
                                                required></textarea>
                                            <label for="address">ที่อยู่</label>
                                        </div>
    
                                        <button class="float-right btn btn-dark-green" type="submit">Confirm</button>
                                        <a href="../logout.php" type="button" class="float-left btn btn-danger" type="submit">Logout</a>
                                    </form>
    
                                </div>
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