<?php 
 include_once('connect.php');
 error_reporting(0);
 if($_SESSION['UserID']){
    header('Location: client/index.php');
 }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/MDB-Pro/css/mdb.min.css">
    <link rel="stylesheet" href="node_modules/FontAwesomePro/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body {
            background: url("https://images.unsplash.com/photo-1573002922402-c8f094eebf16?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80") no-repeat center center;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .touch {
        margin-top: 25px;
        margin-bottom: 25px;
    }

    .touch .card {
        border: none;
        border-radius: 3rem;
    }

    @media (min-width: 992px) {
        .touch .card:hover {
            margin-top: -.25rem;
            margin-bottom: .25rem;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
            transition: .2s;
        }

    }
    </style>
</head>

<body class="fixed-sn">

    <!--Main layout-->
    
        <div class="container mb-5 mt-5 touch">
            <div class="card">
                <h5 class="card-header white-text text-center py-4" style="background-color: #003559;">
                    <strong>Register</strong>
                </h5>
                <div class="card-body px-lg-5 pt-0">

                    <form class="text-center" method="POST" action="assets/php/register.php" id="form">

                        <div class="md-form">
                            <input type="email" id="email" name="email" class="form-control" required>
                            <label for="email">Email</label>
                        </div>

                        <div class="md-form">
                            <input type="text" id="username" name="username" class="form-control" required>
                            <label for="username">Username</label>
                        </div>

                        <div class="md-form">
                            <input type="password" id="password" name="password" class="form-control" required>
                            <label for="password">Password</label>
                        </div>


                        <button
                            class="btn btn-outline-primary btn-rounded my-4 waves-effect z-depth-0"
                            type="submit">Register</button>

                        <p class="text-center">Already have an account?
                            <a href="login.php">Login</a>
                        </p>
                    </form>

                </div>

            </div>
        </div>
    
    <!--/Main layout-->

    <!-- Footer -->


    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/MDB-Pro/js/mdb.min.js"></script>
    <script src="node_modules/mdbootstrap/js/addons/datatables.min.js"></script>
    <script src="node_modules/MDB-Pro/src/js/pro/sidenav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="assets/js/register.js"></script>

</body>

</html>