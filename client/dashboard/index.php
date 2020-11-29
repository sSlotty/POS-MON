<?php 
 include_once('../../connect.php');
require_once('../authen.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../node_modules/MDB-Pro/css/mdb.min.css">
    <link rel="stylesheet" href="../../node_modules/FontAwesomePro/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../assets/sidebar.css">
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;

        }

        .product-img {
            width: 300px;
            height: 200px;
        }
    </style>
</head>

<body class="fixed-sn cyan-skin">

    <!-- Sidebar -->
    <?php require_once('../include/sidebar.php'); ?>
    <!--Main layout-->
    <main>
        <div class="container-fluid mb-5">
            <div class="row">
                <div class="col-md-8 mb-4">
                <div class="card card-cascade">
                        <div class="view view-cascade gradient-card-header blue-gradient">
                                <h5> สินค้าทั้งหมด </h5>
                        </div>
                    </div>
                    <div data-spy="scroll" class="scroll scrollspy-example z-depth-1">
                        <div class="row row-cols-1 row-cols-md-4">

                            <div class="col-md-6 col-xl-4 col-lg-4 col-6 mt-3">
                                <div class="card">
                                    <div class="view overlay">
                                        <img class="card-img-top product-img"
                                            src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg"
                                            alt="Card image cap">
                                        <a href="#!">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">Lemon</h4>
                                        <p class="card-text"> Price : ฿</p>
                                        <a href="#" data-name="Lemon" data-price="5" data-id="1234"
                                            data-shop="12345678910"
                                            class="add-to-cart btn btn-sm btn-success btn-rounded">Add to cart</a>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4 col-lg-4 col-6 mt-3">
                                <div class="card">
                                    <div class="view overlay">
                                        <img class="card-img-top product-img"
                                            src="https://www.onab.go.th/th/file/get/file/202008299fd98f856d3ca2086168f264a117ed7c172810.jpg"
                                            alt="Card image cap">
                                        <a href="#!">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">Mango</h4>
                                        <p class="card-text"> Price : 10 ฿</p>
                                        <a href="#" data-name="Mango" data-price="10" data-id="22158"
                                            data-shop="12345678910"
                                            class="add-to-cart btn btn-sm btn-success btn-rounded">Add to cart</a>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4 col-lg-4 col-6 mt-3">
                                <div class="card">
                                    <div class="view overlay">
                                        <img class="card-img-top product-img"
                                            src="https://www.onab.go.th/th/file/get/file/202008299fd98f856d3ca2086168f264a117ed7c172810.jpg"
                                            alt="Card image cap">
                                        <a href="#!">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">Banana</h4>
                                        <p class="card-text"> Price : 15 ฿</p>
                                        <a href="#" data-name="banana" data-price="15" data-id="2105"
                                            data-shop="12345678910"
                                            class="add-to-cart btn btn-sm btn-success btn-rounded">Add to cart</a>

                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                </div>
                <div class="col-md-4 mb-4">
                    <div class="card card-cascade">
                        <div class="view view-cascade gradient-card-header purple-gradient">
                                <h5>Total price :  <span class="total-cart"></span> ฿</h5>
                        </div>
                    </div>
                    <div data-spy="scroll" class="scroll scrollspy-example z-depth-1">
                        <h4 class="card-title">Cart</h4>
                        <div class="btn-group float-right" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-sm btn-indigo" data-toggle="modal"
                                data-target="#modalCart">Check out</button>
                            <button type="button" class="clear-cart btn btn-sm btn-danger"><i
                                    class="fad fa-trash-alt"></i> </i>Clear cart</button>

                        </div>
                        <div class="table-responsive">
                            <table class="show-cart-simple table ">

                            </table>

                        </div>

                        <div>Total price:  </div>

                    </div>

                </div>

            </div>
        </div>
    </main>
    <!--/Main layout -->



    <!-- Modal: modalPoll -->
    <div class="modal  fade bd-example-modal-lg" id="modalCart" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead">Cart
                    </p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">×</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-lg table-striped w-100">
                            <!--Table head-->
                            <thead>
                                <tr class="text-center">
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Amount</th>
                                    <th>รวม</th>
                                    <th>Clear</th>

                                </tr>
                            </thead>
                            <!--Table head-->
                            <!--Table body-->
                            <tbody class="show-cart">

                            </tbody>
                            <!--Table body-->
                        </table>
                    </div>
                </div>
                <h5 class="pl-5">Total price :  <span class="total-cart"></span> ฿</h5>
                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <a type="button" class="check-out btn btn-primary waves-effect waves-light">Check out
                        <i class="fa fa-paper-plane ml-1"></i>
                    </a>
                    <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal: modalPoll -->



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

    <script src="../assets/cart.js"></script>
</body>

</html>