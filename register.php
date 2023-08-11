<?php

require_once '../crowdfund/dbcon.php';
session_start();
if(isset($_SESSION['mlogin'])){
  header('location: member/index.php');
}

// if ( isset(  $_POST['login']  ) ){
//   header("Location : crowdfund/login.php");
// }

if ( isset(  $_POST['register']  ) ){
// echo '<pre>';
//   print_r($_POST);
//   echo '</pre>';
$name = $_POST['uname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$adress = $_POST['adress'];


$input_error = array();
if ( empty($name)) {
  $input_error['name'] = " All fields are required";
}if ( empty($email)) {
  $input_error['email'] = " All fields are required";
}if ( empty($phone)) {
  $input_error['phone'] = " All fields are required";
}if ( empty($password)) {
  $input_error['password'] = " All fields are required";
}
if ( empty($gender)) {
  $input_error['gender'] = " All fields are required";
}
if ( empty($adress)) {
  $input_error['adress'] = " All fields are required";
}

$input_error['x'] = "All fields are required";

if (count($input_error) == 1) {

$email_check = mysqli_query($con,"SELECT * FROM `users` WHERE `email` = '$email'");
$email_check_row = mysqli_num_rows($email_check);

if ($email_check_row == 0) {
  
$password_hash = password_hash($password,PASSWORD_DEFAULT);
$result = mysqli_query ($con, "INSERT INTO `users`(`uname`, `email`, `phone`, `password`,`gender`,`adress`) VALUES ('$name','$email','$phone','$password_hash','$gender','$adress')");

if ($result) {
$success = "Registered successfully";
}else {
$err = "Something went wrong";
}

}else {
 $email_exists = "This email already exists";
}



} else if( count($input_error) > 1) {
  echo '<span  class="alert alert-danger" align="center">'.$input_error['x'].'<span>';
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
  <!-- Latest compiled and minified CSS -->
  <!-- Bootstrap -->



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
        <?php
if (isset($email_exists)) {
?>
        <div class="alert alert-danger">
          <?= $email_exists ?>
        </div>
        <?php
}
?>

      </div>
      <div class="card-body">
        <form action=" <?= $_SERVER['PHP_SELF']  ?> " method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="uname">
            <div class="input-group-append">
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Phone no." name="phone"
              pattern="01[1|5|6|7|8|9][0-9]{8}">
            <div class="input-group-append">
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Gender" name="gender">
            <div class="input-group-append">
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Address" name="adress">
            <div class="input-group-append">
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">

          </div>

          <div class="row">
            <div class="col-4 offset-2">
              <button type="submit" class="btn btn-block btn-primary" name="register"
                style="background-color: rgb(240, 60, 2);">Register</button>
            </div>
            <div class="col-4" style="text-align:justify;">

              <!-- <button type="submit" class="btn btn-primary" name="login" style="background-color: rgb(240, 60, 2); ">
                Login</button> -->
              <!-- already registered ? please  -->
              <a href="../crowdfund/login.php" class="btn btn-primary"
                style=" background-color: rgb(240, 60, 2);">Login</a>

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