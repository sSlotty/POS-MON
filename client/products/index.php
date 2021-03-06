<?php 
 include_once('../../connect.php');
 require_once('../authen.php');

 $shop_id = $_SESSION['ShopID'];
 $sql = "SELECT * FROM products WHERE id_shop = '".$shop_id."'";

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
    <title>Product Manager | Product List</title>
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

        .switch label input[type="checkbox"]:checked+.lever {
            background-color: #a5d6a7;
        }

        .switch label input[type="checkbox"]:checked+.lever:after {
            left: 1.5rem;
            background-color: rgba(76, 175, 80, 0.7);
        }

        @media only screen and (max-width: 767px) {

            .dataTables_filter,
            .pagination {
                float: left;
            }
        }
    </style>
</head>

<body class="fixed-sn cyan-skin">

    <!-- Sidebar -->
    <?php require_once('../include/sidebar.php'); ?>
    <!--Main layout-->
    <main>
        <div class="container-fluid mb-5">
            <a type="button" href="product-add.php" class="btn btn-sm btn-success btn-rounded">add product</a>
            
            <div class="card mb-5">
              <div class="card-body">
                  <h5>Product List</h5>
                  <div class="table-responsive-lg">
                      <table id="dataTable" class="table table-hover table-striped table-bordered table-sm " cellspacing="0" width="100%">
                          <thead>
                              <tr>
                                  <th scope="col" class="th-sm">#
                                  </th>
                                  <th scope="col" class="th-sm">image
                                  </th>
                                  <th scope="col" class="th-sm">name
                                  </th>
                                  <th scope="col" class="th-sm">amount
                                  </th>
                                  <th scope="col" class="th-sm">price
                                  </th>
                                  <th scope="col" class="th-sm">type
                                  </th>
                                  <th scope="col" class="th-sm">status
                                  </th>
                                  <!-- <th scope="col" class="th-sm">created
                                  </th> -->
                                  <th scope="col" class="th-sm">Edit
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php 
                              
                              
                              ?>
                              <?php 
                              $i = 0;
                              while($row = mysqli_fetch_array($result)){
                                  $i++;
                              ?>
                              <tr>
                                  <td scpre="row"><?php echo $i;?></td>
                                  <td class="text-center img-fluid shadow-2-strong"><img width="100"
                                          src="<?php echo "../assets/images/".$row['product_image'];?>" class="rounded"
                                          alt="..."></td>
                                  <td><?php echo $row['product_name'];?></td>
                                  <td style="<?php echo $row['product_amount'] <= 0 ? 'color: red;':''; ?>"><?php echo $row['product_amount'];?></td>
                                  <td><?php echo $row['product_price'];?></td>
                                  <td><?php echo $row['product_type'];?></td>
                                  <td>
                                      <!-- Material checked -->
                                      <div class="switch">
                                          <label>
                                              Off
                                              <input type="checkbox" id="status" name="status" class="status" <?php 
                                              if($row['status'] == "on"){
                                                  echo "checked";
                                              }else
                                              ?> data-id="<?php echo $row['product_id'];?>">
                                              <span class="lever"></span> On
      
                                          </label>
                                      </div>
                                  </td>
                                  <!-- <td><?php echo DateThai($row['created_at']);?></td> -->
      
                                  <td>
                                      <div class="btn-group btn-group-sm mt-1" role="group" aria-label="Basic example">
                                          <a href="product-edit.php?product_id=<?php echo $row['product_id'];?>" type="button"
                                              class="btn btn-warning btn-rounded btn-sm">Edit</a>
                                          <a type="button" class="btn btn-danger btn-rounded btn-sm delete"
                                              data-id="<?php echo $row['product_id'];?>">Delete</a>
                                      </div>
                                  </td>
      
                              </tr>
                              <?php }
                              
                              ?>
      
                          </tbody>
                          <tfoot>
                              <tr>
                                  <th scope="col" class="th-sm">#
                                  </th>
                                  <th scope="col" class="th-sm">image
                                  </th>
                                  <th scope="col" class="th-sm">name
                                  </th>
                                  <th scope="col" class="th-sm">amount
                                  </th>
                                  <th scope="col" class="th-sm">price
                                  </th>
                                  <th scope="col" class="th-sm">type
                                  </th>
                                  <th scope="col" class="th-sm">status
                                  </th>
                                  <!-- <th scope="col" class="th-sm">created
                                  </th> -->
                                  <th scope="col" class="th-sm">Edit
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
    <script src="../../assets/js/block-console.js"></script>

</body>

</html>