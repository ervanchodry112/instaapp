<?php
echo $this->extend('layout/navbar');

echo $this->section('content');
?>

<main class="container-fluid">
    <div class="row container mx-auto w-50 d-flex jusitfy-content-center">
        <div class="col-12 " style="height: 100vh;">
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
                            <button class="col-4 btn btn-white">
                                <i class="bi bi-heart me-1"></i>
                                <span>Like</span>
                            </button>
                            <button class="col-4 btn btn-white">
                                <i class="bi bi-chat-left me-1"></i>
                                <span>Comment</span>
                            </button>
                            <div class="dropup col-4">
                                <button class="btn btn-white dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <!-- <i class="bi bi-three-dots-vertical me-1"></i> -->
                                    <span>Options</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <form action="edit_post" method="post">

                                        <li><a class="dropdown-item" href="<?= base_url('edit_post/') ?>">Edit Post</a></li>
                                    </form>
                                    <li><a class="dropdown-item" href="#">Action two</a></li>
                                    <li><a class="dropdown-item" href="#">Action three</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            <?php
            }
            ?>
            <div class="div" style="height: 100vh;"></div>
        </div>
    </div>
</main>


<?= $this->endSection() ?>