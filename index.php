<?php 
include_once('connect.php');
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/MDB-Pro/css/mdb.min.css">
    <link rel="stylesheet" href="node_modules/FontAwesomePro/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <!--Main Navigation-->
    <header>

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
            <div class="container">
                <a class="navbar-brand" href="#"><strong>MON</strong></a>
                <?php if($_SESSION['UserID']){
                    echo '<a type="button" class="navbar-brand btn btn-md btn-danger" href="client/index.php"><strong>DASHBOARD</strong></a>';
                    }?>

            </div>
        </nav>

        <!--Intro Section-->
        <section class="view intro-2">
            <div class="mask rgba-gradient"></div>
            <div class="container h-100 d-flex justify-content-center align-items-center">
                <div class="row flex-center pt-5 mt-3">
                    <div class="col-md-6 text-center text-md-left margins">
                        <div class="white-text">
                            <h1 class="h1-responsive font-weight-bold wow fadeInLeft" data-wow-delay="0.3s">MON Point of
                                Sale</h1>
                            <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s">
                            <h6 class="wow fadeInLeft" data-wow-delay="0.3s">ระบบจัดการสินค้าภายในร้านค้า
                                ที่มีความทันสมัยใช้งานง่าย เหมาะสมกับคนยุคใหม่ชิคๆ</h6>
                            <br>
                            <a class="btn btn-light-green wow fadeInLeft" data-wow-delay="0.3s"
                                href="login.php">Login</a>
                            <a class="btn btn-amber wow fadeInLeft" data-wow-delay="0.3s" href="register.php">Register
                                <i class="fas fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6 wow fadeInRight d-flex justify-content-center" data-wow-delay="0.3s">
                        <img src="https://mdbootstrap.com/img/Mockups/Transparent/Small/iphone-admin.png" alt=""
                            class="img-responsive">
                    </div>
                </div>
            </div>
            </div>
        </section>

    </header>


    <main>

        <div class="container">

            <section class="my-5 wow fadeIn" data-wow-delay="0.3s">
            <h5 class="wow fadeIn"><span style="font-size:50px">F</span><span style="font-size:40px">eature</span></h5>

                <div class="row">
                    <div class="col-6">

                        <p><i class="fas fa-check text-success"></i> ระบบตระกร้าสินค้า</p>
                        <p><i class="fas fa-check text-success"></i> ระบบเพิ่มของเข้าไปในคลังสินค้า</p>
                        <p><i class="fas fa-check text-success"></i> ระบบคูปองส่วนลด</p>
                        <p><i class="fas fa-check text-success"></i> ระบบการจัดการสมาชิก</p>
                        <p><i class="fas fa-check text-success"></i> ตัดยอดขายรายวัน</p>
                        <p><i class="fas fa-check text-success"></i> คำนวนภาษีมูลค่าเพิ่มอัตโนมัติ</p>
                        <p><i class="fas fa-check text-success"></i> ตัดสต๊อกสินค้าอัตโนมัติ</p>
                        <p><i class="fas fa-check text-success"></i> สามรถดูใบเสร็จย้อนหลังได้</p>
                        <p><i class="fas fa-check text-success"></i> ระบบ Data Analytics</p>
                       
                    </div>
                    <div class="col-6">
                        <!--Mask with wave-->
                            <img src="https://cf.shopee.co.th/file/1746412dab48f93a02d234a570163cb5"
                                class="img-fluid" alt="Sample image with waves effect.">
                                <div class="mask waves-effect rgba-white-slight"></div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="my-5 wow fadeIn" data-wow-delay="0.3s">

                <h2 class="h1-responsive font-weight-bold text-center my-5">โปรเจคนี้จัดทำขึ้นมาโดย</h2>

                <p class="text-center w-responsive mx-auto grey-text">นิสิต สาขาวิทยาการคอมพิวเตอร์ คณะวิทยาศาตร์
                    มหาวิทยาลัยศรีนครินทรวิโรฒ </p>
                <p class="text-center w-responsive mx-auto mb-5 grey-text">สามารถเข้ามาใช้งานและทดสอบ
                    ประสิทธิภาพของระบบได้ ฟรี</p>

                <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-12 mb-4">

                        <!--Card-->
                        <div class="card testimonial-card">

                            <!--Background color-->
                            <div class="card-up teal lighten-2">
                            </div>

                            <!--Avatar-->
                            <div class="avatar mx-auto white"><img
                                    src="https://supreme.swu.ac.th/file_staff_upload/file_student_pic/2562_1/62102010027.jpg"
                                    alt="avatar mx-auto white" class="rounded-circle img-fluid">
                            </div>

                            <div class="card-body">
                                <!--Name-->
                                <h4 class="card-title mt-1">THANATHIP CHANASRI</h4>
                                <hr>
                                <!--Quotation-->
                                <p><i class="fas fa-quote-left"></i> Devloper</p>
                            </div>

                        </div>
                        <!--Card-->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-12 mb-4">

                        <!--Card-->
                        <div class="card testimonial-card">

                            <!--Background color-->
                            <div class="card-up blue lighten-2">
                            </div>

                            <!--Avatar-->
                            <div class="avatar mx-auto white"><img
                                    src="https://supreme.swu.ac.th/file_staff_upload/file_student_pic/2562_1/62102010175.jpg"
                                    alt="avatar mx-auto white" class="rounded-circle img-fluid">
                            </div>

                            <div class="card-body">

                                <h4 class="card-title mt-1">Anna Aston</h4>
                                <hr>

                                <p><i class="fas fa-quote-left"></i> Content</p>
                            </div>

                        </div>


                    </div>



                    <div class="col-lg-4 col-md-12 mb-4">


                        <div class="card testimonial-card">


                            <div class="card-up deep-purple lighten-2"></div>


                            <div class="avatar mx-auto white"><img
                                    src="https://supreme.swu.ac.th/file_staff_upload/file_student_pic/2562_1/62102010429.jpg"
                                    alt="avatar mx-auto white" class="rounded-circle img-fluid">
                            </div>

                            <div class="card-body">

                                <h4 class="card-title mt-1">Maria Kate</h4>
                                <hr>

                                <p><i class="fas fa-quote-left"></i> Co dev</p>
                            </div>

                        </div>

                    </div>

                </div>

            </section>



        </div>


    </main>

    <footer class="page-footer pt-4 mt-4   mdb-color lighten-3 text-center text-md-left">

        <div class="footer-copyright text-center py-3 wow fadeIn" data-wow-delay="0.3s">
            <div class="container-fluid">
                &copy; 2020 Copyright: <a href=""> MON studio </a>
            </div>
        </div>
        <!--/Copyright-->

    </footer>
    <!--/Footer-->


    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/MDB-Pro/js/mdb.min.js"></script>
    <script src="node_modules/mdbootstrap/js/addons/datatables.min.js"></script>
    <!-- <script src="assets/js/block-console.js"></script> -->

</body>

</html>