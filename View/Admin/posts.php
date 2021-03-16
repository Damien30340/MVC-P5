<div class="row">
    <div class="col-md-12 col-lg-8 col-sm-12">
        <div class="white-box">
            <?php echo (isset($textNewPost) ? $textNewPost : "") ?>
            <h3 class="box-title mb-0">Liste des posts</h3>
            <div class="comment-center">




                <?php foreach ($listPosts as $post) { ?>
                    <div class="comment-body d-flex border-0">
                        <div class="user-img"> <img src="TemplateAdmin/plugins/images/users/arijit.jpg" alt="user" class="img-circle">
                        </div>
                        <div class="mail-contnet">
                            <h5>Damien Gobert</h5><span class="time"><?= $post->getFormatDate() ?></span>
                            <br>
                            <div class="mb-3 mt-3">
                                Titre :<br><?= $post->getTitle() ?>
                            </div>
                            <div class="mb-3 mt-3">
                                Chapo :<br><?= $post->getChapo() ?>
                            </div>
                            <div class="mb-3 mt-3">
                                <span class="mail-desc"> Description :<br><?= $post->getContent() ?></span>
                            </div>

                            <form action="Admin&deletePost" method="POST">
                                <input type="hidden" id="postId" name="postId" value="<?= $post->getId() ?>" />
                                <button class="btn-rounded btn btn-default btn-outline" type="submit"><i class="ti-close text-danger m-r-5"></i> Suprimer</button>
                            </form>
                                <a href="Admin&updatePost&<?= $post->getId() ?>"><button class="btn-rounded btn btn-default btn-outline"><i class="text-danger m-r-5"></i> Modifier</button></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
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
