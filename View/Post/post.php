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
                  <p><?= is_null($post->getdateUpdate()) ? "" : $post->getFormatDateUpdate() ?></p>
                  <p><?= $post->getContent() ?></p>

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
                  Commentaires <span class="badge badge-light"><?= $nbrComment ?></span>
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
              <form name="comment" action="Post&<?= filter_var($post->getId()) ?>" method="post">
                  <div class="input-group mb-3">
                      <input type="hidden" value="<?= filter_var($post->getId()) ?>" name="idPost" id="idPost">
                      <input type="hidden" value="<?= filter_var($profil->getMail()) ?>" name="mail" id="mail">
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