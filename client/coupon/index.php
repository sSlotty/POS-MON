<?php 
 include_once('../../connect.php');
 require_once('../authen.php');

 $shop_id = $_SESSION['ShopID'];
 $sql = "SELECT * FROM coupon WHERE shop_id ='".$shop_id."' ORDER BY `created_at` DESC";


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
    <title>Coupon</title>
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
                <img class="card-img-top" src="holder.js/100px180/" alt="">
                <div class="card-body">

                    <div class="modal fade" id="modalAddCoupon" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Add coupon</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!--Card content-->
                                <div class="card-body px-lg-5">

                                    <!-- Form -->
                                    <form id="formCoupon" class="text-center" style="color: #757575;">

                                        <!-- Name coupon -->
                                        <div class="md-form mt-3">
                                            <input type="text" id="name_coupon" name="name_coupon" class="form-control">
                                            <label for="name_coupon">Name of Coupon</label>
                                        </div>


                                        <!-- Name -->
                                        <div class="md-form mt-3">
                                            <input type="text" id="id_coupon" name="id_coupon" class="form-control">
                                            <label for="id_coupon">Coupon number</label>
                                        </div>

                                        <!-- id_coupon -->
                                        <div class="md-form">
                                            <input type="number" min="0" id="percent" name="percent"
                                                class="form-control">
                                            <label for="percent">Percent for discount</label>
                                        </div>

                                        <!-- id -->
                                        <div class="md-form">
                                            <input type="number" min="0" id="quantity" name="quantity"
                                                class="form-control">
                                            <label for="quantity">Quantity</label>
                                        </div>

                                        <!-- Date-end -->
                                        <div class="md-form">
                                            <input type="date" min="0" id="date-end" name="date-end"
                                                class="form-control">
                                            <label for="date-end">Date end</label>
                                        </div>
                                        <button class="text-center btn btn-green btn-block my-4 waves-effect z-depth-0"
                                            type="submit">add</button>

                                    </form>
                                    <!-- Form -->

                                </div>

                            </div>
                        </div>
                    </div>

                    <a href="" class="btn btn-dark-green mb-4" data-toggle="modal" data-target="#modalAddCoupon">Add
                        coupon</a>

                    <div class="row">
                        <div class="col-12">
                            <h5>Recipt List</h5>
                            <div class="table-responsive-lg">
                                <table id="dataTable" class="table table-hover table-striped table-bordered table-sm "
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="th-sm">#
                                            </th>
                                            <th scope="col" class="th-sm">Name
                                            </th>
                                            <th scope="col" class="th-sm">Code
                                            </th>
                                            <th scope="col" class="th-sm">Discount
                                            </th>
                                            <th scope="col" class="th-sm">Quantity
                                            </th>
                                            <th scope="col" class="th-sm">Date-end
                                            </th>
                                            <th scope="col" class="th-sm">Create
                                            </th>
                                            <th scope="col" class="th-sm">Update
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
                                            <td scpre="row"><?php echo $row['name'];?></td>
                                            <td><?php echo $row['id_coupon'];?></td>
                                            <td><?php echo $row['percent'];?></td>
                                            <td><?php echo $row['quantity'];?></td>
                                            <td><?php echo DateThai($row['date_end']);?></td>

                                            <td><?php echo DateThai($row['created_at']);?></td>
                                            <td><?php echo DateThai($row['updated_at']);?></td>
                                            
                                        <?php }?>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                            <th scope="col" class="th-sm">#
                                            </th>
                                            <th scope="col" class="th-sm">Name
                                            </th>
                                            <th scope="col" class="th-sm">Code
                                            </th>
                                            <th scope="col" class="th-sm">Quantity
                                            </th>
                                            <th scope="col" class="th-sm">Discount
                                            </th>
                                            <th scope="col" class="th-sm">Date-end
                                            </th>
                                            <th scope="col" class="th-sm">Create
                                            </th>
                                            <th scope="col" class="th-sm">Update
                                            </th>

                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
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
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/af-2.3.5/b-1.6.5/datatables.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


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


        function rightAlert(icon, message, redirect) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: icon,
                title: message
            }).then(function () {
                window.location.href = redirect;
            });

        }

        $(document).ready(function () {

            $("#formCoupon").submit(function (event) {
                event.preventDefault();
                var form_data = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: 'php/add.php',
                    data: form_data,
                    dataType: 'json',
                    success: function (data) {
                        if (data.status) {
                            rightAlert('success', data.message, 'index.php')

                        } else {
                            rightAlert('warning', data.message, 'index.php')
                        }
                    }

                });
            });
        });
    </script>

</body>

</html>