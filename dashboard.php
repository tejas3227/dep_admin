<?php
include('config.php');
error_reporting(0);
if (!isset($_SESSION['dep_admin'])) {
    header('location:login.php');
}
$ID = $_SESSION['dep_admin'];
$getData = mysqli_query($conn, "select * from `dep_admin` where `dep_admin_id`='$ID'");
$row = mysqli_fetch_assoc($getData);
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Jassa" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>


<body data-layout="horizontal" data-topbar="dark">

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.svg" alt="" height="26">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-sm.svg" alt="" height="26"> <span
                                    class="logo-txt">Departmental Admin</span>
                            </span>
                        </a>

                        <a class="logo logo-light">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.svg" alt="" height="26">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-sm.svg" alt="" height="26"> <span
                                    class="logo-txt">Departmental Admin</span>
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item"
                        data-bs-toggle="collapse" id="horimenu-btn" data-bs-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <div class="topnav">
                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                            <div class="collapse navbar-collapse" id="topnav-menu-content">

                            </div>
                        </nav>
                    </div>

                </div>

                <div class="d-flex">
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item user text-start d-flex align-items-center"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                src="assets/images/users/<?php echo $row['image']; ?>" alt="Header Avatar">
                            <span class="ms-2 d-none d-xl-inline-block user-item-desc">
                                <span class="user-name">
                                    <?php echo $row['name']; ?><i class="mdi mdi-chevron-down"></i>
                                </span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <a class="dropdown-item" href="login.php"><i
                                    class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span
                                    class="align-middle">Logout</span></a>
                        </div>
                    </div>
                </div>
            </div>


        </header>

        <div class="college-heading" style="text-align: center;padding: 20px">
    <h1><span style="background-color: rgba(0, 0, 0, 0.8); color: orange;">Kolhapur Institute of Technology's</span></h1>
    <h3><span style="background-color: rgba(0, 0, 0, 0.8); color: blue;">College of Engineering (Autonomous) Kolhapur</span></h3>
</div>

        <div class="card-container">
            <div class="row">
                <div class="col-md-4">
                    <a href="yearwise_select.php?AY=2022-23&dept=<?php echo urlencode($_GET['dept']); ?>" class="card">
                        <img src="assets/images/users/Central.jpeg" class="card-img-top">
                        <h1 class="card-title text-center" style="color: white">Academic Year <br> 2022-23</h1>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="yearwise_select.php?AY=2023-24&dept=<?php echo urlencode($_GET['dept']); ?>" class="card">
                        <img src="assets/images/users/Central.jpeg" class="card-img-top">
                        <h1 class="card-title text-center" style="color: white">Academic Year <br> 2023-24</h1>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="yearwise_select.php?AY=2024-25&dept=<?php echo urlencode($_GET['dept']); ?>" class="card">
                        <img src="assets/images/users/Central.jpeg" class="card-img-top">
                        <h1 class="card-title text-center" style="color: white">Academic Year <br> 2024-25</h1>
                    </a>
                </div>
            </div>
        </div>


        <style>
            body {
        position: relative;
    }

    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url(assets/images/kit.jpg);
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
         
        z-index: -1;
    }
    .card-container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 60vh;
            }

            .card {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.8); /* Transparent black (adjust the last value for opacity) */
    color: #fff;
    padding: 20px;
    text-decoration: none;
    max-width: 260px;
    height: 350px;
    border-radius: 30px;
}


            .card:hover {
                transform: scale(1.05);
                transition: all 0.2s ease-in-out;
            }

            .card-img-top {
                max-width: 90%;
                height: auto;
                margin-bottom: 20px;
            }
        </style>
<br><br><br><br><br>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> &copy; Student Mentoring.
                    </div>
                </div>
            </div>
        </footer>
    </div>


    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenujs/metismenujs.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/pricing.init.js"></script>

    <script src="assets/js/app.js"></script>



</body>

</html>