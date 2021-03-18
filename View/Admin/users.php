<div class="row">
    <div class="col-md-12 col-lg-8 col-sm-12">
        <div class="white-box">
            <h3 class="box-title mb-0">Utilisateurs enregistrés</h3>
            <div class="comment-center">

                <?php foreach ($listUsers as $oneUser) { ?>
                    <div class="comment-body d-flex border-0">
                        <div class="mail-contnet">
                            <h5><?= htmlspecialchars($oneUser->getMail()) ?></h5><span class="time"></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
