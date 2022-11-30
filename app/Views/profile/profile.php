<?php
echo $this->extend('layout/navbar');

echo $this->section('content');
?>

<main class="container-fluid">
    <div class="row container mx-auto w-100 d-flex jusitfy-content-center">
        <div class="col-12" style="height: 100vh;">
            <div class="row mt-5">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <img class="w-100" src="<?= base_url('assets/img/profile_photo/' . ($profile->profile_image == null ? 'default-profile.png' : $profile->profile_image)) ?>" alt="Profile Photo">
                        </div>
                        <div class="card-footer">
                            <button type="button" id="fotoButton" class="btn border-primary text-primary w-100" data-bs-toggle="modal" data-bs-target="#fotoModal">Edit Foto</button>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="h3">Profile</div>
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <div class="h5">Name</div>
                                </div>
                                <div class="col-9">
                                    <div class="h5">: <?= $profile->name ?></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="h5">Username</div>
                                </div>
                                <div class="col-9">
                                    <div class="h5">: <?= $profile->username ?></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="h5">Post</div>
                                </div>
                                <div class="col-9">
                                    <div class="h5">: <?= $countPost->jumlah_post ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn border-primary">Edit Profile</button>
                        </div>
                    </div>
                    <hr>
                    <div class="h3 mb-3">My Posts</div>

                    <div class="row">
                        <?php
                        foreach ($post as $p) {
                        ?>
                            <div class="col-6">

                                <div class="card my-2">
                                    <div class="card-header bg-white">
                                        <div class="dropdown text-end">
                                            <button class="btn btn-sm btn-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <!-- <i class="bi bi-three-dots-vertical"></i> -->
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                                <form action="<?= base_url('post/edit_post') ?>" method="post">
                                                    <input type="hidden" name="id" value="<?= $p->id_post ?>">
                                                    <li><button class="dropdown-item" type="submit">Edit Post</button></li>
                                                </form>
                                                <form action="<?= base_url('post/delete_post') ?>" method="post">
                                                    <input type="hidden" name="id" value="<?= $p->id_post ?>">
                                                    <li><button class="dropdown-item" type="submit">Delete Post</button></li>
                                                </form>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <!-- TODO: Change image with db -->
                                        <img src="<?= base_url('/assets/img/post_image/' . $p->image) ?>" class="mx-auto w-100" alt="">
                                        <div class="row mt-3 text-center">
                                            <div class="col-12">
                                                <div><?= $p->caption ?></div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
</main>

<div class="modal fade" id="fotoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('profile/edit_photo') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Upload Foto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>