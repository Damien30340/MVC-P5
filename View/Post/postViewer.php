  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/post-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
          <div class="row">
              <div class="col-lg-8 col-md-10 mx-auto">
                  <div class="post-heading">
                      <h1><?php echo $post->getTitle() ?></h1>
                      <h2 class="subheading"></h2>
                  </div>
              </div>
          </div>
      </div>
  </header>

  <!-- Post Content -->
  <article>
      <div class="container">
          <div class="row">
              <div class="col-lg-8 col-md-10 mx-auto">
                  <p><?php echo $post->getContent() ?></p>

                  <p>Publié le : <?php echo $post->getCreation_date() ?></p>
              </div>
          </div>
      </div>
  </article>

  <hr>

  <div class="container">
      <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
              <p>
                  Commentaires :
              </p>
              <?php foreach ($listComment as $comment) { ?>
                  <div class="post-subtitle">
                      <h4 class="post-title">
                          <?php echo $comment->getAuthor() ?>
                      </h4>
                      <p>
                          <?php echo $comment->getDescription() ?>
                      </p>
                      <p class="post-meta">Publié le
                          <?php echo $comment->getFormatDate() ?>
                      </p>
                  </div>
                  <hr>
              <?php } ?>
          </div>
      </div>
  </div>
  <div class="container">
      <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
              <p>Merci de vous connecter pour laisser un commentaire</p>
              <a class="btn btn-primary" href="Login">Se connecter</a>
          </div>
      </div>
  </div>
