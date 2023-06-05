<?php
include('config.php');
error_reporting(0);
if (!isset($_SESSION['dep_admin'])) {
    header('location:login.php');
}
$ID = $_SESSION['dep_admin'];
$getData = mysqli_query($conn, "select * from `dep_admin` where `dep_admin_id`='$ID'");
$row = mysqli_fetch_assoc($getData);

if (
    isset($_GET['dept']) && !empty($_GET['dept'])
    && isset($_GET['year']) && !empty($_GET['year'])
) {
    // Store the selected academic year and department values in variables
    $dept = $_GET['dept'];
    $year = $_GET['year'];

}
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Graduate or Dropout</title>
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
            max-height: 600px;
            /* adjust the height as needed */
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
                        <a class="logo logo-dark">


                            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item"
                                data-bs-toggle="collapse" id="horimenu-btn" data-bs-target="#topnav-menu-content">
                                <i class="fa fa-fw fa-bars"></i>
                            </button>
                    </div>

                    <div class="topnav">
                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                            <div class="collapse navbar-collapse" id="topnav-menu-content">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle arrow-none"
                                            href="yearwise_select.php?dept=<?php echo $_GET['dept']; ?>&AY=<?php echo $_GET['AY']; ?>"
                                            id="topnav-dashboard" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-calendar-alt"></i>
                                            <span data-key="t-dashboard">Select Year</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle arrow-none"
                                            href="assign.php?dept=<?php echo $_GET['dept']; ?>&year=<?php echo $_GET['year']; ?>&AY=<?php echo $_GET['AY']; ?>"
                                            id="topnav-dashboard" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-user"></i>
                                            <span data-key="t-dashboard">Assign Student</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle arrow-none"
                                            href="assigned.php?dept=<?php echo $_GET['dept']; ?>&year=<?php echo $_GET['year']; ?>&AY=<?php echo $_GET['AY']; ?>"
                                            id="topnav-dashboard" role="button">
                                            <data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-users"></i>
                                                <span data-key="t-dashboard">Assigned Student</span>
                                        </a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link dropdown-toggle arrow-none"
                                            href="graduate_stud.php?dept=<?php echo $_GET['dept']; ?>&year=<?php echo $_GET['year']; ?>&AY=<?php echo $_GET['AY']; ?>"
                                            id="topnav-dashboard" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-graduation-cap"></i>
                                            <span data-key="t-dashboard">Graduate / Dropout</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle arrow-none"
                                            href="Graduated.php?dept=<?php echo $_GET['dept']; ?>&year=<?php echo $_GET['year']; ?>&AY=<?php echo $_GET['AY']; ?>"
                                            id="topnav-dashboard" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-user-graduate"></i>
                                            <span data-key="t-dashboard">Graduated </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle arrow-none"
                                            href="Drop_Out.php?dept=<?php echo $_GET['dept']; ?>&year=<?php echo $_GET['year']; ?>&AY=<?php echo $_GET['AY']; ?>"
                                            id="topnav-dashboard" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-user-slash"></i>
                                            <span data-key="t-dashboard">Drop Out </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle arrow-none"
                                            href="update_stud.php?dept=<?php echo $_GET['dept']; ?>&year=<?php echo $_GET['year']; ?>&AY=<?php echo $_GET['AY']; ?>"
                                            id="topnav-dashboard" role="button">
                                            <data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-arrow-circle-up"></i>
                                                <span data-key="t-dashboard">Upgrade Student</span>
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

        <div class="hori-overlay"></div>
        <?php
        if (
            isset($_GET['year']) && !empty($_GET['year'])
            && (isset($_GET['dept']) && !empty($_GET['dept']))
        ) {
            // Store the selected academic year and department values in variables
            $year = $_GET['year'];
            $dept = $_GET['dept'];
            ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                <div class="card-header justify-content-center d-flex align-items-center">
  <h4 class="card-title mx-auto" style="font-size: 22px;">Graduate or Dropout Students</h4>
</div>
<!-- end card header -->
                                    <div class="card-content table-responsive">
                                        <form method="post" action="">
                                        <table class="table table-bordered border-dark" id="table1">
    <?php
    $result = mysqli_query($conn, "SELECT * FROM studinfo WHERE Department = '$dept' AND Class = '$year'");

    echo "<thead class='text-primary'>";
    echo "<tr>";
    echo "<th style='text-align: center;'><input type='checkbox' id='select-all'></th>"; // Add checkbox for select all
    echo "<th style='text-align: center;'>Academic Year</th>";
    echo "<th style='text-align: center;'>PRN</th>";
    echo "<th style='text-align: center;'>Name of Student</th>";
    echo "<th style='text-align: center;'>Year</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td style='text-align: center;'><input type='checkbox' name='selected[]' value='" . $row['PRN'] . "'></td>";
        echo "<td style='text-align: center;'>" . $row['academic_year'] . "</td>";
        echo "<td style='text-align: center;'>" . $row['PRN'] . "</td>";
        echo "<td style='text-align: center;'>" . $row['Name'] . "</td>";
        echo "<td style='text-align: center;'>" . $row['Class'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "<tfoot>";
    echo "<tr>";
    echo "<td colspan='5' style='text-align: center;'>
        <button type='submit' name='graduated' value='1' onclick='reloadPage(\"$dept\", \"$AY\", \"$year\")' class='btn btn-primary'>
          Mark as Graduated
        </button>
        &nbsp;
        <button type='submit' name='dropped_out' value='1' onclick='reloadPage(\"$dept\", \"$AY\", \"$year\")' class='btn btn-danger'>
          Dropped Out
        </button>
      </td>";
    echo "</tr>";
    echo "</tfoot>";
    echo "</table>";
    echo "</form>";
    ?>

    <script>
        // Function to select all checkboxes
        function selectAll() {
            var checkboxes = document.getElementsByName('selected[]');
            var selectAllCheckbox = document.getElementById('select-all');

            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = selectAllCheckbox.checked;
            }
        }

        // Reload the page with the selected department (dept), academic year (AY), and year in the URL
        function reloadPage(dept, AY, year) {
            var url = window.location.href;
            url += (url.indexOf('?') === -1 ? '?' : '&') + 'dept=' + encodeURIComponent(dept) + '&AY=' + encodeURIComponent(AY) + '&year=' + encodeURIComponent(year);
            window.location.href = url;
        }

        // Add event listener to select all checkbox
        document.getElementById('select-all').addEventListener('change', selectAll);
    </script>

<?php
                                                if (isset($_POST['dropped_out'])) {
                                                    $graduated_status = 'Dropped Out';
                                                } else {
                                                    $graduated_status = 'Graduated';
                                                }

                                                $selected = $_POST['selected'];
                                                // Debug statements
                                                echo "Selected PRNs: " . implode(', ', $selected) . "<br>";
                                                echo "Graduated status: " . $graduated_status . "<br>";

                                                foreach ($selected as $prn) {
                                                    $sql = "UPDATE graduated_studinfo SET Graduated_Status = '$graduated_status' WHERE PRN IN ('" . implode("', '", $selected) . "')";
                                                    mysqli_query($conn, $sql);

                                                    $sql = "DELETE FROM studinfo WHERE PRN = '$prn'";
                                                    mysqli_query($conn, $sql);

                                                }

        }
        header("Refresh:0");
        mysqli_close($conn);
        ?>
        
                                            <?php

                                            ?>

                                            </tbody>
                                        </table>
                                    </form>

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
        <script>
            function reloadPage() {
                location.reload();
            }
        </script>





</body>

</html>