<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login/login.css')?>">
    <title>Staff Login</title>
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
            <form method="post" action="<?php echo base_url('index.php/login/login')?>">
                <input type="text" name="username" id="email-admin" placeholder="Email / Username">
                <input type="password" name="password" id="password-admin" placeholder="Password">
                <input type="submit" value="Login">
            </form>
            <div class="register">
                <a class="reg" href="<?php echo base_url('index.php/login/register')?>">Register</a>
                <a class="forget-pw"  href="">Lupa Password ?</a>
            </div>
        </div>
    </div>
</body>
</html>