<?php
include('config.php');

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
    <title>Select Assignment Year</title>
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
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle arrow-none"
                                            href="dashboard.php?dept=<?php echo $_GET['dept']; ?>&AY=<?php echo $_GET['AY']; ?>"
                                            id="topnav-dashboard" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-home"></i>
                                            <span data-key="t-dashboard">Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle arrow-none"
                                            href="Ddep_assign.php?dept=<?php echo $_GET['dept']; ?>&AY=<?php echo $_GET['AY']; ?>"
                                            id="topnav-dashboard" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-check-double"></i>
                                            <span data-key="t-dashboard">Assignment</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle arrow-none"
                                            href="Dfaculty_assign.php?dept=<?php echo $_GET['dept']; ?>&AY=<?php echo $_GET['AY']; ?>"
                                            id="topnav-dashboard" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-group"></i>
                                            <span data-key="t-dashboard">Facultywise Assignment</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle arrow-none"
                                            href="stud_meetings.php?dept=<?php echo $_GET['dept']; ?>&AY=<?php echo $_GET['AY']; ?>"
                                            id="topnav-dashboard" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-calendar"></i>
                                            <span data-key="t-dashboard">Meetings Records</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle arrow-none"
                                            href="graduated_stud_records.php?dept=<?php echo $_GET['dept']; ?>&AY=<?php echo $_GET['AY']; ?>"
                                            id="topnav-dashboard" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-calendar"></i>
                                            <span data-key="t-dashboard">Graduated Records</span>
                                        </a>
                                    </li>
                                </ul>
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

            <br>
            <div class="text-center" style="width: 400px; background-color: white; padding: 20px; border-radius: 5px; margin: 30px auto 0;">
            <h5 style="text-align: center;">Select Year of Student to Assign Student:</h5>
            <div style="display: flex; justify-content: center;">
                <div style="width: 400px; background-color: #f5f5f5; padding: 20px; border-radius: 5px;">
                    <form method="get" action="assign.php">
                        <input type="hidden" name="dept" value="<?php echo $_GET['dept']; ?>">
                        <input type="hidden" name="AY" value="<?php echo $_GET['AY']; ?>">
                        <select class="form-control" id="year" name="year" onchange="this.form.submit();">
                            <option value="">Select Academic Year</option>
                            <option value="First Year">First Year</option>
                            <option value="Second Year">Second Year</option>
                            <option value="Third Year">Third Year</option>
                            <option value="Fourth Year">Fourth Year</option>
                        </select>
                    </form>
                </div>
            </div>


            <style>
                .card {
                    width: 400px;
                    background-color: #f5f5f5;
                    border-radius: 5px;
                    padding: 20px;
                    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
                    font-family: Arial, sans-serif;
                }

                .form-control {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 10px;
                    border-radius: 5px;
                    border: 1px solid #ccc;
                }

                .form-control:focus {
                    border-color: #4d90fe;
                    outline: none;
                    box-shadow: 0px 0px 3px #4d90fe;
                }

                .form-control option:first-child {
                    color: #999;
                }
            </style>
            <!-- JAVASCRIPT -->
            <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="assets/libs/metismenujs/metismenujs.min.js"></script>
            <script src="assets/libs/simplebar/simplebar.min.js"></script>
            <script src="assets/libs/feather-icons/feather.min.js"></script>
            <script src="assets/js/pages/pricing.init.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
            <script src="assets/js/app.js"></script>



</body>

</html>