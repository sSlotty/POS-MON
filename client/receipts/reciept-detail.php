<?php 
 include_once('../../connect.php');
 require_once('../authen.php');

    $recipt_id = $_GET['recipt_id'];
    $shop_id = $_SESSION['ShopID'];

if(!($recipt_id)){
    header('Location: ../receipts/');

}

 $shop_id = $_SESSION['ShopID'];
 $sql = "SELECT * FROM `receipt` WHERE `receipt_id` LIKE '".$recipt_id."' AND shop_id LIKE '".$shop_id."'";
 $result = $conn->query($sql);
 
 
 $numrow = mysqli_num_rows($result);
 if($numrow == 0){
     header('Location: ../products');
 }

 function DateThai($strDate){
     $strYear = date("Y",strtotime($strDate)) + 543;
     $strMonth= date("n",strtotime($strDate));
     $strDay= date("j",strtotime($strDate));
     $strHour= date("H",strtotime($strDate));
     $strMinute= date("i",strtotime($strDate));
     $strSeconds= date("s",strtotime($strDate));
     $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
     $strMonthThai=$strMonthCut[$strMonth];
     
     return "$strDay $strMonthThai $strYear "."เวลา"." $strHour:$strMinute";
 }

 $sql2 = "SELECT * FROM `simple_receipt` WHERE receipt_id = $recipt_id AND shop_id = $shop_id";
 $result2 = mysqli_query($conn,$sql2);
 $row2 = mysqli_fetch_assoc($result2);

 
    
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt Detail</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../node_modules/MDB-Pro/css/mdb.min.css">
    <link rel="stylesheet" href="../../node_modules/FontAwesomePro/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <style>
        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:before {
            bottom: .5em;
        }

        .dataTables_filter,
        .pagination {
            float: right;
        }

        .dataTables_empty,
        th,
        td {
            text-align: center;
        }
    </style>
</head>

<body class="fixed-sn cyan-skin">

    <!-- Sidebar -->
    <?php require_once('../include/sidebar.php'); ?>
    <!--Main layout-->
    <main>

        <div class="container-fulid mt- mb-5">
            <div class="card card-cascade">

                <!-- Card image -->
                <div class="view view-cascade gradient-card-header blue-gradient">

                    <!-- Title -->
                    <h2 class="card-header-title mb-3">Receipt Detail</h2>
                    <!-- Subtitle -->
                    <p class="card-header-subtitle mb-0"><?php echo '#'.$recipt_id; ?></p>

                </div>

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">


                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div class="table-responsive-sm">
                                <table class="table table-bordered table-sm">

                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">รวมเงิน</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i = 0;
                                        while($row = $result->fetch_assoc()){ $i++?>
                                        <tr>
                                            <th scope="row"><?php echo $i;?></th>
                                            <td><?php echo $row['product_id'];?></td>
                                            <td><?php echo $row['product_name'];?></td>
                                            <td><?php echo $row['price'];?> ฿</td>
                                            <td><?php echo $row['amount'];?> ฿</td>
                                            <?php 
                                           $a = $row['amount'];
                                           $b = $row['price'];
                                           $c = $a*$b;
                                           
                                           ?>

                                            <td><?php echo $c; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="view view-cascade gradient-card-header blue-gradient">

                                <!-- Title -->
                                <h2 class="card-header-title mb-3"><?php  echo $row2['total'];  ?> ฿</h2>
                                <!-- Subtitle -->
                                <p class="card-header-subtitle mb-0">ยอดเงินรวม</p>

                            </div>
                            <div class="text-left">
                                <button type="button" class="btn btn-dark-green btn-md">
                                    <h5 class="mt-2">Receive : <?php  echo $row2['receive'];  ?> ฿</h5>
                                </button>

                                <button type="button" class="btn btn-deep-orange btn-md">
                                    <h5 class="mt-2">Change : <?php  echo $row2['change_money'];  ?> ฿</h5>
                                </button>

                            </div>

                        </div>
                    </div>


                </div>

            </div>
            <!-- Card -->

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
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/allJs.js"></script>

    <script>
        $('#dataTable').DataTable({
            "order": [1, 'asc']
        });
    </script>

</body>

</html>