<?php
  include 'functions.php';
  if (isLoggedIn()) {
    if (isAdmin()) {
      header('location: admin/main.php');
    }
    else {
      header('location: user/main.php');
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home Pets - About Us</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

  <!-- =======================================================
  * Template Name: Home Pets - v3.1.0
  * Template URL: https://bootstrapmade.com/Home Pets-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+1 5589 55488 55</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 9AM - 4PM</span></i>
      </div>

    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
      
      <a href="main.php" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="main.php">Home</a></li>
          <li><a class="nav-link scrollto" href="aboutUs.php">About Us</a></li>
          <li class="dropdown"><a href="#"><span>Adoption</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="adoptionProcess.php">Adoption Process</a></li>
              <li><a href="adoptionListing.php">Adoption Listing</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="donate.php">Donate</a></li>
          <li><a class="nav-link scrollto" href="contactUs.php">Contact Us</a></li>
              <li class='dropdown'><a href='#'><span>Profile</span> <i class='bi bi-chevron-down'></i></a>
              <ul>
                <li><a href='login.php'>Log In</a></li>
                <li><a href='register.php'>Register</a></li>
              </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="main.php">Home</a></li>
            <li>About Us</li>
          </ol>
        </div>

      </div>
    </section>
  </main>

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About Us</h2>
        <p>History</p>
      </div>
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <div class="fortxt">
            <p style="text-align: left;">The HP (home Pets ) organize by Mr.Steven since 2008.HP (Home Pets) is a non-profit animal shelter that helps the adoption of unwanted animals. However, the currect web system does not display pictures or information about the animals. The adoption process is also done manually at the shelter, which can be time wasting and troublesome. It causes less people to want to adopt animals.</p>
          </div>
        <div class="forimage">
          <p>
          <img src="assets/img/staff/president.jpeg" class="img-fluid">
          <p>Founder : Mr.Steven </p>
        </p>

          </div>
        </div>

      </div>
    </section>

    <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About Us</h2>
        <p>Vision</p>
      </div>
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center ">
          <p style="text-align: left;">Our vision is for all animals to live a life free of cruelty and suffering.</p>
          <p style="text-align: left;">That all animals be treated with kindness and respect.</p>
          <p style="text-align: left;">world where every captive wild animal is able to thrive and live a good life. </p>
        </div>

      </div>
    </section>
    </div>

  </section>


    <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About Us</h2>
        <p>Mission</p>
      </div>
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <ol>
            <li style="text-align: left;">our moral responsibility to protect and improve the lives of abused, abandoned, and homeless animals</li>
            <li style="text-align: left;">place animals in loving permanent homes</li>
            <li style="text-align: left;">improve the lives of companion animals in Malaysia and assist in humanely managing the population of dogs and cats via education and sterilization.</li> 
            <li style="text-align: left;">prevent and eliminate all cruelty to all animals whether arising through ignorance, neglect or deliberate cruelty. </li>

          </ol>
        </div>

      </div>
    </section>

  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About Us</h2>
        <p>Service</p>
      </div>
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center ">
          <p style="text-align: left;">HP accepts unwanted pets and stray animals – puppies, adult dogs, kittens and adult cats. We also have hundreds of animals waiting for a forever home.</p>
        </div>
      </div>
    </section>
    </div>
    
  </section>


  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About Us</h2>
        <p>Crew</p>
      </div>
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center ">
          <p style="text-align: left;">MISAKI MICHIBA</p>
          <p style="text-align: left;">LAM WEI JIAN</p>
          <p style="text-align: left;"><a href="https://help.edu.my/" target="_blank" style="color: blue;"> Request here as you join us as be volunteer</a></p>
        </div>
      </div>
    </section>
    </div>
    
  </section>



   

       
  </section><!-- End Contact Section -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Home Pets</h3>
              <p>
                41, Jalan 1/149j, Sri Petaling<br>
                57000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> homepets@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Website Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="main.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About Us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="adoptionProcess.php">Adoption Process</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="adoptionListing.php">Adoption Listing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="donate.php">Donate</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contactUs.php">Contact Us</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>
    
    <!-- dor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>