<?php
echo $this->extend('layout/navbar');

echo $this->section('content');
?>

<main class="container-fluid">
    <div class="row container mx-auto w-100 d-flex jusitfy-content-center">
        <div class="col-12" style="height: 100vh;">
            <div class="card my-3">
                <div class="card-header bg-white">
                    <div class="row">
                        <div class="col-1">
                            <img src="<?= base_url('assets/img/profile_photo/' . ($post->profile_image == null ? 'default-profile.png' : $post->profile_image)) ?>" class="rounded-circle bg-light" width="50rem" height="50rem" alt="">
                        </div>
                        <div class="col-11">
                            <span><b><?= $post->name ?></b></span>
                            <br>
                            <span><?= $post->email ?></span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-7 border-end">
                            <img src="<?= base_url('assets/img/post_image/' . $post->image) ?>" class="w-100" alt="">
                        </div>
                        <div class="col-5">
                            <?php
                            foreach ($comments as $c) {
                            ?>
                                <div class="row d-flex align-items-center my-2">
                                    <div class="col-2">
                                        <img src="<?= base_url('assets/img/profile_photo/' . ($c->profile_image == null ? 'default-profile.png' : $c->profile_image)) ?>" class="rounded-circle bg-light" width="50rem" height="50rem" alt="">
                                    </div>
                                    <div class="col-8">
                                        <span class="me-1"><b><?= $c->name ?></b></span>
                                        <span style="font-size: .8rem;"><?= date_format(date_create($c->tanggal), 'd M')  ?></span>
                                        <br>
                                        <span><?= $c->comment ?></span>
                                    </div>
                                    <?php
                                    if ($c->id_user == user_id()) {
                                    ?>
                                        <div class="col-2">
                                            <div class="dropdown">
                                                <button class="btn btn-sm " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                                    <form action="<?= base_url('post/edit_comment') ?>" method="post">
                                                        <input type="hidden" name="id" value="<?= $c->id_comment ?>">
                                                        <li><button class="dropdown-item" type="submit">Edit Comment</button></li>
                                                    </form>
                                                    <form action="<?= base_url('post/delete_comment') ?>" method="post">
                                                        <input type="hidden" name="id" value="<?= $c->id_comment ?>">
                                                        <li><button class="dropdown-item" type="submit">Delete Comment</button></li>
                                                    </form>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <hr>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <form action="<?= base_url('post/comment') ?>" method="post">
                        <div class="row">
                            <input type="hidden" name="id_post" value="<?= $post->id_post ?>">
                            <div class="col-10">
                                <input type="text" name="comment" class="form-control border-0" placeholder="Add a comment...">
                            </div>
                            <div class="col-2 text-end">
                                <button type="submit" class="btn btn-primary">Post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>


<?= $this->endSection() ?>