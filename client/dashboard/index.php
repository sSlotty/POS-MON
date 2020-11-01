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
                            <?php for($i = 0; $i < 101; $i++ ){
                                echo '<div class="col mb-3">
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
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">'.$i.'</p>
                                    </div>
                                </div>
                            </div>';
                            }?>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 mb-4">
                    <div class="card text-left">
                        <img class="card-img-top" src="holder.js/100px180/" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Title</h4>
                            <p class="card-text">Body</p>
                            <button id="button">Add a Widget</button>

                        </div>
                    </div>
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

    <!-- cart -->
    <script src="../../node_modules/cartjs/rivets-cart.min.js"></script>
    <script src="../../node_modules/cartjs/cart.min.js"></script>

    <script type="text/javascript">
            // Clear the existing cart.
  CartJS.clear();

// Add 3x "12345678" items, with a custom "size" property of "XL".
CartJS.addItem(12345678, 3, {
  "size": "XL"
});

// Add multiple items in a single call. 
CartJS.addItems([
  {
    id: 12345678,
    quantity: 3,
    properties: {
      "size": "XL"
    }
  },
  {
    id: 87654321,
    quantity: 2
  }
]);

// Set a custom cart note.
CartJS.setNote('This is a custom cart note.');
        </script>
</body>

</html>