<?php 
	include'../functions.php';
  if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
  }
  if (!isAdmin()) {
    $_SESSION['msg'] = "You do not have access";
    header('location: ../user/main.php');
  }

  $id = intval($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home Pets - Edit Animal Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.ico" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

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
      
      <a href="main.php" class="logo me-auto me-lg-0"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="main.php">Home</a></li>
          <li><a class="nav-link scrollto" href="users.php">Users</a></li>
          <li class="dropdown"><a href="#"><span>Adoption</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="adoptionListing.php">Adoption Listing</a></li>
              <li><a href="adoptionSubmission.php">Adoption Form</a></li>
            </ul>
              <li class='dropdown'><a href='#'><span><?php echo $_SESSION['user']['username']; ?></span><i class='bi bi-chevron-down'></i></a>
              <ul>
                <li><a href='../logout.php'>Log Out</a></li>
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
            <li>Edit Animal Profile</li>
          </ol>
        </div>

      </div>
    </section>
  </main>

  <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

      <?php 
            $conn = mysqli_connect("localhost", "root", "", "hpusers");
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            $sql = ("SELECT * FROM animal WHERE id = $id");  
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {

                echo "<h1>Edit " . $row["animalName"] . "'s Profile</h1>
        <img src='../assets/img/animals/" . $row["animalName"] . "." . $row["imgType"] . "' height = '125px' width = '125px' >
        <br><br>

        <form action='editAnimalProfile.php' method='post' data-aos='fade-up' data-aos-delay='100'>
            <div class='col-lg-4 col-md-6 form-group mt-3 mt-md-0'>
              <select class='form-select' name='animalID'>
                <option selected value='" . $row["id"] . "'>" . $row["id"] . "</option>
              </select>
            </div>
            <br>
          <div class='col-lg-4 col-md-6 form-group mt-3 mt-md-0'>
            <p>Name : " . $row["animalName"] . "</p>
            <input type='text' name='newAnimalName' class='form-control' value='" . $row["animalName"] . "'>
          </div>
          <br>
          <div class='col-lg-4 col-md-6 form-group mt-3 mt-md-0'>
            <p>Animal Type : " . $row["animalType"] . "</p>
            <select class='form-select' name='newAnimalType'>
              <option selected value='" . $row["animalType"] . "'>" . $row["animalType"] . "</option>
              <option value='Dog'>Dog</option>
              <option value='Cat'>Cat</option>
              <option value='Other'>Other</option>
            </select>
          </div>
          <br>
          <div class='col-lg-4 col-md-6 form-group mt-3 mt-md-0'>
            <p>Gender : " . $row["gender"] . "</p>
            <select class='form-select' name='newGender'>
              <option selected value='" . $row["gender"] . "'>" . $row["gender"] . "</option>
              <option value='Female'>Female</option>
              <option value='Male'>Male</option>
            </select>
          </div>
          <br>
          <div class='col-lg-4 col-md-6 form-group mt-3 mt-md-0'>
            <p>Age : " . $row["age"] . "</p>
            <input type='text' name='newAge' class='form-control' value='" . $row["age"] . "'>
          </div>
          <br>
          <div class='col-lg-4 col-md-6 form-group mt-3 mt-md-0'>
            <p>Colour : " . $row["colour"] . "</p>
            <input type='text' name='newColour' class='form-control' value='" . $row["colour"] . "'>
          </div>
          <br>
          <div class='col-lg-4 col-md-6 form-group mt-3 mt-md-0'>
            <p>Vaccination Status : " . $row["vaccinated"] . "</p>
            <select class='form-select' name='newVaccinated'>
              <option selected value='" . $row["vaccinated"] . "'>" . $row["vaccinated"] . "</option>
              <option value='Yes'>Yes</option>
              <option value='No'>No</option>
            </select>
          </div>
          <br>
          <div class='col-lg-4 col-md-6 form-group mt-3 mt-md-0'>
            <p>Dewormed Status : " . $row["dewormed"] . "</p>
            <select class='form-select' name='newDewormed'>
              <option selected value='" . $row["dewormed"] . "'>" . $row["dewormed"] . "</option>
              <option value='Yes'>Yes</option>
              <option value='No'>No</option>
            </select>
          </div>
          <br>
          <div class='col-lg-4 col-md-6 form-group mt-3 mt-md-0'>
            <p>Neutered Status : " . $row["neutered"] . "</p>
            <select class='form-select' name='newNeutered'>
              <option selected value='" . $row["neutered"] . "'>" . $row["neutered"] . "</option>
              <option value='Yes'>Yes</option>
              <option value='No'>No</option>
            </select>
          </div>
          <br>
          <div class='col-lg-4 col-md-6 form-group mt-3 mt-md-0'>
            <p>Condition : " . $row["animalCondition"] . "</p>
            <input type='text' name='newAnimalCondition' class='form-control' value='" . $row["animalCondition"] . "'>
          </div>
          <br>
          <button type='submit' name='editAnimalProfile'>Submit</button>
        </form>

        </div>";
            }
            } 
            else {
              echo "0 results"; 
            }
            $conn->close();
        ?>

      </div>
</section><!-- End login Section -->

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
              <li><i class="bx bx-chevron-right"></i> <a href="main.php">Admin</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="adoptionListing.php">Adoption Listing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="adoptionListing.php">Adoption Form</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Home Pets</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/Home Pets-restaurant-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>