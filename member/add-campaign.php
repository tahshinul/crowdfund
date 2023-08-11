<?php
require_once '../dbcon.php';

session_start();
// echo $_SESSION['mlogin'];
$email = $_SESSION['mlogin'];
$result = mysqli_query($con,"SELECT * FROM `users` WHERE `email` = '$email'");
$row = mysqli_fetch_assoc($result);
// echo $row['uname'];
// print_r($_POST);
// print_r($_FILES);

if ( isset( $_POST['submit'] )) {
// echo '<pre>';
//   print_r($_FILES);
//   print_r($_POST);
// echo '</pre>';
$user = $_SESSION['mlogin'];
$campaign = $_POST['campaign'];
$description = $_POST['description'];
$target = $_POST['target'];
$deadline = $_POST['Deadline'];

$image =   explode('.',$_FILES['Banner']['name']);   
$image_ext = end($image);




$image = date('Ymdhis.').$image_ext;

// echo $image;
// echo $image_ext;

// echo $image;

$result=mysqli_query($con,"INSERT INTO `campaign`(`user`, `cname`, `cdescription`, `ctarget`, `deadline`, `banner`) VALUES ('$user','$campaign','$description','$target','$deadline','$image')");

if ($result) {
  move_uploaded_file($_FILES['Banner']['tmp_name'],'../assets/posts/'.$image);
  $success = "New campaign added successfully";
} else {
 $err = "Could not insert campaign";
}


}




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
          <a class="nav-link" data-widget="fullscreen" href="../index.php">
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
              <a href="./index.php" class="nav-link">
                <i class="nav-icon fa fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./campaign-list.php" class="nav-link active">
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
              <a href="./withdraw.php" class="nav-link">
                <i class="nav-icon fa fa-file-invoice"></i>
                <p>
                  Withdraw Request
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
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">New Campaign</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../member/index.php">Home</a></li>
                <li class="breadcrumb-item active">Campaign</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <?php
if (isset($success)) {
?>
      <div class="alert alert-success">
        <?= $success ?>
      </div>
      <?php
}
?>
      <?php
if (isset($err)) {
?>
      <div class="alert alert-danger">
        <?= $err ?>
      </div>
      <?php
}
?>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-success">
                <!-- form start -->
                <form role="form" id="quickForm" action="<?= $_SERVER['PHP_SELF'] ?>" method="post"
                  enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <!-- <div class="col-md-4">
                        <div class="form-group">
                          <label>Category</label>
                          <input type="text" name="lname" class="form-control" placeholder="Category">
                        </div>
                      </div> -->

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Campaign Name</label>
                          <input type="text" name="campaign" class="form-control" placeholder="Campaign Name" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Description</label>
                          <input type="text" name="description" class="form-control" required placeholder="Description">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Target Amount</label>
                          <input type="number" name="target" required class="form-control" placeholder="ex. 20,000.00">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Deadline</label>
                          <input type="date" name="Deadline" required class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Banner </label>
                          <input type="file" name="Banner" required class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
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
  <!-- jquery-validation -->
  <script src="assets/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="assets/plugins/jquery-validation/additional-methods.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="assets/dist/js/demo.js"></script>
</body>

</html>