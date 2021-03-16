<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <?php foreach ($listPosts as $post) { ?>
        <div class="post-preview">
          <a href="Post&<?= $post->getId() ?>" title="Post n°<?= $post->getId() ?>">
            <h2 class="post-title">
              <?= $post->getTitle() ?>
            </h2>
            <h3 class="post-subtitle">
              <?= $post->getChapo() ?>
            </h3>
            <p class="post-subtitle">
              <?= substr($post->getContent(), 0, 200) . " ..." ?>
            </p>
          </a>
          <p class="post-meta">Publié le 
            <?= $post->getFormatDate() ?>
          </p>
      </div>
      <hr>
      <?php } ?>
    </div>
  </div>
</div>
