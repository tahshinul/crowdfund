<?php

require_once '../crowdfund/dbcon.php';

$banner = $_GET['cmpdelete'];
$result = mysqli_query($con,"SELECT * FROM `campaign` WHERE `banner` = '$banner'");
$row = mysqli_fetch_assoc($result);



if (isset($_POST['donate'])) {
  $x = $_POST['cname'];
  $y = $_POST['cdonate'];
  $n = $_POST['cdonatename'];
  $p = $_POST['cnamey'];
  
  $result = mysqli_query($con,"UPDATE `campaign` SET `crecieved`=crecieved+'$y',`dno`=dno+1 WHERE `banner` = '$x'");
  $result1 =  mysqli_query($con,"INSERT INTO `donation`(`campname`, `donorname`, `amount`) VALUES ('$p','$n','$y')");
  header('location: succ.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CrowdFunding - Login</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/assets/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-warning">
      <div class="card-header text-center">
        <a href="index.php" class="brand-link">
          <img src="admin/assets/img/logo.png" alt="Logo" width="200" style="margin-bottom: -50px;">
        </a>

      </div>

      <div class="card-body">
        <form action=" <?= $_SERVER['PHP_SELF'] ?>" method="post">
          <div class="input-group mb-3">
            <p class="h6" style="padding-right: 13px; padding-top: 5px;"> Campaign : </p>

            <input type="text" style="text-align:center" class="form-control" name="cnamey" value="<?= $row['cname'] ?>"
              placeholder="campaign name" readonly>
            <div class="input-group-append">

            </div>
          </div>
          <br>
          <div class="input-group mb-3">

            <p class="h6" style="padding-right: 13px; padding-top: 5px;"> Donation needed : </p>

            <input type="text" style="text-align:center" class="form-control" name="ctarget"
              value="<?= $row['ctarget'] ?>" placeholder="Target amount" readonly>
            <div class="input-group-append">
            </div>
          </div>
          <br>
          <div class="input-group mb-3">
            <p class="h6" style="padding-right: 13px; padding-top: 5px;"> Donator name : </p>
            <input type="text" style="text-align:center" class="form-control" name="cdonatename"
              placeholder="Enter your name">
            <div class="input-group-append">
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="hidden" style="text-align:center" value="<?= $row['banner'] ?>" class="form-control"
              name="cname" placeholder="Post ID" readonly>
            <div class="input-group-append">
            </div>
          </div>
          <div class="input-group mb-3">
            <p class="h6" style="padding-right: 13px; padding-top: 5px;"> Donation Amount : </p>
            <input type="number" style="text-align:center" class="form-control" name="cdonate"
              placeholder="Amount in TK">
            <div class="input-group-append">
            </div>
          </div>
          <div class="row">
            <div class="col-6 offset-3">
              <button type="submit" class="btn btn-block" name="donate"
                style="background-color: rgb(240, 60, 2);">donate</button>
            </div>
          </div>
      </div>

      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  </div>
  <!-- /.login-box -->
</body>

</html>