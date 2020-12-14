<?php 
 include_once('../../connect.php');
 require_once('../authen.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | Analysis</title>
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

            <section>

                <div class="row">

                    <div class="col-lg-3 col-md-6 mb-4">

                        <div class="media white z-depth-1 rounded">
                            <i class="far fa-money-bill-alt fa-lg blue z-depth-1 p-4 rounded-left text-white mr-3"></i>
                            <div class="media-body p-1">
                                <p class="text-uppercase text-muted mb-1"><small>ยอดขายสินค้า วันนี้</small></p>
                                <h5 class="font-weight-bold mb-0">23 000 ชิ้น</h5>
                            </div>
                        </div>


                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">

                        <div class="media white z-depth-1 rounded">
                            <i
                                class="fas fa-chart-bar fa-lg deep-purple z-depth-1 p-4 rounded-left text-white mr-3"></i>
                            <div class="media-body p-1">
                                <p class="text-uppercase text-muted mb-1"><small>ยอดขายสินค้า 7 ที่ผ่านมา</small></p>
                                <h5 class="font-weight-bold mb-0">1 456 ชิ้น</h5>
                            </div>
                        </div>


                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">

                        <div class="media white z-depth-1 rounded">
                            <i class="fas fa-chart-pie fa-lg teal z-depth-1 p-4 rounded-left text-white mr-3"></i>
                            <div class="media-body p-1">
                                <p class="text-uppercase text-muted mb-1"><small>ยอดขายสินค้า เดือนที่ผ่านมา</small></p>
                                <h5 class="font-weight-bold mb-0">323 540 ชิ้น</h5>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">

                        <div class="media white z-depth-1 rounded">
                            <i class="fas fa-download fa-lg pink z-depth-1 p-4 rounded-left text-white mr-3"></i>
                            <div class="media-body p-1">
                                <p class="text-uppercase text-muted mb-1"><small>ยอดขายสินค้า รวมทั้งหมด</small></p>
                                <h5 class="font-weight-bold mb-0">13 540 ชิ้น</h5>
                            </div>
                        </div>

                    </div>


                </div>

            </section>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="summery" ></canvas>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
        integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {

            var ctx = document.getElementById('summery');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June','January', 'July', 'August', 'September', 'October', 'December'],
                    datasets: [{
                        label: '# of Votes',
                        data: [500000,200000,800000,600000,700000,800000,10000,50000,60000,515121,1965962,1548488],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

        })
    </script>
</body>

</html>