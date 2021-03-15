<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <?php foreach ($listPosts as $post) { ?>
        <div class="post-preview">
          <a href="Post&<?php echo $post->getId() ?>" title="Post n°<?php echo $post->getId() ?>">
            <h2 class="post-title">
              <?php echo $post->getTitle() ?>
            </h2>
            <p class="post-subtitle">
              <?php echo substr($post->getContent(), 0, 200) . " ..." ?>
            </p>
          </a>
          <p class="post-meta">Publié le 
            <?php echo $post->getFormatDate() ?>
          </p>
      </div>
      <hr>
      <?php } ?>
    </div>
  </div>
</div>
