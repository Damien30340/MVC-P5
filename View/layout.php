<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blog professionel - Damien Gobert</title>
  <meta content="CV, blog professionel Damien Gobert, developpeur d'applications html, css, php, js, symfony" name="description">
  <meta content="Developpeur, freelance, CV, Damien Gobert" name="keywords">
  <meta name="author" content="contact@damiengobert.fr">

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
  <?= isset($cssContent) ? $cssContent : null ?>

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
        <a href="https://github.com/Damien30340/" target=_blank class="github"><i class="bx bxl-github"></i></a>
        <a href="https://www.linkedin.com/in/damien-gobert-4b4381113/" target=_blank class="linkedin"><i class="bx bxl-linkedin"></i></a>
    <a href="Public/media/CV Dev symphony.pdf" target=_blank class="download"><i class="bx bx-download"></i></a>
      </div>
    </div>

    <nav class="nav-menu">
      <ul>
      <li class="active"><a href="/MVC-p5"><i class="bx bx-home"></i> <span>Accueil</span></a></li>
      <li><a href="#about"><i class="bx bx-user"></i> <span>A propos</span></a></li>
      <li><a href="#resume"><i class="bx bx-file-blank"></i> <span>Résumé</span></a></li>
      <li><a href="#portfolio"><i class="bx bx-book-content"></i>Créations</a></li>
      <li><a href="#contact"><i class="bx bx-envelope"></i>Contact</a></li>
      <li><a href="Posts&1"><i class="bx bx-news"></i>Blog</a></li>
      <li><a href="Contact" target=_blank><i class="bx bxs-envelope"></i>Contact</a></li>
      </ul>
    </nav><!-- .nav-menu -->
    <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  </div>
</header>

<!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
  <div class="hero-container" data-aos="fade-in">
    <h1>Damien Gobert</h1>
    <p>Développeur <span class="typed" data-typed-items="PHP Symfony-Html-Css, Js-Sql-Jquery-Ajax, Expert CMS(Wordpress - Prestashop)"></span></p>
  </div>
</section>

<!-- End Hero -->
<main id="main">
        <?= $content ?>
</main>
<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; <?php if (in_array('ADM', $tab[1])) { ?><a href="Admin">Copyright 2021</a> <?php } else { ?>Copyright 2021<?php } ?>
      </div>
      <div class="credits">
        Fait par <a href="https://damiengobert.fr/">Damien Gobert</a>
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
  <?= isset($jsContent) ? $jsContent : null ?>

    </body>
</html>
