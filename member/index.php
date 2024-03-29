<?php



require_once '../dbcon.php';

session_start();
// echo $_SESSION['mlogin'];
$email = $_SESSION['mlogin'];
$result = mysqli_query($con,"SELECT * FROM `campaign` WHERE `user` = '$email'");
$row = mysqli_num_rows($result);
$result2 = mysqli_query($con,"SELECT `dno` FROM `campaign` WHERE `user` = '$email'");
$row2 = mysqli_fetch_assoc($result2);
// $count = count($row);

// print_r($row);

// echo $row['uname'];


// require_once '../dbcon.php';

// session_start();

// if(!isset($_SESSION['mlogin'])){
//   header('location: login.php');
  

  
// $email = $_SESSION['mlogin'];
// echo $_SESSION['mlogin'];

// $result = mysqli_query($con,"SELECT * FROM `campaign` WHERE `user` = '$email'");
// $row = mysqli_fetch_assoc($result);



// print_r();





?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CrowdFunding - Member</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="assets/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <style type="text/css">
  td p {
    margin: -0.3rem;
    font-size: 0.9rem;
  }

  aside.main-sidebar {
    background-color: #ddd;
    color: rgb(77, 75, 75);
  }

  nav ul li a p {
    color: rgb(43, 35, 32);
  }

  nav ul li a i {
    color: rgb(43, 35, 32);
  }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="../member/logout.php">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="assets/img/logo.png" alt="Logo" width="200" style="margin-bottom:-50px;margin-top:-50px"
          style="opacity: .8">
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="./index.php" class="nav-link active">
                <i class="nav-icon fa fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./campaign-list.php" class="nav-link">
                <i class="nav-icon fa fa-flag-checkered"></i>
                <p>
                  Campaign List
                </p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="./gallery.php" class="nav-link">
                <i class="nav-icon fa fa-images"></i>
                <p>
                  Gallery
                </p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="./donation.php" class="nav-link">
                <i class="nav-icon fa fa-money-bill"></i>
                <p>
                  Donations
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./profile.php" class="nav-link">
                <i class="nav-icon fa fa-user"></i>
                <p>
                  Profiles
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../member/index.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-4 offset-md-2">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-flag"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Campaign</span>
                  <span class="info-box-number"> <?= $row ?> </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-heart"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Donations</span>
                  <span class="info-box-number"> <?= $row2['dno'] ?> </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- ./col -->
          </div>

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2020-2023 <a href="#">Braccrowdfund.com</a></strong>
      All rights reserved by BRACU CSE Department.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 0.0.1
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
  $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- ChartJS -->
  <script src="assets/plugins/chart.js/Chart.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/js/adminlte.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="assets/tables/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="assets/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script>
  $(function() {
    $("#example1").DataTable();
  });
  </script>
</body>

</html>