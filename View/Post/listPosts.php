<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <?php foreach ($listPosts as $post) { ?>
        <div class="post-preview">
          <a href="Post&<?= filter_var($post->getId()) ?>" title="Post n°<?= filter_var($post->getId()) ?>">
            <h2 class="post-title">
              <?= filter_var($post->getTitle()) ?>
            </h2>
            <h3 class="post-subtitle">
              <?= filter_var($post->getChapo()) ?>
            </h3>
            <p class="post-subtitle">
              <?= filter_var($post->getShortContent()) . " ..." ?>
            </p>
          </a>
          <p class="post-meta">
            <?= filter_var($post->getFormatDate()) ?><br>
            <?= ($post->getdateUpdate() === null) ? "" : filter_var($post->getFormatDateUpdate()) ?>
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
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item <?= (isset($currentPage) && $currentPage > 1) ? "" : "disabled" ?>">
            <a class="page-link" href="Posts&<?= filter_var($currentPage - 1) ?>">Previous</a>
          </li>
          <?php for ($p = 1; $p <= $nbrPage; $p++) { ?>
            <li class="page-item <?= ($currentPage == $p) ? "active" : "" ?>">
              <a class="page-link" href="Posts&<?= filter_var($p) ?>"><?= filter_var($p) ?></a>
            </li>
          <?php } ?>
          <li class="page-item <?= (isset($currentPage) && $currentPage < $nbrPage) ? "" : "disabled" ?>">
            <a class="page-link" href="Posts&<?= filter_var($currentPage + 1) ?>">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>