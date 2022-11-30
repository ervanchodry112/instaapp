<?php
echo $this->extend('layout/navbar');

echo $this->section('content');
?>

<main class="container-fluid">
    <div class="row container mx-auto w-50 d-flex jusitfy-content-center">
        <div class="col-12 d-flex align-items-center justify-content-center" style="height: 75vh;">
            <div class="card w-100 text-center" style="height: auto;">
                <div class="card-body">
                    <div class="h3 mb-2 card-title">Edit Post</div>
                    <hr>
                    <form action="<?= base_url('post/save_post') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id_post" value="<?= $post->id_post ?>">
                        <div class="row mb-2 text-start">
                            <img src="<?= base_url('assets/img/post_image/' . $post->image) ?>" class="w-50 mx-auto" alt="Post Image">
                        </div>
                        <div class="row mb-3 text-start">
                            <label for="caption" class="col-form-label col-2">Caption</label>
                            <div class="col-10">
                                <textarea name="caption" id="caption" class="form-control"><?= $post->caption ?></textarea>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="col-3 text-end ">
                                <a href="<?= base_url('home') ?>" class="btn btn-secondary btn-sm w-100">CANCEL</a>
                            </div>
                            <div class="col-3 text-end ">
                                <button type="submit" class="btn btn-primary btn-sm w-100">SAVE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="div" style="height: 100vh;"></div>
        </div>
    </div>
</main>

<?= $this->endSection() ?>