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
    <link rel="stylesheet" href="assets/style.css">
</head>

<style>
    .card {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
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

<body>
    <header>

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
            <div class="container">
                <a class="navbar-brand" href="#"><strong>MON</strong></a>

                <?php if($_SESSION['UserID']){ ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i> Profile </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-info"
                                aria-labelledby="navbarDropdownMenuLink-4">
                                <a class="dropdown-item" href="client/">Dashboard</a>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php }else{
                       
                   }?>



            </div>
        </nav>

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
                        <img src="assets/pic/S__54206550.png" alt=""
                            class="img-responsive" style="width: 500px;">
                    </div>
                </div>
            </div>
            </div>
        </section>

    </header>


    <main>

        <div class="container">

            <section class="my-5 wow fadeIn" data-wow-delay="0.3s">
                <h5 class="wow fadeIn"><span style="font-size:50px">F</span><span style="font-size:40px">eature</span>
                </h5>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">

                        <p><i class="fas fa-check text-success"></i> ระบบตระกร้าสินค้า</p>
                        <p><i class="fas fa-check text-success"></i> ตัดยอดขายรายวัน</p>
                        <p><i class="fas fa-check text-success"></i> ระบบเพิ่มของเข้าไปในคลังสินค้า</p>
                        <p><i class="fas fa-check text-success"></i> ตัดสต๊อกสินค้าอัตโนมัติ</p>
                        <p><i class="fas fa-check text-success"></i> ระบบแจ้งเตือน Linenotify</p>
                        <p><i class="fas fa-check text-success"></i> สามรถดูใบเสร็จย้อนหลังได้</p>
                        <p><i class="fas fa-check text-success"></i> ระบบสถิติ </p>


                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <img src="assets/pic/01.png" class="img-fluid" alt="Sample image with waves effect.">
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
            <div class="container-fulid ml-3 mr-3">
                <div class="row">

                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="touch">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="zoom">
                                                <img src="assets/pic/oat.jpg" class="img-fluid z-depth-1 rounded-circle"
                                                    alt="zoom">
                                                <div class="mask flex-center waves-effect waves-light">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h5>Mr.Thanathip Chansri</h5>
                                            <p>Computer Science</p>
                                            <p>Faculy Of Science, Srinakharinwirot University</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="touch">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="zoom">
                                                <img src="assets/pic/mook.jpg"
                                                    class="img-fluid z-depth-1 rounded-circle" alt="zoom">
                                                <div class="mask flex-center waves-effect waves-light">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h5>Miss.Prathana Khuenkhwanwong</h5>
                                            <p>Computer Science</p>
                                            <p>Faculy Of Science, Srinakharinwirot University</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>



                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="touch">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="zoom">
                                                <img src="assets/pic/S__3661919.jpg"
                                                    class="img-fluid z-depth-1 rounded-circle" alt="zoom">
                                                <div class="mask flex-center waves-effect waves-light">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h5>Mr.Kittawat klittiparikun</h5>
                                            <p>Computer Science</p>
                                            <p>Faculy Of Science, Srinakharinwirot University</p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>

                </div>

            </div>

        </section>



        </div>


    </main>

    <footer class="page-footer pt-4 mt-4 text-center text-md-left" style="background-color: #003559;">

        <div class="footer-copyright text-center py-3 wow fadeIn" data-wow-delay="0.3s">
            <div class="container-fluid">
                &copy; 2020 Copyright: <a href=""> MON studio </a>
            </div>
        </div>

    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/MDB-Pro/js/mdb.min.js"></script>
    <script src="node_modules/mdbootstrap/js/addons/datatables.min.js"></script>
    <script src="assets/js/block-console.js"></script>

</body>

</html>