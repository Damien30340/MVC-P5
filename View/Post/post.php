  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/post-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
          <div class="row">
              <div class="col-lg-8 col-md-10 mx-auto">
                  <div class="post-heading">
                      <h1><?= $post->getTitle() ?></h1>
                      <h2 class="subheading"><?= $post->getChapo() ?></h2>
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
                  <p><?= $post->getContent() ?></p>

                  <p>Publié le : <?= $post->getCreation_date() ?></p>
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
                          <?= $comment->getAuthor() ?>
                      </h4>
                      <p>
                          <?= $comment->getDescription() ?>
                      </p>
                      <p class="post-meta">Publié le
                          <?= $comment->getFormatDate() ?>
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
              <form name="comment" action="Post&<?= $post->getId() ?>" method="post">
                  <div class="input-group mb-3">
                      <input type="hidden" value="<?= $idPost ?>" name="idPost" id="idPost">
                      <input type="hidden" value="<?= (isset($_SESSION['user']) ? $_SESSION['user']->getMail() : null) ?>" name="mail" id="mail">
                      <input type="text" class="form-control" placeholder="Votre pseudo" name="author" id="author">
                      <div class="input-group-append"><span class="input-group-text" aria-label="pseudo">Pseudo</span></div>
                  </div>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend"><span class="input-group-text" aria-label="commentaire">commentaire</span></div>
                      <input type="text" class="form-control" placeholder="Votre commentaire" name="description" id="description">
                  </div>
                  <button class="btn btn-primary" type="submit">Envoyer</button>
              </form>
          </div>
      </div>
  </div>
  </div>