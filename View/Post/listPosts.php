<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <?php foreach ($listPosts as $post) { ?>
        <div class="post-preview">
          <a href="Post&<?= htmlspecialchars($post->getId()) ?>" title="Post n°<?= htmlspecialchars($post->getId()) ?>">
            <h2 class="post-title">
              <?= htmlspecialchars($post->getTitle()) ?>
            </h2>
            <h3 class="post-subtitle">
              <?= htmlspecialchars($post->getChapo()) ?>
            </h3>
            <p class="post-subtitle">
              <?= substr(htmlspecialchars($post->getContent()), 0, 200) . " ..." ?>
            </p>
          </a>
          <p class="post-meta">Publié le
            <?= htmlspecialchars($post->getFormatDate()) ?>
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
            <a class="page-link" href="Posts&<?= $currentPage - 1 ?>">Previous</a>
          </li>
          <?php for($p=1;$p<=$nbrPage;$p++){ ?>
          <li class="page-item <?= ($currentPage == $p)?"active" : "" ?>">
            <a class="page-link" href="Posts&<?= $p ?>"><?= $p ?></a>
          </li>
          <?php } ?>
          <li class="page-item <?= (isset($currentPage) && $currentPage < $nbrPage) ? "" : "disabled" ?>">
            <a class="page-link" href="Posts&<?= $currentPage + 1 ?>">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>