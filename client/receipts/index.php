<?php 
 include_once('../../connect.php');
 require_once('../authen.php');

 $shop_id = $_SESSION['ShopID'];
 $sql = "SELECT DISTINCT receipt_id,shop_id,created_at FROM receipt WHERE shop_id ='".$shop_id."' ORDER BY `created_at` DESC";


 $result = mysqli_query($conn,$sql);

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


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../node_modules/MDB-Pro/css/mdb.min.css">
    <link rel="stylesheet" href="../../node_modules/FontAwesomePro/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.22/af-2.3.5/b-1.6.5/datatables.min.css" />

    
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
        <div class="container-fluid mb-5">
            <div class="card text-left">
              <div class="card-body">
                  <h5>Receipt List</h5>
                  <div class="table-responsive-lg">
                      <table id="dataTable" class="table table-hover table-striped table-bordered table-sm " cellspacing="0"
                          width="100%">
                          <thead>
                              <tr>
                                  <th scope="col" class="th-sm">#
                                  </th>
                                  <th scope="col" class="th-sm">Receipt ID
                                  </th>
                                  <th scope="col" class="th-sm">Date
                                  </th>
                                  <th scope="col" class="th-sm">Detail
                                  </th>
      
                              </tr>
                          </thead>
                          <tbody>
                              <?php 
                              $i = 0;
                              while($row = mysqli_fetch_array($result)){
                                  $i++;
                              ?>
                              <tr>
                              <td scpre="row"><?php echo $i;?></td>
                                  <td scpre="row">#<?php echo $row['receipt_id'];?></td>
                                  <td><?php echo DateThai($row['created_at']);?></td>
                                  <td><a type="button" href="reciept-detail.php?recipt_id=<?php echo $row['receipt_id'];?>"
                                          class="btn btn-deep-orange btn-md"><i class="fad fa-search"></i>View</a></td>
                              </tr>
                              <?php }?>
      
                          </tbody>
                          <tfoot>
                              <tr>
                              <th scope="col" class="th-sm">#
                                  </th>
                                  <th scope="col" class="th-sm">Receipt ID
                                  </th>
                                  <th scope="col" class="th-sm">Date
                                  </th>
                                  <th scope="col" class="th-sm">Detail
                                  </th>
      
                              </tr>
                          </tfoot>
                      </table>
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
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/af-2.3.5/b-1.6.5/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="js/allJs.js"></script>

    <script>
        $('#dataTable').DataTable({
            "order": [0, 'asc'],
            "language": [{
                "emptyTable": `<div class="col-md-12 mt-5">
            <center style="opacity: 0.5;">
            <i class="fad fa-file-times" style="font-size: 100px; color:red;"></i>
            <p class="text-center">ไม่มีข้อมูลใบเสร็จ</p>
            </center>
        </div>`
            }],
        });

        $.fn.dataTable.ext.classes.sPageButton = 'button primary_button';
    </script>

</body>

</html>