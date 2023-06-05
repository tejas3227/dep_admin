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
    $year = str_replace("+", " ", urlencode($_GET['year']));

    // Generate a query to retrieve the records based on the selected academic year and department
    $query = "SELECT * FROM studinfo WHERE `Department` = '$dept' AND `Class` = '$year'";
    $result1 = mysqli_query($conn, $query);
}

?>



<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Assign Student</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Jassa" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="view_stud.css">
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
                                                href="yearwise_select.php?dept=<?php echo $_GET['dept']; ?>&AY=<?php echo $_GET['AY']; ?>"
                                                id="topnav-dashboard" role="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-calendar-alt"></i>
                                                <span data-key="t-dashboard">Select Year</span>
                                            </a>
                                        </li>
                                        <li class="nav-item active">
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
        <form action="#" method="post">

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                <div class="card-header justify-content-center d-flex align-items-center">
  <h4 class="card-title mx-auto" style="font-size: 22px;">All Students</h4>
</div>

<!-- end card header -->
                                    <div class="card-content table-responsive">

                                        <table class="table table-bordered border-Dark" id="table1">
                                            <?php
                                            $query = "SELECT COUNT(*) AS count FROM studinfo 
                                          WHERE Class = '$year' AND Department = '$dept'
                                          AND NOT EXISTS (SELECT 1 FROM assign WHERE studinfo.PRN = assign.PRN)";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $count = $row['count'];
                                            echo "<thead class='text-primary'>";
                                            echo "<tr>";
                                            echo "<th colspan='6' style='text-align: center; font-size: 18px;'>Students Not Assigned : $count</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            ?>
                                            <thead class="text-primary">
                                                <tr>
                                                    <th style='text-align: center;'>Select</th>
                                                    <th style='text-align: center;'>PRN</th>
                                                    <th style='text-align: center;'>Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Connect to database and fetch student records
                                                
                                                include('config.php');
                                                $result1 = mysqli_query($conn, "SELECT * FROM studinfo WHERE `Department` = '$dept' AND `Class` = '$year'");

                                                // Get an array of assigned students
                                                $assigned_students = array();
                                                $assigned_result = mysqli_query($conn, "SELECT PRN FROM assign");
                                                while ($assigned_row = mysqli_fetch_assoc($assigned_result)) {
                                                    $assigned_students[] = $assigned_row['PRN'];
                                                }

                                                while ($row = mysqli_fetch_assoc($result1)) {
                                                    // Check if the current student has been assigned to a teacher
                                                    if (in_array($row['PRN'], $assigned_students)) {
                                                        // Skip the current student if they have been assigned
                                                        continue;
                                                    }

                                                    // Display each student as a row in the table with a checkbox
                                                    echo "<tr>";
                                                    echo "<td style='text-align: center;'><input type='checkbox' style='width: 15px; height: 15px;' name='students[]' value='" . $row['PRN'] . "," . $row['Name'] . "'></td>";
                                                    echo "<td style='text-align: center;'>" . $row['PRN'] . "</td>";
                                                    echo "<td style='text-align: center;'>" . $row['Name'] . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-md-6">
                                <div class="card">
                                <div class="card-header justify-content-center d-flex align-items-center">
  <h4 class="card-title mx-auto" style="font-size: 22px;">All Mentors</h4>
</div>

<!-- end card header -->
                                    <div class="card-content table-responsive">

                                        <table class="table table-bordered border-Dark" id="table2">
                                            <?php
                                            $query1 = "SELECT COUNT(*) AS count FROM teachinfo 
                                          WHERE Department = '$dept' 
                                          AND NOT EXISTS (SELECT 1 FROM assign WHERE teachinfo.tid = assign.tid)";
                                            $result1 = mysqli_query($conn, $query1);
                                            $row1 = mysqli_fetch_assoc($result1);
                                            $count = $row1['count'];
                                            echo "<thead class='text-primary'>";
                                            echo "<tr>";
                                            echo "<th colspan='6' style='text-align: center; font-size: 18px;'>Total Number of Teachers : $count</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            ?>
                                            <thead class="text-primary">
                                                <tr>
                                                    <th style='text-align: center;'>Select</th>
                                                    <th style='text-align: center;'>Mentor ID</th>
                                                    <th style='text-align: center;'>Name</th>
                                                </tr>
                                            </thead>
                                            </thead>
                                            <?php
                                            // Fetch teacher records
                                            $result = mysqli_query($conn, "SELECT * FROM teachinfo where `Department` = '$dept'");

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                // Display each teacher as a row in the table with a checkbox
                                                echo "<tr>";
                                                echo "<td style='text-align: center;'><input type='checkbox' style='width: 15px; height: 15px;' name='teacher' value='" . $row['tid'] . "," . $row['tName'] . "'></td>";
                                                echo "<td style='text-align: center;'>" . $row['tid'] . "</td>";
                                                echo "<td style='text-align: center;'>" . $row['tName'] . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </table>
                                        </td>
                                        </tr>
                                        </table>


                                        <br>
                                        <div class="button-container">
                                            <button type="submit" name="assign" class="btn btn-success">Assign</button>
                                        </div>

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
    <!-- End Page-content -->
    <style>
        .button-container {
            position: fixed;
            bottom: 320px;
            left: 1630px;
            transform: translateX(-50%);
        }

        .button-container button {
            font-size: 1.2em;
        }
    </style>

    <?php
    if (isset($_POST['assign'])) {
        // Get selected student PRNs and teacher TID
        $students = $_POST['students'];
        $teacher = $_POST['teacher'];

        // Insert selected values into database
        foreach ($students as $student) {
            // Separate PRN and Name from the checkbox value
            $values = explode(' ', $student);
            $PRN = $values[0];
            $Name = $values[1];

            // Get the full name from the studinfo table
            $query = "SELECT Name FROM studinfo WHERE PRN='$PRN'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $FullName = $row['Name'];

            // Insert the student and teacher data into the assign table
            $query = "INSERT INTO assign (PRN, academic_year, Name, Department, class, tid, tName)
            SELECT '$PRN',(SELECT academic_year FROM studinfo WHERE PRN='$PRN'), '$FullName',(SELECT Department FROM studinfo WHERE PRN='$PRN') ,(SELECT class FROM studinfo WHERE PRN='$PRN'), '$teacher', (SELECT tName FROM teachinfo WHERE tid='$teacher')
            WHERE NOT EXISTS (SELECT 1 FROM assign WHERE PRN='$PRN')";

            $result = mysqli_query($conn, $query);

            if (!$result) {
                // Error handling code
                echo "Error: " . mysqli_error($conn);
                exit();
            }
        }

        echo "Assignments added successfully!";
    }

    ?>



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