                <!-- ============================================================== -->
                <!-- Recent Comments -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- .col -->
                    <div class="col-md-12 col-lg-8 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title mb-0">Commentaires en attente de validations :</h3>
                            <div class="comment-center">
                                <?php foreach ($listCommentsNoValid as $comment) { ?>
                                    <div class="comment-body d-flex">
                                        <div class="user-img"> <img src="TemplateAdmin/plugins/images/users/pawandeep.jpg" alt="user" class="img-circle">
                                        </div>
                                        <div class="mail-contnet">
                                            <h5><?php echo $comment->getAuthor() ?></h5><span class="time"><?php echo $comment->getFormatDate() ?></span>
                                            <br>
                                            <div class="mb-3 mt-3">
                                                <span class="mail-desc"><?php echo $comment->getDescription() ?> </span>
                                            </div>
                                            <form action="Admin&acceptComment" method="POST">
                                                <input type="hidden" id="commentId" name="commentId" value="<?php echo $comment->getId() ?>" />
                                                <button class="btn-rounded btn btn-default btn-outline" type="submit"><i class="ti-check text-success m-r-5"></i> Accepter</button>
                                            </form>
                                            <br>
                                            <form action="Admin&deleteComment" method="POST">
                                                <input type="hidden" id="commentId" name="commentId" value="<?php echo $comment->getId() ?>" />
                                                <button class="btn-rounded btn btn-default btn-outline" type="submit"><i class="ti-close text-danger m-r-5"></i> Rejeter</button>
                                            </form>
                                        </div>
                                    </div>
                                <?php } ?>
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
                                                    <span class="text-dark text-muted"><?php echo $user->getMail() ?></span>
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
                                            <h5>Damien Gobert</h5><span class="time"><?php echo $post->getFormatDate() ?></span>
                                            <br>
                                            <div class="mb-3 mt-3">
                                                Titre :<br><?php echo $post->getTitle() ?>
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <span class="mail-desc"> Description :<br><?php echo $post->getContent() ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
