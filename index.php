<?php
require_once '../crowdfund/dbcon.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CrowdFunding</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a
            href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+8801232323232</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="index.php">CrowdFunding</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="campaign-list.php">List of Campaign</a></li>
          <li><a href="login.php">Login</a></li>
          <!-- <li><a href="#">/</a></li> -->
          <li><a href="register.php">Register</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(admin/assets/img/10.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h3>Help, Donate & <span>Fundrise</span></h3>
              <h1>Your Contribution is Important</h1>
              <div class="text-center"><a href="about.php" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(admin/assets/img/9.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h1>দান করুন</h1>
              <p>আপনার অবদান একজন অসহায় ব্যক্তিকে সাহায্য করতে পারে</p>
              <div class="text-center"><a href="about.php" class="btn-get-started">আরও পড়ুন</a></div>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-left-arrow" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-right-arrow" aria-hidden="true"></span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <section id="cta" class="cta">
      <div class="container">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3>Rise Your Hand</h3>
            <p> আপনার সাহায্যের হাত বারিয়ে দিন</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="campaign-list.php">Donate Now</a>
          </div>
        </div>

      </div>
    </section>

    <section id="pricing" class="pricing">
      <div class="container">

        <div class="row">

          <?php

$result = mysqli_query($con,"SELECT * FROM `campaign`");
while ($row = mysqli_fetch_assoc($result)) {
  ?>
          <!-- ------------------------ -->
          <div class="col-lg-4 inx col-md-6">
            <div class="box" data-aos="fade-right">
              <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                <center>
                  <img src="../crowdfund/assets/posts/<?= $row['banner'] ?>" width="380" />
                </center>
              </div>
              <h2 class="b" float:left style="color:rgb(43, 35, 32);"><?= $row['cname'] ?></h2>
              <div class="float-left">
                <p><strong>Raised:</strong><small class="text-success"> ৳ <?= $row['crecieved'] ?></small></p>
                <p><strong>Goal:</strong><small class="text-danger"> ৳ <?= $row['ctarget'] ?></small></p>
              </div>
              <div class="btn-wrap">
                <a href="donate.php?cmpdelete=<?= $row['banner'] ?>" class="btn-buy">Donate Now</a>
              </div>
            </div>
          </div>

          <?php
                  }?>

        </div>


        <style>
        .b {
          word-wrap: break-word;
        }

        .inx {
          padding-bottom: 20px;
        }
        </style>

        <!-- -------------------- -->
        <!-- <div class="col-lg-4 col-md-6">
            <div class="box" data-aos="fade-right">
              <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                <center>
                  <img src="admin/assets/img/12.png" width="380" />
                </center>
              </div>
              <h2 style="color:rgb(43, 35, 32);">নিরাপদ খাদ্য ও সুস্বাস্থ্য নিশ্চিতকরণে আমাদের প্রজেক্টে ফান্ডিং করুন
              </h2>

              <div class="float-left">
                <p><strong>Raised:</strong><small class="text-success"> ৳ 2,020</small></p>
                <p><strong>Goal:</strong><small class="text-danger"> ৳ 800,000</small></p>
              </div>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Donate Now</a>
              </div>
            </div>
          </div> -->
        <!-- <div class="col-lg-4 col-md-6">
            <div class="box" data-aos="fade-right">
              <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                <center>
                  <img src="admin/assets/img/13.png" width="380" />
                </center>
              </div>
              <h2 style="color:rgb(43, 35, 32);">Spreeha: Emergency Food and Medicine</h2>

              <div class="float-left">
                <p><strong>Raised:</strong><small class="text-success"> ৳ 121,805</small></p>
                <p><strong>Goal:</strong><small class="text-danger"> ৳ 2,400,000</small></p>
              </div>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Donate Now</a>
              </div>
            </div>
          </div> -->


      </div>

      </div>
    </section>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>