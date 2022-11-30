<?php

echo $this->extend('layout/template');
echo $this->section('navbar');
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm .">
    <div class="container">
        <div class="row  w-100">
            <div class="col-4 text-center d-flex align-items-center ">
                <a class="navbar-brand" href="#">
                    <img src="<?= base_url('assets/img/icon.png') ?>" alt="" width="30" height="30" class="d-inline-block align-text-top me-1">
                    <span style="font-family: Pacifico;">InstaApp</span>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="col-4">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav mx-auto">
                        <a class="nav-link mx-4" aria-current="page" href="<?= base_url('home') ?>">
                            <i class="bi bi-house-door text-dark" style="font-size: 1.5rem;"></i>
                        </a>
                        <a class="nav-link mx-4" href="<?= base_url('post/new_post') ?>">
                            <i class="bi bi-plus-square text-dark" style="font-size: 1.5rem;"></i>
                        </a>
                        <a class="nav-link mx-4" href="<?= base_url('profile/liked_post') ?>">
                            <i class="bi bi-bookmark text-dark" style="font-size: 1.5rem;"></i>
                        </a>
                        <a class="nav-link mx-4" href="<?= base_url('profile') ?>">
                            <i class="bi bi-person text-dark" style="font-size: 1.5rem;"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="navbar-nav ">
                    <div class="nav-link ms-auto" aria-current="page" href="/">
                        <!-- TODO: Change source image to from db -->
                        <?php
                        if (logged_in()) {
                        ?>
                            <div class="dropdown">
                                <div class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <!-- <i class="bi bi-chevron-down"></i> -->
                                    <img src="<?= base_url('assets/img/profile_photo/' . (user()->profile_image == null ? 'default-profile.png' : user()->profile_image)) ?>" alt="" width="40" height="40" class="rounded-circle shadow-sm">
                                </div>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a href="<?= base_url('logout') ?>" class="dropdown-item">LogOut</a></li>
                                </ul>
                            </div>
                        <?php
                        } else {
                        ?>
                            <a href="<?= base_url('login') ?>" class="btn btn-warning">Login</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>


<?= $this->renderSection('content') ?>

<?= $this->endSection() ?>