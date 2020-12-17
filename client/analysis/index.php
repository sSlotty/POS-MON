<?php 
 include_once('../../connect.php');
 require_once('../authen.php');
 $shop_id = $_SESSION['ShopID'];


 $sql_all = "SELECT SUM(total) as sum_money FROM simple_receipt WHERE shop_id = $shop_id;";
 $result_all = $conn->query($sql_all) or die($conn->errno);
 $row_all = $result_all->fetch_assoc();

 $sql_lastweek = "SELECT SUM(total) as total_lastweek FROM simple_receipt WHERE WEEK(created_at, 1) = WEEK( date_sub( curdate(), interval 7 day),1) and created_at > date_sub(curdate(), interval 14 day) and shop_id = $shop_id;";
 $result_lastweek = $conn->query($sql_lastweek) or die($conn->error);
 $row_lastweek = $result_lastweek->fetch_assoc();
 
 $sql_today = "SELECT SUM(total) as total_today FROM simple_receipt WHERE DATE(created_at) = CURDATE() and shop_id = $shop_id;";
 $result_today = $conn->query($sql_today) or die($conn->errno);
 $row_today = $result_today->fetch_assoc();
 
 
 $sql_lastMonth = "SELECT SUM(total) as total_lastMonth FROM simple_receipt WHERE left(created_at, 7) = left( date_sub( curdate(), interval 1 month), 7) and shop_id = $shop_id;";
 $result_lastMonth = $conn->query($sql_lastMonth) or die($conn->errno);
 $row_lastMonth = $result_lastMonth->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales statistics</title>
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
                                <p class="text-uppercase text-muted mb-1"><small>Daily sales</small></p>
                                <h5 class="font-weight-bold mb-0">
                                    <?php echo number_format($row_today['total_today'],2);?></h5>
                            </div>
                        </div>


                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">

                        <div class="media white z-depth-1 rounded">
                            <i
                                class="fas fa-chart-bar fa-lg deep-purple z-depth-1 p-4 rounded-left text-white mr-3"></i>
                            <div class="media-body p-1">
                                <p class="text-uppercase text-muted mb-1"><small>Weekly sales</small></p>
                                <h5 class="font-weight-bold mb-0">
                                    <?php echo number_format($row_lastweek['total_lastweek'],2);?></h5>
                            </div>
                        </div>


                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">

                        <div class="media white z-depth-1 rounded">
                            <i class="fas fa-chart-pie fa-lg teal z-depth-1 p-4 rounded-left text-white mr-3"></i>
                            <div class="media-body p-1">
                                <p class="text-uppercase text-muted mb-1"><small>Monthly sales</small></p>
                                <h5 class="font-weight-bold mb-0">
                                    <?php echo number_format($row_lastMonth['total_lastMonth'],2);?></h5>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">

                        <div class="media white z-depth-1 rounded">
                            <i class="fas fa-database fa-lg pink z-depth-1 p-4 rounded-left text-white mr-3"></i>
                            <div class="media-body p-1">
                                <p class="text-uppercase text-muted mb-1"><small>Total sales</small></p>
                                <h5 class="font-weight-bold mb-0"><?php echo number_format($row_all['sum_money'],2);?>
                                </h5>
                            </div>
                        </div>

                    </div>


                </div>

            </section>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="summery"></canvas>

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
        <script src="../../assets/js/block-console.js"></script>
    <script>
        $(document).ready(function () {
            $.ajax({
                type: 'POST',
                url: 'php/system.php',
                data: {
                    data: 'All'
                },
                dataType: 'json',
                success: function (response) {

                    if (response.status) {
                        console.log(response.Dec)
                        var ctx = document.getElementById('summery');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: ['January', 'February', 'March', 'April', 'May',
                                    'June', 'July', 'August', 'September', 'October',
                                    'November', 'December'
                                ],
                                datasets: [{
                                    label: '#Money (Baht)',
                                    data: [parseInt(response.Jan), parseInt(response.Feb), parseInt(response.Mar), parseInt(response.Apr),
                                        parseInt(response.May),
                                        parseInt(response.Jun), parseInt(response.Jul), parseInt(response.Aug), parseInt(response.Sep),
                                        parseInt(response.Oct),
                                        parseInt(response.Nov), parseInt(response.Dec)
                                    ],
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

                    } else {
                        Swal.fire(
                            'Warning!',
                            data.message,
                            'warning'
                        ).then(function () {
                            window.location.href = 'index.php';
                        });
                    }
                }

            });


        })
    </script>
</body>

</html>