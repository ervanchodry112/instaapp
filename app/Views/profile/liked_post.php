<?php
echo $this->extend('layout/navbar');

echo $this->section('content');
?>

<main class="container-fluid">
    <div class="row container mx-auto w-50 d-flex jusitfy-content-center">
        <div class="col-12" style="height: 100vh;">
            <div class="row">
                <?php
                foreach ($posts as $p) {
                ?>
                    <div class="col-6">

                        <div class="card my-2">
                            <div class="card-header bg-white border-bottom-0 mt-2">
                                <div class=" row">
                                    <div class="col-2 me-3">
                                        <img src="<?= base_url('assets/img/profile_photo/' . ($p->profile_image == null ? 'default-profile.png' : $p->profile_image)) ?>" class="rounded-circle bg-light" width="50rem" height="50rem" alt="">
                                    </div>
                                    <div class="col-9">
                                        <span><b><?= $p->name ?></b></span>
                                        <br>
                                        <span><?= $p->tanggal ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mt-2 mb-0">
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
                                        if ($p->is_liked != null) {
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
                                    <button class="col btn btn-white">
                                        <i class="bi bi-chat-left me-1"></i>
                                        <span>Comment</span>
                                    </button>
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
                            </div>

                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- <div class="div" style="height: 100vh;"></div> -->
            </div>
        </div>
    </div>
</main>


<?= $this->endSection() ?>