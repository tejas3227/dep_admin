<?php
include('config.php');

if (isset($_SESSION['loginid'])) {
    header('location:dashboard.php');
}

if (isset($_POST['signin'])) {
    $ID = $_REQUEST['dep_admin_id'];
    $Password = $_REQUEST['password'];

    $query = mysqli_query($conn, "select * from `dep_admin` where `dep_admin_id`='$ID' and `password`='$Password'");
    $rowCount = mysqli_num_rows($query);

    if ($rowCount > 0) {
        $rt = mysqli_fetch_assoc($query);
        $ID = $rt['dep_admin_id'];
        $_SESSION['dep_admin'] = $ID;
        $_SESSION['successMsg'] = "Welcome";
        header("location: dashboard.php?dept=" . urlencode($ID));
        exit;
    } else {
        echo '<script>alert("Invalid login credentials"); window.location.href = "login.php";</script>';
        exit;
    }

}
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Departmental Admin Login</title>
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

<body class="bg-white">

    <div class="auth-page d-flex align-items-center min-vh-100">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-xxl-3 col-lg-4 col-md-5">
                    <div class="d-flex flex-column h-100 py-5 px-4">
                        <div class="text-center text-muted mb-2">
                            <div class="pb-3">
                                <a href="index.html">
                                    <span class="logo-lg">
                                        <img src="assets/images/logo-sm.svg" alt="" height="24"> <span
                                            class="logo-txt">Student Mentoring</span>
                                    </span>
                                </a>
                                <p class="text-muted font-size-15 w-75 mx-auto mt-3 mb-0"></p>
                            </div>
                        </div>

                        <div class="my-auto">
                            <div class="p-3 text-center">
                                <img src="assets/images/auth-img.png" alt="" class="img-fluid">
                            </div>
                        </div>


                    </div>

                    <!-- end auth full page content -->
                </div>
                <!-- end col -->

                <div class="col-xxl-9 col-lg-8 col-md-7">
                    <div class="auth-bg bg-light py-md-5 p-4 d-flex">
                        <div class="bg-overlay-gradient"></div>
                        <!-- end bubble effect -->
                        <div class="row justify-content-center g-0 align-items-center w-100">
                            <div class="col-xl-4 col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="px-3 py-3 text-center">
                                            <div class="user-thumb mb-4 mb-md-5">
                                                <img src="assets/images/users/Department.jpeg"
                                                    class="rounded-circle img-thumbnail avatar-lg" alt="thumbnail">
                                                <h5 class="font-size-18 mt-3"> Departmental Admin</h5>
                                            </div>

                                            <form action="#" method="post">
                                                <div class="form-floating form-floating-custom mb-3">
                                                    <input type="text" name="dep_admin_id" class="form-control"
                                                        id="input-id" placeholder="Enter ID">
                                                    <label for="dep_admin_id">ID</label>

                                                </div>
                                                <div class="form-floating form-floating-custom mb-3">
                                                    <input type="password" name="password" class="form-control"
                                                        id="input-password" placeholder="Enter Password">
                                                    <label for="input-password">Password</label>
                                                    <div class="form-floating-icon">
                                                        <i class="uil uil-padlock"></i>
                                                    </div>
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-primary w-100" type="submit"
                                                        name="signin">Sign In</button>
                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container fluid -->
    </div>
    <!-- end authentication section -->

    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenujs/metismenujs.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>

</body>

</html>