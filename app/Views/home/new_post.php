<?php
echo $this->extend('layout/navbar');

echo $this->section('content');
?>

<main class="container-fluid">
    <div class="row container mx-auto w-50 d-flex jusitfy-content-center">
        <div class="col-12 d-flex align-items-center justify-content-center" style="height: 75vh;">
            <div class="card w-100 text-center" style="height: auto;">
                <div class="card-body">
                    <div class="h3 mb-2 card-title">Create New Post</div>
                    <hr>
                    <form action="<?= base_url('post/create_post') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="row mb-2 text-start">
                            <label for="image" class="col-form-label col-2">Photo</label>
                            <div class="col-10">
                                <input type="file" name="image" id="image" class="form-control <?= ($validation->hasError('image') ? 'is-invalid' : '') ?>" value="<?= old('image') ?>" accept="image/*">
                            </div>
                            <div class="invalid-feedback">
                                <?= $validation->getError('image') ?>
                            </div>
                        </div>
                        <div class="row mb-3 text-start">
                            <label for="caption" class="col-form-label col-2">Caption</label>
                            <div class="col-10">
                                <textarea name="caption" id="caption " class="form-control <?= ($validation->hasError('caption') ? 'is-invalid' : '') ?>" required></textarea>
                            </div>
                            <div class="invalid-feedback">
                                <?= $validation->getError('caption') ?>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="col-3 text-end ">
                                <a href="<?= base_url('home') ?>" class="btn btn-secondary btn-sm w-100">CANCEL</a>
                            </div>
                            <div class="col-3 text-end ">
                                <button type="submit" class="btn btn-primary btn-sm w-100">POST</button>
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