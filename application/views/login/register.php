<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login/register.css')?>">
    <title>Staff Register</title>
</head>
<body>
    <div class="login-form-card">
        <div class="login-form-container">
            <span id="login-title">
                Selamat Datang Di
            </span>
        <div class="login-logo">
            <img src="<?php echo base_url('assets/img/logo.png')?>" alt="Gink Technology"> 
        </div>
            <form method="post" action="">
                <input type="text" name="nama" id="nama" placeholder="Nama Lengkap">
                <label for="departemen">Pilih Departemen</label>
                <select name="departemen" id="departemen">
                    <option value="IT">Programer</option>
                    <option value="Support">Support</option>
                    <option value="HRD">HRD</option>
                </select>
                <input type="text" name="username" id="username" placeholder="Username">
                <input type="text" name="email" id="email" placeholder="Email">
                <input type="password" name="password" id="password" placeholder="Password">
                <input type="password" name="ulang-password" id="ulang-password" placeholder="Ulangi Password">
                <input type="submit" value="Daftar">
            </form>
        </div>
    </div>
</body>
</html>