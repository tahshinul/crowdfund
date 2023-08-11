<?php

require_once '../crowdfund/dbcon.php';

session_start();
if(isset($_SESSION['mlogin'])){
  header('location: member/index.php');
}

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $result = mysqli_query($con,"SELECT * FROM `users` WHERE `email` = '$email' OR `uname` = '$email'");
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    if (  password_verify($password,$row['password'])  ) {
      header('Location: member/index.php');
      $_SESSION['mlogin'] = $email;
    }
    else {
      $err = "Wrong password";
    }
  } else {
  $err = " email or password incorrect";
  }
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
        <?php
if (isset($err)) {
?>
        <div class="alert alert-danger">
          <?= $err ?>
        </div>
        <?php
}
?>
      </div>

      <div class="card-body">
        <form action=" <?= $_SERVER['PHP_SELF'] ?>" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6 offset-3">
              <button type="submit" class="btn btn-block" name="login"
                style="background-color: rgb(240, 60, 2);">Login</button>
            </div>
          </div>
          <div class="row">
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dont have an account yet
            ? <br><a style="color: rgb(240, 60, 2);" href="../crowdfund/register.php"> <br>
              &nbsp;&nbsp;Register</a>
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