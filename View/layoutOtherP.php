<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blog professionel - Damien Gobert</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicon -->
  <link href="TemplateUser/assets/img/favicon.png" rel="icon">
  <link href="TemplateUser/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="TemplateUser/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="TemplateUser/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="TemplateUser/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="TemplateUser/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="TemplateUser/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="TemplateUser/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="TemplateUser/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio - v2.0.2
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

	  <!-- ======= Mobile nav toggle button ======= -->
	  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

<!-- ======= Header ======= -->
<header id="header">
  <div class="d-flex flex-column">

	<div class="profile">
	  <img src="TemplateUser/assets/img/profile-img.jpg" alt="" class="img-fluid rounded-circle">
	  <h1 class="text-light"><a href="/MVC-p5">Damien Gobert</a></h1>
	  <div class="social-links mt-3 text-center">
		<a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
		<a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
		<a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
	  </div>
	</div>

	<nav class="nav-menu">
	  <ul>
		  <li class="active"><a href="/MVC-p5"><i class="bx bx-home"></i> <span>Accueil</span></a></li>
	  </ul>
	</nav><!-- .nav-menu -->
	<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  </div>
</header>

<!-- End Header -->

<!-- ======= Hero Section ======= -->
                                                <!--

<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
  <div class="hero-container" data-aos="fade-in">
	<h1>Damien Gobert</h1>
	<p>Je suis <span class="typed" data-typed-items="Développeur, Expert CMS(Wordpress - Prestashop)"></span></p>
  </div>
</section>

                                                -->
<!-- End Hero -->
<main id="main">
		<?= $content ?>
</main>
<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>CV</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
        Fait par <a href="https://damiengobert.fr/">damiengobert.fr</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->

  <script src="https://www.google.com/recaptcha/api.js"></script>


  <script src="TemplateUser/assets/vendor/jquery/jquery.min.js"></script>
  <script src="TemplateUser/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="TemplateUser/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="TemplateUser/assets/vendor/php-email-form/validate.js"></script>
  <script src="TemplateUser/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="TemplateUser/assets/vendor/counterup/counterup.min.js"></script>
  <script src="TemplateUser/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="TemplateUser/assets/vendor/venobox/venobox.min.js"></script>
  <script src="TemplateUser/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="TemplateUser/assets/vendor/typed.js/typed.min.js"></script>
  <script src="TemplateUser/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="TemplateUser/assets/js/main.js"></script>

    </body>
</html>