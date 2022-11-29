<?php
echo $this->extend('layout/template');
echo $this->section('navbar');
?>

<!-- Content Wrapper. Contains page content -->
<main class="d-flex flex-column align-items-center justify-content-center py-4" style="height: 100vh;">
    <div class="form-signin m-auto border rounded shadow p-5" style="width: 35%;">
        <form class="needs-validation text-center" action="<?= url_to('login') ?>" method="post">
            <div class="d-flex justify-content-center">

                <img class="mb-4 me-2" src="<?= base_url('/assets/img/icon.png') ?>" alt="" width="50" height="50">
                <span style="font-family: Pacifico; font-size: 2rem;">InstaApp</span>
            </div>
            <h1 class="h3 mb-3 fw-normal">Sign In</h1>
            <div class="mb-3">
                <?= view('Myth\Auth\Views\_message_block') ?>
            </div>

            <div class="form-floating mb-3">
                <input name="login" type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id=" floatingInput" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                <label for="floatingInput">Email/Username</label>
                <div class="invalid-feedback">
                    <?= session('errors.password') ?>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="floatingPassword" placeholder="<?= lang('Auth.password') ?>">
                <label for="floatingPassword">Password</label>
                <div class="invalid-feedback">
                    <?= session('errors.password') ?>
                </div>
            </div>
            <div class="form-check mb-3">
                <label class="form-check-label">
                    <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                    <?= lang('Auth.rememberMe') ?>
                </label>
            </div>
            <button class="w-100 btn btn-primary mb-2" type="submit"><?= lang('Auth.loginAction') ?></button>
            <div class="col-12">
                <p class="small mb-0">Don't have account? <a href="<?= base_url('register') ?>">Create an account</a></p>
            </div>
        </form>
    </div>
</main>


<?= $this->endSection() ?>