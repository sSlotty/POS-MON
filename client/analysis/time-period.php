<?php 
 include_once('../../connect.php');
 require_once('../authen.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time period</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../node_modules/MDB-Pro/css/mdb.min.css">
    <link rel="stylesheet" href="../../node_modules/FontAwesomePro/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body class="fixed-sn cyan-skin">

    <!-- Sidebar -->
    <?php require_once('../include/sidebar.php'); ?>
    <!--Main layout-->
    <main>
        <div class="container-fluid mb-5">
            <div class="row">
                <div class="col-6">
                    <div class="md-form">
                        <input placeholder="Selected date" type="text" id="start-date" name="start-date"
                            class="form-control datepicker">
                        <label for="start-date">Start</label>
                    </div>

                </div>
                <div class="col-6">
                    <div class="md-form">
                        <input placeholder="Selected date" type="text" id="end-date" name="end-date"
                            class="form-control datepicker">
                        <label for="end-date">End</label>
                    </div>
                </div>

                <button type="button" class="ml-3 btn btn-dark-green" onclick="search()">Search</button>

            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">

                    <div class="media white z-depth-1 rounded">
                        <i class="far fa-money-bill-alt fa-lg blue z-depth-1 p-4 rounded-left text-white mr-3"></i>
                        <div class="media-body p-1">
                            <p class="text-uppercase text-muted mb-1"><small>Total sales (Baht)</small></p>
                            <h5 class="font-weight-bold mb-0 money-total"></h5>
                        </div>
                    </div>


                </div>

                <div class="col-lg-3 col-md-6 mb-4">

                    <div class="media white z-depth-1 rounded">
                        <i class="fas fa-chart-bar fa-lg deep-purple z-depth-1 p-4 rounded-left text-white mr-3"></i>
                        <div class="media-body p-1">
                            <p class="text-uppercase text-muted mb-1"><small>Total sales (Amount)</small></p>
                            <h5 class="font-weight-bold mb-0 product-total"></h5>
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
    <script src="../assets/js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function () {
            $('.datepicker').pickadate({
                today: '',
                clear: 'Clear selection',
                close: 'Cancel'
            })
        });

        function search() {
            var start = $('#start-date').val();
            var end = $('#end-date').val();

            console.log("Start  " + start + "End " + end);

            if (start == '' || end == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'You have to select date first!',
                })
            } else if (Date.parse(start) > Date.parse(end)) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'กรุณากรอกช่วงเวลาให้ถูกต้อง',
                })
            } else {
                console.log('this loop')
                $.ajax({
                    url: 'php/system.php',
                    type: 'POST',
                    data: {
                        data: 'period',
                        start: start,
                        end: end
                    },
                    success: function (data) {
                        if (data.status) {
                            $('.money-total').text(data.total_money)
                            $('.product-total').text(data.total_product)
                             const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal
                                        .stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'success',
                                title: 'Load data'
                            })
                        } else {

                        }
                    }
                })
            }

        }
    </script>
</body>

</html>