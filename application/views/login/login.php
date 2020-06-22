<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <title>Staff Login</title>

        <meta name="description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="OneUI">
        <meta property="og:description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">




        <!-- Icons -->
        <link rel="shortcut icon" href="assets/oneui/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="assets/oneui/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/oneui/media/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="assets/oneui/css/oneui.min.css">



</head>
<body>


<div id="page-container">

<!-- Main Container -->
<main id="main-container">

    <!-- Page Content -->
    <div class="bg-image" style="background-image: url('assets/oneui/media/photos/photo36@2x.jpg');">
        <div class="hero-static bg-white-95">
            <div class="content">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <!-- Sign In Block -->
                        <div class="block block-themed block-fx-shadow mb-0">
                                                      
                            
                            <div class="block-content">
                            <img class="img-fluid mt-3" src="<?php echo base_url('assets/img/logo.png')?> " alt="Gink Technology">
                            
                            
                                <div class=" px-lg-4 py-lg-5 " >

                                
                                <div id="page-loader" class="show"></div>
                                    <h1 class="mb-2 ">Sign In</h1>
                                    <p>Masuk untuk melanjutkan akses.</p>
                                
                                     <form class="js-validation-signin" action="<?php echo base_url('index.php/login/login')?>" method="POST">
                                        <div class="py-1">
                                            <div class="form-group">
                                                <input type="text" name="username" class="form-control form-control-alt form-control-lg " id="email-admin" name="login-username" placeholder="Email / Username">
                                                
                                                
                                            </div>
                                            <div class="form-group ">
                                                <input type="password" class="form-control form-control-alt form-control-lg" id="password-admin" name="password" placeholder="Password">
                                            </div>
                
                                        </div>


                                        
                                        <div class="form-group row ">
                                            <div class="container-fluid  ">
                                                <input type="submit" class="btn btn-block btn-primary mt-3 " value="Sign In"
                                                onclick="One.loader('show');
                                            setTimeout(function () {
                                                One.loader('hide');
                                            }, 3000);"> 
                                                </input>
                                            </div>
                                        </div>


                                    
                            </div>

                         

                                    </form>
                                    <!-- END Sign In Form -->
                                 
                                </div>
                            </div>
                        </div>
                        <!-- END Sign In Block -->
                        <div class="content content-full font-size-sm text-muted text-center">
                <strong>ARM TEAM</strong> &copy; <span data-toggle="year-copy"></span>
            </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    <!-- END Page Content -->

</main>
<!-- END Main Container -->

</div>
<!-- END Page Container -->


<!--
OneUI JS Core

Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

If you like, you could also include them separately directly from the assets/js/core folder in the following
order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

assets/js/core/jquery.min.js
assets/js/core/bootstrap.bundle.min.js
assets/js/core/simplebar.min.js
assets/js/core/jquery-scrollLock.min.js
assets/js/core/jquery.appear.min.js
assets/js/core/js.cookie.min.js
-->
<script src="assets/oneui/js/oneui.core.min.js"></script>

<!--
OneUI JS

Custom functionality including Blocks/Layout API as well as other vital and optional helpers
webpack is putting everything together at assets/_es6/main/app.js
-->
<script src="assets/oneui/js/oneui.app.min.js"></script>

<!-- Page JS Plugins -->
<script src="assets/oneui/js/plugins/jquery-validation/jquery.validate.min.js"></script>

<!-- Page JS Code -->
<script src="assets/oneui/js/pages/op_auth_signin.min.js"></script>y





</body>
</html>