<div class="row">
    <div class="col-md-12 col-lg-8 col-sm-12">
        <div class="comment-body d-flex border-0">
            <div class="mail-contnet">
                <h5>Damien Gobert</h5><span class="time"><?php echo $post->getCreation_date() ?></span>
                <br>
                <div class="mb-3 mt-3">
                    Titre :<br><?php echo $post->getTitle() ?>
                </div>
                <div class="mb-3 mt-3">
                    <span class="mail-desc"> Description :<br><?php echo $post->getContent() ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-8 col-sm-12">
        <div class="white-box">
            <h3 class="box-title mb-0">Modifier le post</h3>
            <div class="comment-center">
                <div class="comment-body d-flex border-0">
                    <div class="mail-contnet">
                        <form action="Admin&updatePost&<?= $post->getId() ?>" method="post">
                            <div class="input-group mb-3">
                                <input type="hidden" value="<?= $post->getId() ?>" name="postId" id="postId">
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