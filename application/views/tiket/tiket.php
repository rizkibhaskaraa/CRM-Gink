<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Dashboard </title>

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
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/oneui/media/favicons/favicon.png') ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url('assets/oneui/media/favicons/favicon-192x192.png') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/oneui/media/favicons/apple-touch-icon-180x180.png') ?>">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and OneUI framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
    <link rel="stylesheet" id="css-main" href="<?php echo base_url('assets/oneui/css/oneui.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/tiket/tiket.css')?>">


    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>
    <!-- Right Section -->
    <div class="d-flex align-items-center">
        <!-- User Dropdown -->
        <div class="dropdown d-inline-block ml-2">
            <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded" src="<?php echo base_url('assets/oneui/media/avatars/avatar10.jpg') ?>" alt="Header Avatar" style="width: 18px;">
                <span class="d-none d-sm-inline-block ml-1"><?php echo $employ_nama ?> </span>
                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
                <div class="p-3 text-center bg-primary">
                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="<?php echo base_url('assets/oneui/media/avatars/avatar10.jpg') ?>" alt="">
                </div>
                <div class="p-2">
                    <h5 class="dropdown-header text-uppercase">User Options</h5>

                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_profile.html">
                        <span>Profile</span>
                        <span>
                            <span class="badge badge-pill badge-success">1</span>
                            <i class="si si-user ml-1"></i>
                        </span>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                        <span>Settings</span>
                        <i class="si si-settings"></i>
                    </a>
                    <div role="separator" class="dropdown-divider"></div>
                    <h5 class="dropdown-header text-uppercase">Actions</h5>

                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?php echo base_url() ?>">
                        <span>Log Out</span>
                        <i class="si si-logout ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- END User Dropdown -->
    </div>
    <!-- END Right Section -->
    <!-- Batas account dan main container -->

    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-image overflow-hidden" style="background-image: url('http://localhost/crm-gink/assets/oneui/media/photos/photo3@2x.jpg');">
            <div class="bg-primary-dark-op">
                <div class="content content-narrow content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-1 mb-2 text-center text-sm-left">
                        <div class="flex-sm-fill">
                            <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Buat tiket</h1>

                            <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Isi data dibawah ini dengan lengkap</h2>

                            <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">untuk membuat tiket</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->
    </main>
    <!-- END Main Container -->

    <!-- Page Content -->
    <div class="container-tiket">
        <form action="<?php echo base_url('index.php/tiket/addtiket/').$id_employ?>" method="POST">

        <!-- jika CS yang buat tiket dari complain customer-->
            <?php if($status == "CS"){?>
                <input type="text" name="id_pelanggan" value="<?php echo $id_pelanggan?>" hidden>
                <div class="form-group">
                    <label for="title">Customer</label>
                    <input type="text" class="form-control" name="customer" id="customer" placeholder="<?php echo $customer?>" value="<?php echo $customer?>" readonly>
                </div>
                <div class="form-group">
                    <label for="title">Layanan</label>
                    <input type="text" class="form-control" name="layanan" id="layanan" placeholder="<?php echo $layanan?>" value="<?php echo $layanan?>" readonly>
                </div>
                <div class="form-group">
                    <label for="masalah">Jenis Masalah</label>
                    <select name="masalah" id="masalah" class="form-control">
                        <option value="umum">General</option>
                        <option value="support">Support</option>
                        <option value="hosting">Hosting</option>
                        <option value="biling">Billing</option>
                    </select>
                </div>
            <!-- akhir jika CS yang buat tiket dari complain customer-->
            <!-- jika staff yang buat tiket untuk staff lainnya-->
            <?php }else{?>
                <input type="text" name="id_pelanggan" value="<?php echo $id_pelanggan?>" hidden>
                <input type="text" name="masalah" value="" hidden>
                <input type="text" name="layanan" value="" hidden>
                <div class="form-group">
                    <label for="departemen">Departemen tujuan</label>
                    <select name="departemen" id="departemen" class="form-control">
                        <option value="developer">Developer</option>
                        <option value="finance">Finance</option>
                    </select>
                </div>
            <?php }?>
            <div class="form-group">
                <label for="title">Judul Tugas</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="judul / subject" >
                <?= form_error('title', '<span class="text-danger">', '</span>') ?>
            </div>
            <div class="form-group">
                <label for="dateline">Deadline</label>
                <input type="text" class="form-control" name="dateline" id="dateline">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="isi deskripsi"></textarea>
                <?= form_error('deskripsi', '<span class="text-danger">', '</span>') ?>
            </div>
            <button type="submit" class="btn btn-primary">Buat</button>
            <button type="reset" class="btn btn-primary">Reset</button>
            <!-- akhir jika staff yang buat tiket untuk staff lainnya-->
        </form>
    </div>
    <!-- END Page Content -->

    <!-- Footer -->
    <footer id="page-footer" class="bg-body-light">
        <div class="content py-3">
            <div class="row font-size-sm">
                <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-right">
                    Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="" target="_blank">ARMTEAM</a>
                </div>
                <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
                    <a class="font-w600" href="https://1.envato.market/xWy" target="_blank">Gink Technology x OneUI 4.2</a> &copy; <span data-toggle="year-copy"></span>
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->

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
    <script src="<?php echo base_url('assets/oneui/js/oneui.core.min.js') ?>"></script>


    <!--
            OneUI JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
    <script src="<?php echo base_url('assets/oneui/js/oneui.app.min.js') ?>"></script>

    <!-- Page JS Plugins -->
    <script src="<?php echo base_url('assets/oneui/js/plugins/chart.js/Chart.bundle.min.js') ?>"></script>

    <!-- Page JS Code -->
    <script src="<?php echo base_url('assets/oneui/js/pages/be_pages_dashboard.min.js') ?>"></script>
</body>

</html>