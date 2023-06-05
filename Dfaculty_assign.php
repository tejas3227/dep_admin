<?php
include('config.php');

if (!isset($_SESSION['dep_admin'])) {
    header('location:login.php');
}
$ID = $_SESSION['dep_admin'];
$getData = mysqli_query($conn, "select * from `dep_admin` where `dep_admin_id`='$ID'");
$row = mysqli_fetch_assoc($getData);

if(isset($_GET['dept']) && !empty($_GET['dept'])) {
    // Store the selected academic year and department values in variables
    $dept = $_GET['dept'];

   }
?>

<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Facultywise Assignment</title>
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
        <style>
    .table-responsive {
        max-height: 600px; /* adjust the height as needed */
        overflow-y: auto;
    }
    #table thead th {
    position: sticky;
    top: 0;
    z-index: 1;
    background-color: #fff;
}
</style>
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
                            <a  class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.svg" alt="" height="26">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-sm.svg" alt="" height="26"> <span class="logo-txt">Departmental Admin</span>
                                </span>
                            </a>

                            <a  class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.svg" alt="" height="26">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-sm.svg" alt="" height="26"> <span class="logo-txt">Departmental Admin</span>
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item" data-bs-toggle="collapse" id="horimenu-btn" data-bs-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>

                    <div class="topnav">
                            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
        
                                <div class="collapse navbar-collapse" id="topnav-menu-content">
                                    <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle arrow-none" href="yearwise_select.php?dept=<?php echo $_GET['dept'];?>&AY=<?php echo $_GET['AY']; ?>" id="topnav-dashboard" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-arrow-back"></i>
                                            <span data-key="t-dashboard">Go Back </span>
                                        </a>
                                    </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>


<div class="d-flex">
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item user text-start d-flex align-items-center" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/<?php echo $row['image']; ?>"
                                alt="Header Avatar">
                                <span class="ms-2 d-none d-xl-inline-block user-item-desc">
                                    <span class="user-name"><?php echo $row['name']; ?><i class="mdi mdi-chevron-down"></i></span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end pt-0">
                                <a class="dropdown-item" href="login.php"><i class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>


            </header>

<div class="hori-overlay"></div>
<?php
if(isset($_GET['dept']) && !empty($_GET['dept'])) {
    $dept = $_GET['dept'];
?>
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header justify-content-center align-items-center d-flex" style="height: 80px;">
    <h4 class="card-title text-center" style="font-size: 22px;"><u>Facultywise Assigned Students <?php echo $dept?> Department</u></h4>
</div>
                            <div class="card-content table-responsive">
                            <table class="table table-bordered border-Dark" id="table" style="border-color: #333;">

                                <div style="text-align: center;">
  <a href="Dfactuly_assign_Report.php?dept=<?php echo $dept; ?>">Download PDF File</a>
</div>

<?php 
$result = mysqli_query($conn, "SELECT * FROM teachinfo where Department = '$dept'");
$count = mysqli_num_rows($result);
echo "<thead class='text-primary'>";
echo "<tr>";
echo "<th colspan='6' style='text-align: center;font-size: 18px;'>Total Teachers: $count</th>";
echo "</tr>";
echo "</thead>";
?>
<?php 
$result1 = mysqli_query($conn, "SELECT t.tid, t.tName, t.Department, COUNT(a.PRN) as num_assigned
FROM teachinfo t
LEFT JOIN assign a ON a.TID = t.tid
WHERE t.Department = '$dept'
GROUP BY t.tid") or die(mysqli_error($conn));


echo "<thead class='text-primary'>";
echo "<tr>";
echo "<th style='text-align: center;'>TID</th>";
echo "<th style='text-align: center;'>Name of Mentor</th>";
echo "<th style='text-align: center;'>Department</th>";
echo "<th style='text-align: center;'>Number of Students Assigned</th>";
echo "<th style='text-align: center;'>Actions</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

while ($row = mysqli_fetch_assoc($result1)) {
    echo "<tr>";
echo "<td style='text-align: center;'>" . $row['tid'] . "</td>";
echo "<td style='text-align: center;'>" . $row['tName'] . "</td>";
echo "<td style='text-align: center;'>" . $row['Department'] . "</td>";
echo "<td style='text-align: center;'>" . $row['num_assigned'] . "</td>";
echo "<td style='text-align: center;'><button onclick='window.location.href = \"show_assign_stud.php?tid=" . $row['tid'] . "&dept=" . $row['Department'] . "&AY=" . $_GET['AY'] . "&tName=" . urlencode($row['tName']) . "\";'>Show</button></td>";
echo "</tr>";

  }
  echo "</tbody>";

  mysqli_close($conn);
?>


<?php
}
?>
                                                      </tbody>
                                </table>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
    </div>



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
