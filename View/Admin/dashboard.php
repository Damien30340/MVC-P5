                <!-- ============================================================== -->
                <!-- Recent Comments -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- .col -->
                    <div class="col-md-12 col-lg-8 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title mb-0">Commentaires en attente de validations :</h3>
                            <div class="comment-center">
                                <?php if(!empty($listCommentsNoValid)){ foreach ($listCommentsNoValid as $comment) { ?>
                                    <div class="comment-body d-flex">
                                        <div class="user-img"> <img src="TemplateAdmin/plugins/images/users/pawandeep.jpg" alt="user" class="img-circle">
                                        </div>
                                        <div class="mail-contnet">
                                            <h5><?= filter_var($comment->getAuthor()) ?></h5><span class="time"><?= filter_var($comment->getFormatDate()) ?></span>
                                            <br>
                                            <div class="mb-3 mt-3">
                                                <span class="mail-desc"><?= filter_var($comment->getDescription()) ?> </span>
                                            </div>
                                            <form action="Admin&acceptComment" method="POST">
                                                <input type="hidden" id="commentId" name="commentId" value="<?= filter_var($comment->getId()) ?>" />
                                                <button class="btn-rounded btn btn-default btn-outline" type="submit"><i class="ti-check text-success m-r-5"></i> Accepter</button>
                                            </form>
                                            <br>
                                            <form action="Admin&deleteComment" method="POST">
                                                <input type="hidden" id="commentId" name="commentId" value="<?= filter_var($comment->getId()) ?>" />
                                                <button class="btn-rounded btn btn-default btn-outline" type="submit"><i class="ti-close text-danger m-r-5"></i> Rejeter</button>
                                            </form>
                                        </div>
                                    </div>
                                <?php } } else { ?><div class="comment-body d-flex"><div clas="mb-3 mt-3"><?= filter_var($noComment) ?></div></div><?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8 col-sm-12">
                        <div class="card">
                            <div class="card-heading">
                                UTILISATEURS
                            </div>
                            <div class="card-body">
                                <ul class="chatonline">
                                    <?php foreach ($listUsers as $user) { ?>
                                        <li>
                                            <a href="javascript:void(0)" class="d-flex align-items-center"><img src="TemplateAdmin/plugins/images/users/varun.jpg" alt="user-img" class="img-circle">
                                                <div class="ml-2">
                                                    <span class="text-dark text-muted"><?= filter_var($user->getMail()) ?></span>
                                                </div>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title mb-0">POSTS</h3>
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
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
