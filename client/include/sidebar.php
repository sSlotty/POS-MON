<?php 
$shop_id = $_SESSION['ShopID'];
$sql_show_data = "SELECT * FROM members WHERE shop_id = $shop_id";
$result_show_data = $conn->query($sql_show_data) or die($conn->error);
$row_show_data = $result_show_data->fetch_assoc();

?>

<!--Double navigation-->
<header>
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-new fixed">
        <ul class="custom-scrollbar">
            <!-- Logo -->
            <ul>
            <li>
                <div class="logo-wrapper waves-light">
                    <a href="#"><img src="../../assets/pic/S__54206550.png"
                            class="img-fluid" style="width: 2000px;"></a>
                </div>
            </li>
            </ul>
            
            <!--/. Logo -->

            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect" href="../dashboard/index.php"> <i class="fad fa-cash-register"
                                style="margin-right: 30px; font-size:25px;"></i>Sales Management</a>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r" href="../products/index.php" ><i class="fad fa-box-full"
                                style="font-size:25px; margin-right:20px;"></i> Product Management</a>
                    </li>
                    <li><a class="waves-effect" href="../receipts/"> <i class="fad fa-file-invoice"
                                style="margin-right: 30px; font-size:30px; padding-right:-4px;"></i>  Receipt</a>
                    </li>
                    <!-- <li><a class="waves-effect" href="../coupon/"> <i class="fab fa-slack-hash"
                                style="margin-right: 25px; font-size:30px;"></i>Coupon</a>
                    </li> -->
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fad fa-analytics mr-3"
                                style="font-size:25px; padding-right:8px;"></i> Sales Statistics<i class="fas fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul class="list-unstyled">
                                <li><a href="../analysis/index.php" class="waves-effect">Sales (Baht)</a>
                                </li>
                                <li><a href="../analysis/product.php" class="waves-effect">Sales (Amount)</a>
                                </li>
                                <li><a href="../analysis/time-period.php" class="waves-effect">Timeperiod</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fad fa-user-alt mr-3"
                                style="font-size:25px; margin-right:20px; padding-right:5px;"></i> Account
                            Management
                            <i class="fas fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul class="list-unstyled">
                                <li><a href="../accounts/index.php" class="waves-effect">My Account</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <!--/. Side navigation links -->
        </ul>
        <div class="sidenav-bg mask-strong"></div>
    </div>
    <!--/. Sidebar navigation -->
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
        </div>
        <!-- Breadcrumb-->
        <div class="breadcrumb-dn mr-auto">
            <p><?php echo $row_show_data['shop_name'];?></p>
        </div>
        <ul class="nav navbar-nav nav-flex-icons ml-auto">
            <!-- <li class="nav-item">
                <a class="nav-link"><i class="fas fa-comments"></i> <span
                        class="clearfix d-none d-sm-inline-block">Support</span></a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="../accounts/index.php"><i class="fas fa-user"></i> <span
                        class="clearfix d-none d-sm-inline-block">Account</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="../../logout.php"><i class="fad fa-sign-out-alt"></i> <span
                        class="clearfix d-none d-sm-inline-block">Logout</span></a>
            </li>
        </ul>
    </nav>
    <!-- /.Navbar -->
</header>
<!--/.Double navigation-->