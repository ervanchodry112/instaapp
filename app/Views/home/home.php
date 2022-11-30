<?php
echo $this->extend('layout/navbar');

echo $this->section('content');
?>

<main class="container-fluid">
    <div class="row container mx-auto w-50 d-flex jusitfy-content-center">
        <div class="col-12" style="height: 100vh;">
            <div class="mt-3">
                <?php
                if (session('error')) {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                } else if (session('success')) {
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
                echo '</div>';

                foreach ($posts as $p) {
                ?>

                    <div class="card my-2">
                        <div class="card-header bg-white border-bottom-0 mt-2">
                            <div class=" row">
                                <div class="col-1 me-3">
                                    <!-- TODO: Change profile  -->
                                    <img src="<?= base_url('assets/img/profile_photo/' . ($p->profile_image == null ? 'default-profile.png' : $p->profile_image)) ?>" class="rounded-circle bg-light" width="50rem" height="50rem" alt="">

                                </div>
                                <div class="col-4">
                                    <span><b><?= $p->name ?></b></span>
                                    <br>
                                    <span><?= $p->tanggal ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-4 mb-0">
                                    <?= $p->caption ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- TODO: Change image with db -->
                            <img src="<?= base_url('/assets/img/post_image/' . $p->image) ?>" class="mx-auto w-100" alt="">

                        </div>
                        <div class="card-footer bg-white">
                            <div class="row">
                                <a href="<?= base_url('post/like/' . $p->id_post) ?>" class="col btn btn-white">
                                    <?php
                                    if ($p->is_liked != null && $p->likes_user == user_id()) {
                                    ?>
                                        <i class="bi bi-heart-fill me-1"></i>
                                    <?php
                                    } else {
                                    ?>
                                        <i class="bi bi-heart me-1"></i>
                                    <?php
                                    }
                                    ?>
                                    <span>Like</span>
                                </a>
                                <a class="col btn btn-white" href="<?= base_url('post/comment_post/' . $p->id_post) ?>">
                                    <i class="bi bi-chat-left me-1"></i>
                                    <span>Comment</span>
                                </a>
                                <?php
                                if ($p->id_user == user_id()) {
                                ?>
                                    <div class="dropup col">
                                        <button class="btn btn-white dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            <!-- <i class="bi bi-three-dots-vertical me-1"></i> -->
                                            <span>Options</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <form action="<?= base_url('post/edit_post') ?>" method="post">
                                                <input type="hidden" name="id" value="<?= $p->id_post ?>">
                                                <li><button class="dropdown-item" type="submit">Edit Post</button></li>
                                            </form>
                                            <form action="<?= base_url('post/delete_post') ?>" method="post">
                                                <input type="hidden" name="id" value="<?= $p->id_post ?>">
                                                <li><button class="dropdown-item" type="submit">Delete Post</button></li>
                                            </form>
                                            <!-- Create Delete Post With Form -->
                                        </ul>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <form action="<?= base_url('post/comment') ?>" method="post">
                                <div class="row py-2" id="comment_field">
                                    <input type="hidden" name="id_post" value="<?= $p->id_post ?>">
                                    <hr>
                                    <div class="col-9">
                                        <input type="text" name="comment" id="comment" class="form-control border-0" placeholder="Write your comment..">
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-white">Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                <?php
                }
                ?>
                <!-- <div class="div" style="height: 100vh;"></div> -->
            </div>
        </div>
</main>



<?= $this->endSection() ?>