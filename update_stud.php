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
    && isset($_GET['AY']) && !empty($_GET['AY'])
) {
    // Store the selected academic year and department values in variables
    $dept = $_GET['dept'];
    $year = $_GET['year'];
    $AY = $_GET['AY'];
}
?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Update Student</title>
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
            max-height: 550px;
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
                                    <li class="nav-item">
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
                                    <li class="nav-item active">
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
                            <a class="dropdown-item" href="auth-signout-cover.html"><i
                                    class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span
                                    class="align-middle">Logout</span></a>
                        </div>
                    </div>
                </div>
            </div>

        </header>

        <?php
        if (
            isset($_GET['dept']) && !empty($_GET['dept'])
            && isset($_GET['year']) && !empty($_GET['year'])
            && isset($_GET['AY']) && !empty($_GET['AY'])
        ) {
            // Store the selected academic year and department values in variables
            $dept = $_GET['dept'];
            $year = $_GET['year'];
            $AY = $_GET['AY'];

        }
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
  <h4 class="card-title mx-auto" style="font-size: 24px;">
    Upgrade Students <?php echo $dept ?> Department
  </h4>
</div>

<div class="card-header justify-content-center d-flex align-items-center">
  <h6 class="card-title mx-auto" style="font-size: 18px;color: red;">
    (Please Download the Assigned Student Report at End of Every Academic Year)*
  </h6>
</div>

<!-- end card header -->
                                <div class="card-content table-responsive">
                                    <form method="post" action="">
                                        <div style="text-align: center;">
                                            <label for="select-all">Select All</label>
                                            <input type="checkbox" id="select-all">
                                        </div>
                                        <table class="table table-bordered border-dark" id="table1">
                                            <?php

                                            $result = mysqli_query($conn, "SELECT * FROM studinfo WHERE Department = '$dept' AND Class = '$year' AND Academic_Year = '$AY'");

                                            echo "<thead class='text-primary'>";
                                            echo "<tr>";
                                            echo "<th style='text-align: center;'>Select</th>";
                                            echo "<th style='text-align: center;'>PRN</th>";
                                            echo "<th style='text-align: center;'>Name of Student</th>";
                                            echo "<th style='text-align: center;'>Year</th>";
                                            echo "<th style='text-align: center;'>Academic Year</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td style='text-align: center;'><input type='checkbox' name='selected[]' value='" . $row['PRN'] . "'></td>";
                                                echo "<td style='text-align: center;'>" . $row['PRN'] . "</td>";
                                                echo "<td style='text-align: center;'>" . $row['Name'] . "</td>";
                                                echo "<td style='text-align: center;'>" . $row['Class'] . "</td>";
                                                echo "<td style='text-align: center;'>" . $row['academic_year'] . "</td>";
                                                echo "</tr>";
                                            }
                                            echo "</tbody>";
                                            echo "<tfoot>";
                                            echo "<tr>";
                                            echo "<td colspan='5' style='text-align: center;'>
<button type='submit' name='Upgrade' class='btn btn-primary'>Upgrade Students</button>
<button type='submit' name='YearDown' class='btn btn-danger'>Year Down Student</button>
</td>";

                                            echo "</tr>";
                                            echo "</tfoot>";
                                            echo "</table>";
                                            echo "</form>";


                                            if (isset($_POST['YearDown']) && isset($_POST['selected'])) {
                                                $selected_students = $_POST['selected'];
                                                foreach ($selected_students as $student) {
                                                    $current_year = $_GET['AY'];
                                                    $next_year = $current_year + 1; // set the next year to the year after the current year
                                                    $academic_year = $next_year . "-" . substr($next_year + 1, -2);
                                                    $sql = "UPDATE studinfo SET Academic_Year='$academic_year' WHERE PRN='$student'";
                                                    mysqli_query($conn, $sql);
                                                }

                                                // Display success message to the user
                                                echo "<div class='alert alert-success'>Selected students Only academic year has been upgraded successfully!</div>";

                                                // Refresh the page to show the updated student records
                                                header("Refresh:0");
                                            }



                                            // Modify your PHP code to handle the "Select All" checkbox
                                            if (isset($_POST['Upgrade'])) {
                                                // Check if "Select All" checkbox is checked
                                                if (isset($_POST['select_all']) && $_POST['select_all'] == '1') {
                                                    // Update the Class value of all students based on the selected academic year
                                                    if ($year == 'First Year') {
                                                        $current_year = $_GET['AY'];
                                                        $next_year = $current_year + 1; // set the next year to the year after the current year
                                                        $academic_year = $next_year . "-" . substr($next_year + 1, -2);
                                                        $sql = "UPDATE studinfo SET Class='Second Year', Academic_Year='$academic_year' WHERE Department='$dept' AND Class='$year'";
                                                        mysqli_query($conn, $sql);
                                                    } else if ($year == 'Second Year') {
                                                        $sql = "UPDATE studinfo SET Class='Third Year', Academic_Year='$academic_year' WHERE Department='$dept' AND Class='$year'";
                                                        mysqli_query($conn, $sql);
                                                    } else if ($year == 'Third Year') {
                                                        $sql = "UPDATE studinfo SET Class='Fourth Year', Academic_Year='$academic_year' WHERE Department='$dept' AND Class='$year'";
                                                        mysqli_query($conn, $sql);
                                                    }

                                                    // Display success message to the user
                                                    echo "<div class='alert alert-success'>All students upgraded to next year successfully!</div>";

                                                    // Refresh the page to show the updated student records
                                                    header("Refresh:0");
                                                } else {
                                                    // Check if the "Upgrade" button is clicked and selected students' checkboxes are checked
                                                    if (isset($_POST['Upgrade']) && isset($_POST['selected'])) {
                                                        $selected_students = $_POST['selected'];

                                                        // Update the Class value of selected students to the next year
                                                        if ($year == 'First Year') {
                                                            foreach ($selected_students as $student) {
                                                                $current_year = $_GET['AY'];
                                                                $next_year = $current_year + 1; // set the next year to the year after the current year
                                                                $academic_year = $next_year . "-" . substr($next_year + 1, -2);
                                                                $sql = "UPDATE studinfo SET Class='Second Year', Academic_Year='$academic_year' WHERE PRN='$student'";
                                                                mysqli_query($conn, $sql);
                                                            }
                                                        } else if ($year == 'Second Year') {
                                                            foreach ($selected_students as $student) {
                                                                $current_year = $_GET['AY'];
                                                                $next_year = $current_year + 1; // set the next year to the year after the current year
                                                                $academic_year = $next_year . "-" . substr($next_year + 1, -2);
                                                                $sql = "UPDATE studinfo SET Class='Third Year', Academic_Year='$academic_year' WHERE PRN='$student'";
                                                                mysqli_query($conn, $sql);
                                                            }
                                                        } else if ($year == 'Third Year') {
                                                            foreach ($selected_students as $student) {
                                                                $current_year = $_GET['AY'];
                                                                $next_year = $current_year + 1; // set the next year to the year after the current year
                                                                $academic_year = $next_year . "-" . substr($next_year + 1, -2);
                                                                $sql = "UPDATE studinfo SET Class='Fourth Year', Academic_Year='$academic_year' WHERE PRN='$student'";
                                                                mysqli_query($conn, $sql);
                                                            }
                                                        } else {
                                                        }
                                                        // Display success message to the user
                                                        echo "<div class='alert alert-success'>Selected students upgraded to next year successfully!</div>";
                                                    }

                                                }





                                                // Refresh the page to show the updated student records
                                                header("Refresh:0");
                                            }

                                            mysqli_close($conn);
                                            ?>

                                            <script>
                                                // Add this JavaScript code after the table
                                                document.getElementById('select-all').addEventListener("change", function () {
                                                    var checkboxes = document.getElementsByName("selected[]");
                                                    for (var i = 0; i < checkboxes.length; i++) {
                                                        checkboxes[i].checked = this.checked;
                                                    }
                                                });
                                            </script>
                                            <?php

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

        <!-- End Page-content -->

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
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenujs/metismenujs.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/pricing.init.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>