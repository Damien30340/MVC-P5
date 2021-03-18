<div class="row">
    <div class="col-md-12 col-lg-8 col-sm-12">
        <div class="white-box">
            <h3 class="box-title mb-0">Liste des commentaires</h3>
            <div class="comment-center">




                <?php foreach ($listComments as $comment) { ?>
                    <div class="comment-body d-flex border-0">
                        <div class="user-img"> <img src="TemplateAdmin/plugins/images/users/arijit.jpg" alt="user" class="img-circle">
                        </div>
                        <div class="mail-contnet">
                            <h5><?= htmlspecialchars($comment->getAuthor()) ?></h5><span class="time"><?= htmlspecialchars($comment->getFormatDate()) ?></span>
                            <br>
                            <div class="mb-3 mt-3">
                                <span class="mail-desc"> Description :<br><?= htmlspecialchars($comment->getDescription()) ?></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
