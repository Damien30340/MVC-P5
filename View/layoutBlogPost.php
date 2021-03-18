<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta content="CV, blog professionel Damien Gobert, developpeur d'applications html, css, php, js, symfony" name="description">
  <meta content="Developpeur, freelance, CV, Damien Gobert" name="keywords">
  <meta name="author" content="contact@damiengobert.fr">

  <title>Blog professionel - Damien Gobert</title>

  <!-- Bootstrap core CSS -->
  <link href="TemplateBlog/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="TemplateBlog/css/clean-blog.min.css" rel="stylesheet">
  <?= (isset($cssContent) ? $cssContent : null) ?>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="http://localhost/MVC-p5/">Damien Gobert</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/MVC-p5/">Accueil</a>
          </li>
          <li class="nav-item">
           <a class="nav-link" href="Posts&1">Blog</a>
          </li>
          <li class="nav-item">
          <?php if($_SESSION['user']->getId() == 999 ) { ?><a class="nav-link" href="Login">Se connecter</a> <?php 
          } else {?><a class="nav-link" href="Login">Se deconnecter</a><?php 
          } ?>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Me contacter</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>



                                            

        <?= $content ?>



  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Damien Gobert 2021</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="TemplateBlog/vendor/jquery/jquery.min.js"></script>
  <script src="TemplateBlog/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="TemplateBlog/js/clean-blog.min.js"></script>
  <?= (isset($jsContent) ? $jsContent : null) ?>

</body>

</html>
