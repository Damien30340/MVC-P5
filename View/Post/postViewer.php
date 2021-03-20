  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/post-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
          <div class="row">
              <div class="col-lg-8 col-md-10 mx-auto">
                  <div class="post-heading">
                      <h1><?= filter_var($post->getTitle()) ?></h1>
                      <h2 class="subheading"><?= filter_var($post->getChapo()) ?></h2>
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
                  <p><?= filter_var($post->getContent()) ?></p>

                  <p><?= filter_var($post->getFormatDate()) ?></p>
              </div>
          </div>
      </div>
  </article>

  <hr>

  <div class="container">
      <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
              <p>
                  <h2 class="badge badge-pill badge-secondary">
                      Commentaires <span class="badge badge-light"><?= filter_var($nbrComment) ?></span>
                  </h2>
              </p>
              <?php foreach ($listComment as $comment) { ?>
                  <div class="post-subtitle">
                      <p>
                          <?= filter_var($comment->getDescription()) ?>
                      </p>
                      <p class="post-meta">
                          <?= filter_var($comment->getFormatDate()) ?>
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