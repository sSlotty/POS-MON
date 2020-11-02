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
                    <div data-spy="scroll" class="scroll scrollspy-example z-depth-1">
                        <div class="row row-cols-1 row-cols-md-4">
                            <div class="col-md-6 col-xl-4 col-lg-4 col-6">
                                <div class="card">
                                    <div class="view overlay">
                                        <img class="card-img-top"
                                            src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg"
                                            alt="Card image cap">
                                        <a href="#!">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">Name</h4>
                                        <p class="card-text"> Price : ฿</p>
                                        <a href="#" data-name="Lemon" data-price="5" data-id="1234"
                                            class="add-to-cart btn btn-sm btn-success btn-rounded">Add to cart</a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 col-lg-4 col-6">
                                <div class="card">
                                    <div class="view overlay">
                                        <img class="card-img-top"
                                            src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg"
                                            alt="Card image cap">
                                        <a href="#!">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">Name</h4>
                                        <p class="card-text"> Price : ฿</p>
                                        <a href="#" data-name="Lemon" data-price="5" data-id="1234"
                                            class="add-to-cart btn btn-sm btn-success btn-rounded">Add to cart</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 mb-4">
                    <div class="card text-left">
                        <img class="card-img-top" src="holder.js/100px180/" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Cart</h4>
                            <div class="btn-group float-right" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-sm btn-indigo" data-toggle="modal"
                                    data-target="#modalCart"><i class="fab fa-instagram fa-sm pr-2"
                                        aria-hidden="true"></i></button>
                                <button type="button" class="clear-cart btn btn-sm btn-danger"><i
                                        class="fad fa-trash-alt"></i> </i>Clear cart</button>

                            </div>
                            <div class="table-responsive">
                                <table class="show-cart-simple table ">

                                </table>

                            </div>

                            <div>Total price: <span class="total-cart"></span> ฿ </div>

                        </div>
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

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <a type="button" class="btn btn-primary waves-effect waves-light">Send
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/shopify-cartjs/1.0.2/cart.min.js">
    </script>

    <script src="../assets/cart.js"></script>
</body>

</html>