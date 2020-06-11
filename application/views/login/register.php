<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login/register.css') ?>">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <title>Staff Register</title>
</head>

<body>
    <div class="login-form-card">
        <div class="login-form-container">
            <span id="login-title">
                Selamat Datang Di
            </span>
            <div class="login-logo">
                <img src="<?php echo base_url('assets/img/logo.png') ?>" alt="Gink Technology">
            </div>
            <form method="post" action="<?php echo base_url('index.php/register/register') ?>">
                <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>">
                <!-- <?= form_error('nama', '<span class="text-danger">', '</span>') ?> -->
                <label for="departemen">Pilih Departemen</label>
                <select name="departemen" id="departemen">
                    <option value="IT">Programer</option>
                    <option value="Support">Support</option>
                    <option value="HRD">HRD</option>
                </select>
                <label for="head">head</label>
                <input type="radio" name="role" id="head" value="head">
                <label for="staff">staff</label>
                <input type="radio" name="role" id="staff" value="staff">
                <input type="text" name="username" id="username" placeholder="Username" value="<?= set_value('username') ?>">
                <!-- <?= form_error('username', '<span class="text-danger">', '</span>') ?> -->
                <input type="text" name="email" id="email" placeholder="Email" value="<?= set_value('email') ?>">
                <!-- <?= form_error('email', '<span class="text-danger">', '</span>') ?> -->
                <input type="password" name="password" id="password" placeholder="Password">
                <!-- <?= form_error('password', '<span class="text-danger">', '</span>') ?> -->
                <input type="password" name="password2" id="password2" placeholder="Ulangi Password">
                <input type="submit" value="Daftar">
            </form>
        </div>
    </div>
</body>

</html>