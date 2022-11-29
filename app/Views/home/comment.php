<?php
echo $this->extend('layout/navbar');

echo $this->section('content');
?>

<main class="container-fluid">
    <div class="row container mx-auto w-100 d-flex jusitfy-content-center">
        <div class="col-12" style="height: 100vh;">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-1">
                            <img src="<?= base_url('assets/img/profile_photo/' . ($comments[0]->profile_image == null ? 'default-profile.png' : $comments[0]->profile_image)) ?>" class="rounded-circle bg-light" width="50rem" height="50rem" alt="">
                        </div>
                        <div class="col-11">
                            <span><b><?= $comments[0]->name ?></b></span>
                            <br>
                            <span><?= $comments[0]->email ?></span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-7 border-end">
                            <img src="<?= base_url('assets/img/post_image/' . $comments[0]->image) ?>" alt="">
                        </div>
                        <div class="col-5">
                            <?php
                            foreach ($comments as $c) {
                            ?>
                                <div class="row d-flex align-items-center my-2">
                                    <div class="col-2">
                                        <img src="<?= base_url('assets/img/profile_photo/' . ($c->profile_image == null ? 'default-profile.png' : $c->profile_image)) ?>" class="rounded-circle bg-light" width="50rem" height="50rem" alt="">
                                    </div>
                                    <div class="col-10">
                                        <span class="me-1"><b><?= $c->name ?></b></span>
                                        <span style="font-size: .8rem;"><?= $c->tanggal ?></span>
                                        <br>
                                        <span><?= $c->comment ?></span>
                                    </div>
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
                            <input type="hidden" name="id_post" value="<?= $comments[0]->id_post ?>">
                            <div class="col-10">
                                <input type="text" name="comment" class="form-control border-0" placeholder="Add a comment...">
                            </div>
                            <div class="col-2">
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