<?php
echo $this->extend('layout/template');
echo $this->section('navbar');
?>

<main class="d-flex flex-column align-items-center justify-content-center py-4">
    <div class="form-signin m-auto border rounded shadow p-5" style="width: 35%;">
        <form action="<?= url_to('register') ?>" class="need-validation text-center" method="post">
            <?= csrf_field() ?>
            <div class="d-flex justify-content-center">
                <img class="mb-4 me-2" src="<?= base_url('/assets/img/icon.png') ?>" alt="" width="50" height="50">
                <span style="font-family: Pacifico; font-size: 2rem;">InstaApp</span>
            </div>
            <h1 class="h3 mb-3 fw-normal">Registrasi Akun</h1>

            <div class="mb-3">
                <?= view('Myth\Auth\Views\_message_block') ?>
                <?= d(session('errors')) ?>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" id="email" placeholder="name@example.com" value="<?= old('email') ?>">
                <label for=" email">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" id="name" class="form-control <?php if (session('errors.name')) : ?>is-invalid<?php endif ?>" name="name" placeholder="<?= lang('Auth.name') ?>" value="<?= old('name') ?>">
                <label for="name">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" id="birthdate" class="form-control <?php if (session('errors.birthdate')) : ?>is-invalid<?php endif ?>" name="birthdate" placeholder="<?= lang('Auth.birthdate') ?>" value="<?= old('birthdate') ?>">
                <label for="birthdate">Birthdate</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" id="username" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                <label for="username">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="password" placeholder="Password" autocomplete="off">
                <label for="password">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="pass_confirm" id="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
            </div>
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <button class="btn btn-primary btn-block mb-3" type="submit"><?= lang('Auth.register') ?></button>
                </div>
            </div>

            <p><?= lang('Auth.alreadyRegistered') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.signIn') ?></a></p>
        </form>
    </div>
</main>

<?= $this->endSection() ?>