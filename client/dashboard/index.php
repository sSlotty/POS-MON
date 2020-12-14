<?php 
include_once('../../connect.php');
require_once('../authen.php');

$shop_id = $_SESSION['ShopID'];
 $sql = "SELECT * FROM products WHERE id_shop = '".$shop_id."' AND product_amount > 0 AND status = 'on'";

 $result = mysqli_query($conn,$sql);
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
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/style.css">
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

        .hide {
            display: flex;
            justify-content: center;
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .hide>* {
            flex: 0 0 25%;
            font-size: 2em;
            text-align: center;
            padding: 1em 0;
            margin: 0.2em;
            background-color: #ccc;
            border-radius: 0.5em;
            user-select: none;
        }

        .hide-item {
            background-color: #f66;
            cursor: pointer;
        }

        .product-img {
            width: 500px;
            max-width: 100%;
            height: auto;
            /* padding-left: px; */
        }

        .hover-card:hover {
            -webkit-box-shadow: 2px 3px 108px -17px rgba(0, 0, 0, 0.25);
            -moz-box-shadow: 2px 3px 108px -17px rgba(0, 0, 0, 0.25);
            box-shadow: 2px 3px 108px -17px rgba(0, 0, 0, 0.25);


        }

        tr:hover {
            -webkit-box-shadow: 2px 3px 108px -17px rgba(0, 0, 0, 0.25);
            -moz-box-shadow: 2px 3px 108px -17px rgba(0, 0, 0, 0.25);
            box-shadow: 2px 3px 108px -17px rgba(0, 0, 0, 0.25);


        }

        @media only screen and (min-width: 1920px) {
            .product-img {
                width: 300px;
                height: 200px;
            }

        }

        @media only screen and (max-width: 1920px) {
            .product-img {
                width: 300px;
                height: 200px;
            }

        }


        @media only screen and (max-width: 767px) {


            .product-img {
                width: 700px;
                height: 300px;
                max-width: 100%;
            }

        }

        @media only screen and (max-width: 703px) {


            .product-img {
                width: 600px;
                height: 300px;
                max-width: 100%;

            }

        }

        @media only screen and (max-width: 580px) {

            .product-img {
                width: 500px;
                height: 250px;
                max-width: 100%;
                max-height: 30%;
            }

        }

        .break {
            word-break: break-all;
        }
    </style>
</head>

<body class="fixed-sn cyan-skin">

    <!-- Sidebar -->
    <?php require_once('../include/sidebar.php'); ?>
    <!--Main layout-->
    <main>

        <div class="container-fluid">
            <div class="row">
                <div class="com-md-12 pl-4">
                    <a href="search.php" class="btn-floating btn-lg btn-default"><i class="fas fa-search"></i></a>

                </div>
            </div>
        </div>

        <div class="container-fluid mb-5">
            <div class="row layout-margin-8">
                <div class="col-md-8 mb-4">
                <div class="card card-cascade">
                        <div class="view view-cascade gradient-card-header blue-gradient">
                            <h5>สินค้าทั้งหมด</h5>
                        </div>
                    </div>
                    <div data-spy="scroll" class="scroll scrollspy-example z-depth-1">
                        <div class="">
                            <div class="row row-cols-1 row-cols-md-4 " id="item">
                                <?php while($row = $result->fetch_array()){?>

                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-3">
                                    <div class="card hover-card" style="width: 100%">
                                        <div class="view overlay">
                                            <img class="card-img-top product-img img-fluid hover-shadow"
                                                src="<?php echo "../assets/images/".$row['product_image'];?>"
                                                alt="Card image cap">
                                            <a href="#!">
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>
                                        <div class="card-body break">
                                            <h4 class="card-title name"><?php echo $row['product_name'];?></h4>
                                            <p class="card-text"> Price : <?php echo $row['product_price'];?> ฿</p>
                                            <p class="card-text"> Amount : <?php echo $row['product_amount'];?> ชิ้น</p>
                                            <a href="#" data-name="<?php echo $row['product_name'];?>"
                                                data-amount="<?php echo $row['product_amount'];?>"
                                                data-price="<?php echo $row['product_price'];?>"
                                                data-id="<?php echo $row['product_id'];?>" data-shop="12345678910"
                                                class="add-to-cart btn btn-sm btn-success btn-block">Add to cart</a>

                                        </div>
                                    </div>
                                </div>


                                <?php } 

                                $rowcount = mysqli_num_rows($result);
                                $item = '
                                        <div class="col-md-12 mt-5">
                                            <center style="opacity: 0.5;">
                                            <i class="fad fa-box-open" style="font-size: 200px; color:red;"></i>
                                            <p class="text-center">ไม่มีสินค้าภายในคลัง</p>
                                            </center>
                                        </div>
                                   
                                
                                ';
                                if($rowcount == 0){
                                    echo $item;
                                    
                                }
                                ?>


                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-md-4 mb-4">
                    <div class="card card-cascade">
                        <div class="view view-cascade gradient-card-header purple-gradient">
                            <h5>Total price : <span class="total-cart"></span> ฿</h5>

                        </div>
                    </div>
                    <div data-spy="scroll" class="scroll scrollspy-example z-depth-1">
                        <h4 class="card-title text-center" style="color: cornflowerblue;"><i
                                class="fad fa-cart-arrow-down" style="font-size: 30px;"></i> Cart
                        </h4>
                        <div class="btn-group float-right" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-sm btn-indigo" data-toggle="modal"
                                data-target="#modalCart">Check out</button>
                            <button type="button" class="clear-cart btn btn-sm btn-danger"><i
                                    class="fad fa-trash-alt"></i> </i>Clear cart</button>

                        </div>
                        <div class="table-responsive">
                            <table class="show-cart-simple table text-nowrap table-sm">

                            </table>

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
                    <p class="heading lead">
                        <h4 class="card-title text-center" style="color: cornflowerblue;"><i
                                class="fad fa-cart-arrow-down" style="font-size: 30px;"></i> Cart
                        </h4>
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="pl-5">Total price : <span class="total-cart"></span> ฿</h5>
                            <div class="md-form ml-5">
                                <input type="number" min="0" id="income" name="income" class="form-control" required>
                                <label for="form1">จำนวนเงินรับ</label>
                            </div>
                        </div>
                    </div>
                </div>

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
    <script src="../assets/js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/cart.js"></script>

    <script>
        $(document).ready(function () {

            $('#search').keyup(function () {
                $('.col-xl-3').removeClass('d-none');
                // var filter = $(this).val();

                var filter = $(this).val().toLowerCase();

                if (filter && filter.length > 0) {
                    $('.row').find('.col-xl-3 .card h4:not(:contains("' + filter.toLowerCase() +
                        '"))').parentsUntil('.col-xl-3 .card').parent().addClass('d-none');
                } else {
                    $('.row').find('.col-xl-3 .card h4:contains("' + filter.toLowerCase() +
                        '")').parentsUntil('.col-xl-3 .card').parent().removeClass('d-none');
                }


            });
        });
    </script>
</body>

</html>