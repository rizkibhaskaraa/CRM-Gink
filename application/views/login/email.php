<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login/email.css')?>">
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
            <span>Masukan email untuk reset password</span>
            <form method="post" action="<?php echo base_url('index.php/login/send_email')?>">
                <input type="text" name="email" id="email" placeholder="Email">
                <input type="submit" value="Kirim Email">
            </form>
        </div>
    </div>
</body>
</html>