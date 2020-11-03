<?php
if(!(isset($_GET['product_id']))){
    header('location: ../../');
}else{

$product_id = $_GET['product_id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product-edit</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../node_modules/MDB-Pro/css/mdb.min.css">
    <link rel="stylesheet" href="../../node_modules/FontAwesomePro/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../assets/sidebar.css">
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        .avatar-pic {
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
            <!-- Material form contact -->
            <h5>Product edit</h5>
            <div class="card">

                <h5 class="card-header warning-color white-text text-center py-4">
                    <strong>Editing product #<?php echo $product_id; ?></strong>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">

                    <!-- Form -->
                    <form class="text-center" style="color: #757575;" action="#!">

                    <div class="md-form mt-3">
                            <input type="text" name="name" id="name" class="form-control" placeholder="ชื่อสินค้า"
                                required>
                            <label for="name">Name</label>
                        </div>

                        <!-- E-mail -->
                        <div class="md-form">
                            <input type="number" min="0" name="price" id="price" class="form-control" placeholder="ราคา"
                                required>
                            <label for="price">Price</label>
                        </div>

                        <!-- E-mail -->
                        <div class="md-form">
                            <input type="text" id="type" name="type" class="form-control"
                                placeholder="กรุณากรอก : ขนม, ของแห้ง, เครื่องดื่ม" required>
                            <label for="type">Type</label></label>
                        </div>

                        <div class="md-form">
                            <div class="file-field pb-5">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                            <div class="btn btn-mdb-color btn-rounded float-left">
                                                <span>Choose file image</span>
                                                <input type="file" name="img" id="img"
                                                    accept="image/x-png,image/gif,image/jpeg" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12">

                                            <div class="view overlay zoom ">
                                                <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                                                    class="z-depth-1-half avatar-pic " alt="example placeholder avatar"
                                                    width="50">

                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>





                       

                        <!-- Send button -->
                        <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect"
                            type="submit">Submit</button>

                    </form>
                    <!-- Form -->

                </div>

            </div>
            <!-- Material form contact -->
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


    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.avatar-pic').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#img").change(function () {
            readURL(this);
        });
    </script>


</body>

</html>

<?php 

}
?>