<div class="row">
    <div class="col-md-12 col-lg-8 col-sm-12">
        <div class="white-box">
            <?= isset($textNewPost)?filter_var($textNewPost) : "" ?>
            <h3 class="box-title mb-0">Liste des posts</h3>
            <div class="comment-center">




                <?php foreach ($listPosts as $post) { ?>
                    <div class="comment-body d-flex border-0">
                        <div class="user-img"> <img src="TemplateAdmin/plugins/images/users/arijit.jpg" alt="user" class="img-circle">
                        </div>
                        <div class="mail-contnet">
                            <h5>Damien Gobert</h5><span class="time"><?= filter_var($post->getFormatDate()) ?></span>
                            <br>
                            <div class="mb-3 mt-3">
                                Titre :<br><?= filter_var($post->getTitle()) ?>
                            </div>
                            <div class="mb-3 mt-3">
                                Chapo :<br><?= filter_var($post->getChapo()) ?>
                            </div>
                            <div class="mb-3 mt-3">
                                <span class="mail-desc"> Description :<br><?= filter_var($post->getContent()) ?></span>
                            </div>

                            <form action="Admin&deletePost" method="POST">
                                <input type="hidden" id="postId" name="postId" value="<?= filter_var($post->getId()) ?>" />
                                <button class="btn-rounded btn btn-default btn-outline" type="submit"><i class="ti-close text-danger m-r-5"></i> Suprimer</button>
                            </form>
                            <a href="Admin&updatePost&<?= filter_var($post->getId()) ?>"><button class="btn-rounded btn btn-default btn-outline"><i class="text-danger m-r-5"></i> Modifier</button></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?= (isset($currentPage) && $currentPage > 1) ? "" : "disabled" ?>">
                        <a class="page-link" href="Admin&Posts&<?= filter_var($currentPage - 1) ?>">Previous</a>
                    </li>
                    <?php for ($p = 1; $p <= $nbrPage; $p++) { ?>
                        <li class="page-item <?= ($currentPage == $p)?"active" : "" ?>">
                            <a class="page-link" href="Admin&Posts&<?= filter_var($p) ?>"><?= filter_var($p) ?></a>
                        </li>
                    <?php } ?>
                    <li class="page-item <?= (isset($currentPage) && $currentPage < $nbrPage) ? "" : "disabled" ?>">
                        <a class="page-link" href="Admin&Posts&<?= filter_var($currentPage + 1) ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-8 col-sm-12">
        <div class="white-box">
            <h3 class="box-title mb-0">Nouveau post</h3>
            <div class="comment-center">
                <div class="comment-body d-flex border-0">
                    <div class="mail-contnet">
                        <form action="Admin&Posts" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Titre" name="title" id="title">
                                <div class="input-group-append"><span class="input-group-text" aria-label="fin de mail">Le titre</span></div>

                                <input type="text" class="form-control" placeholder="Chapo" name="chapo" id="chapo">
                                <div class="input-group-append"><span class="input-group-text" aria-label="fin de mail">Le chapo</span></div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text" aria-label="description">Description</span></div>
                                <textarea class="form-control" placeholder="description" name="content" id="content" row="20" cols="100">
                                </textarea>
                            </div>
                            <button class="btn btn-primary" type="submit">Envoyer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>