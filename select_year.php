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
  <title>Student</title>
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
                <img src="assets/images/logo-sm.svg" alt="" height="26"> <span class="logo-txt">Student Mentoring</span>
              </span>
            </a>

            <a class="logo logo-light">
              <span class="logo-sm">
                <img src="assets/images/logo-sm.svg" alt="" height="26">
              </span>
              <span class="logo-lg">
                <img src="assets/images/logo-sm.svg" alt="" height="26"> <span class="logo-txt">Student Mentoring</span>
              </span>
            </a>
          </div>

          <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item" data-bs-toggle="collapse"
            id="horimenu-btn" data-bs-target="#topnav-menu-content">
            <i class="fa fa-fw fa-bars"></i>
          </button>

          <div class="topnav">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

              <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link dropdown-toggle arrow-none" href="dashboard.php?AY=2022-23" id="topnav-dashboard"
                      role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="bx bxs-dashboard"></i>
                      <span data-key="t-dashboard">Dashboard</span>
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
              id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="rounded-circle header-profile-user" src="assets/images/users/<?php echo $row['img']; ?>"
                alt="Header Avatar">
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

    <div class="card-container">

      <a href="yearwise_select.php?dept=CSE&AY=<?php echo $_GET['AY']; ?>" target="_blank" class="card">
        <img src="assets/images/CSE-500x372.jpg" class="card-img-top">
        <h1 class="card-title text-center" style="color: white">Computer Science Engineering</h1>
      </a>

      <a href="yearwise_select.php?dept=MECH&AY=<?php echo $_GET['AY']; ?>" target="_blank" class="card">
        <img src="assets/images/MECH.jpeg" class="card-img-top">
        <h1 class="card-title text-center" style="color: white">Mechanical Engineering</h1>
      </a>

      <a href="yearwise_select.php?dept=ELE&AY=<?php echo $_GET['AY']; ?>" target="_blank" class="card">
        <img src="assets/images/electrical-engineering-image.webp" class="card-img-top">
        <h1 class="card-title text-center" style="color: white">Electrical Engineering</h1>
      </a>

      <a href="yearwise_select.php?dept=CVL&AY=<?php echo $_GET['AY']; ?>" target="_blank" class="card">
        <img src="assets/images/CIVIL.jpg" class="card-img-top">
        <h1 class="card-title text-center" style="color: white">Civil Engineering</h1>
      </a>

      <a href="yearwise_select.php?dept=BIO&AY=<?php echo $_GET['AY']; ?>" target="_blank" class="card">
        <img src="assets/images/biotechnology-engineering-image.webp" class="card-img-top">
        <h1 class="card-title text-center" style="color: white">Biotechnology</h1>
      </a>

      <a href="yearwise_select.php?dept=ENV&AY=<?php echo $_GET['AY']; ?>" target="_blank" class="card">
        <img src="assets/images/Environmental-Engineering.jpg" class="card-img-top">
        <h1 class="card-title text-center" style="color: white">Environmental Engineering</h1>
      </a>

      <a href="yearwise_select.php?dept=ENTC&AY=<?php echo $_GET['AY']; ?>" target="_blank" class="card">
        <img src="assets/images/ENTC.png" class="card-img-top">
        <h1 class="card-title text-center" style="color: white">Electronics and Telecommunication Engineering</h1>
      </a>

      <a href="yearwise_select.php?dept=PROD&AY=<?php echo $_GET['AY']; ?>" target="_blank" class="card">
        <img src="assets/images/PRODUCTION.jpeg" class="card-img-top">
        <h1 class="card-title text-center" style="color: white">Prodction Engineering</h1>
      </a>

      <a href="yearwise_select.php?dept=DS&AY=<?php echo $_GET['AY']; ?>" target="_blank" class="card">
        <img src="assets/images/DS.jpg" class="card-img-top">
        <h1 class="card-title text-center" style="color: white">Data Science Engineering</h1>
      </a>

      <a href="yearwise_select.php?dept=AIML&AY=<?php echo $_GET['AY']; ?>" target="_blank" class="card">
        <img src="assets/images/AIML.jpeg" class="card-img-top">
        <h1 class="card-title text-center" style="color: white">Artificial Intelligence and Machine Learning Engineering
        </h1>
      </a>

      <a href="yearwise_select.php?dept=CVEN&AY=<?php echo $_GET['AY']; ?>" target="_blank" class="card">
        <img src="assets/images/CVEN.jpg" class="card-img-top">
        <h1 class="card-title text-center" style="color: white">Civil and Environmental Engineering</h1>
      </a>
    </div>

    <style>
      .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }

      .card {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #000;
        color: #fff;
        padding: 20px;
        text-decoration: none;
        width: 300px;
        height: 350px;
        border-radius: 10px;
        margin: 20px;
      }

      .card:hover {
        transform: scale(1.05);
        transition: all 0.2s ease-in-out;
        background-color: #00A170;
      }

      .card-img-top {
        max-width: 100%;
        height: auto;
        margin-bottom: 20px;
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