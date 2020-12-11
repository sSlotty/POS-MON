<!--Double navigation-->
<header>
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed">
        <ul class="custom-scrollbar">
            <!-- Logo -->
            <li>
                <div class="logo-wrapper waves-light">
                    <a href="#"><img src="https://mdbootstrap.com/img/logo/mdb-transparent.png"
                            class="img-fluid flex-center"></a>
                </div>
            </li>
            <!--/. Logo -->

            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect" href="../dashboard/index.php"> <i class="fad fa-cash-register"
                                style="margin-right: 30px; font-size:25px;"></i>หน้าจัดการขาย</a>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fad fa-box-full"
                                style="font-size:25px; margin-right:20px;"></i>Product Management<i
                                class="fas fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul class="list-unstyled">
                                <li><a href="../products/index.php" class="waves-effect">Product List</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="waves-effect" href="../receipts/"> <i class="fad fa-file-invoice"
                                style="margin-right: 30px; font-size:30px;"></i>Receipts</a>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fad fa-analytics mr-3"
                                style="font-size:25px"></i>
                            Analysis<i class="fas fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul class="list-unstyled">
                                <li><a href="#" class="waves-effect">Introduction</a>
                                </li>
                                <li><a href="#" class="waves-effect">Monthly meetings</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fad fa-user-alt mr-3"
                                style="font-size:25px; margin-right:20px;"></i> Account
                            Management
                            <i class="fas fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul class="list-unstyled">
                                <li><a href="../accounts/index.php" class="waves-effect">MyAccount</a>
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
            <p>POS | โปรแกรมจัดการร้านค้า</p>
        </div>
        <ul class="nav navbar-nav nav-flex-icons ml-auto">
            <li class="nav-item">
                <a class="nav-link"><i class="fas fa-comments"></i> <span
                        class="clearfix d-none d-sm-inline-block">Support</span></a>
            </li>
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