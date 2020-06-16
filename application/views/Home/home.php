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
        <link rel="shortcut icon" href="<?php echo base_url('assets/oneui/media/favicons/favicon.png')?>">
        <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url('assets/oneui/media/favicons/favicon-192x192.png')?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/oneui/media/favicons/apple-touch-icon-180x180.png')?>">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url('assets/oneui/css/oneui.min.css')?>">

        
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
                                <img class="rounded" src="<?php echo base_url('assets/oneui/media/avatars/avatar10.jpg')?>" alt="Header Avatar" style="width: 18px;">

                                
                                <span class="d-none d-sm-inline-block ml-1"><?php echo $employ_nama ?>                 </span>
                                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
                                <div class="p-3 text-center bg-primary">
                                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="<?php echo base_url('assets/oneui/media/avatars/avatar10.jpg')?>" alt="">
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
                                    
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?php echo base_url()?>">
                                        <span>Log Out</span>
                                        <i class="si si-logout ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END User Dropdown -->

                        

                      
                    </div>
                    <!-- END Right Section -->
                </div>
               <!-- Batas account dan main container -->

            <!-- Main Container -->
            <main id="main-container">

                <!-- Hero -->

                <div class="bg-image overflow-hidden" style="background-image: url('http://localhost/crm-gink/assets/oneui/media/photos/photo3@2x.jpg');">


                    <div class="bg-primary-dark-op">
                        <div class="content content-narrow content-full">
                            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                                <div class="flex-sm-fill">
                                    <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Dashboard</h1>
                                    
                                    <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Selama Datang , <?php echo $employ_nama ?></h2>
                                    
                                    <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250"><?php echo $status." ".$nama_departemen?> di Gink Technology</h2>
                                </div>
                                <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                                    <span class="d-inline-block invisible" data-toggle="appear" data-timeout="350">
                                        <a class="btn btn-primary px-4 py-2" data-toggle="click-ripple" href="<?php echo base_url('index.php/tiket/index/') . $employ_id . "/" ?>" class="p-2 bg-primary text-white text-decoration-none tiket">
                                            <i class="fa fa-plus mr-1"></i> Buat Tiket
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                
                    <!-- request task,pelanggan,tugas selesai,tugas belum selesai -->
                    <div class="row row-deck">
                        <!-- Request Task -->
                    <?php if ($status == "kepala") { ?>
                        <div class="col-lg-6 mt-3">
                            <div class="block block-mode-loading-oneui">
                                <div class="block-header border-bottom">
                                    <h3 class="block-title text-primary">Request Tugas</h3>
                                </div>
                                <div class="block-content block-content-full">
                                    <table class="table table-striped table-hover table-bordered table-vcenter font-size-sm mb-0">
                                        <thead class="thead-dark">
                                            <tr class="text-uppercase ">
                                                <th class="font-w700 text-center" style="width: 80px;">Title</th>
                                                <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 100px;">Deadline</th>
                                                <th class="font-w700 text-center" style="width:80px"; >Status</th>
                                                <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 200px;">Penanggung Jawab</th>
                                                <th class="font-w700 text-center" style="width: 60px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php foreach ($taskdihead as $value) { ?>
                                        <tbody>
                                            <tr>
                                            <?php if($value["id_employ_tujuan"]==NULL){?>
                                                <td>
                                                    <span class="font-w600"><?php echo $value["title"] ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="font-w600 "><?php echo $value["dateline"] ?></span>
                                                </td>
                                                <?php if($value["status"]=="belum selesai"){?>
                                                    <td class="text-center"><span class="font-w600 text-danger "><?php echo $value["status"] ?></span></td>
                                                <?php }else{?>
                                                    <td class="text-center"><span class="font-w600 text-success"><?php echo $value["status"] ?></span></td>
                                                <?php }?>
                                                <td class="text-center">
                                                    <span class="font-w600">Belum Ada</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-decoration-none" href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] ?>">Buka</a>
                                                </td>
                                            <?php } ?>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                        <?php foreach ($taskdihead as $value) { ?>
                                        <tbody>
                                            <tr>
                                            <?php if($value["id_employ_tujuan"]!=NULL){?>
                                                <td>
                                                    <span class="font-w600"><?php echo $value["title"] ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="font-w600"><?php echo $value["dateline"] ?></span>
                                                </td>
                                                <?php if($value["status"]=="belum selesai"){?>
                                                    <td class="text-center"><span class="font-w600 text-danger"><?php echo $value["status"] ?></span></td>
                                                <?php }else{?>
                                                    <td class="text-center"><span class="font-w600 text-success"><?php echo $value["status"] ?></span></td>
                                                <?php }?>
                                                <td class="text-center">
                                                    <span class="text-success"><?php echo $value["id_employ_tujuan"] ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-decoration-none" href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] ?>">Buka</a>
                                                </td>
                                            <?php } ?>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                        <!-- END Request Task -->
                        <!-- pelanggan -->
                    <?php if ($employ_dept == "CS") { ?>
                        <div class="col-lg-6 mt-3">
                            <div class="block block-mode-loading-oneui">
                                <div class="block-header border-bottom">
                                    <h3 class="block-title text-primary">Data Pelanggan</h3>
                                </div>
                                <div class="block-content block-content-full">
                                    <table class="table table-striped table-hover table-bordered table-vcenter font-size-sm mb-0">
                                        <thead class="thead-dark">
                                            <tr class="text-uppercase">
                                                <th class="font-w700 text-center" style="width: 80px;">#ID</th>
                                                <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 100px;">Layanan</th>
                                                <th class="font-w700 text-center">Customer</th>
                                                <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 200px;">Status</th>
                                                <th class="font-w700 text-center" style="width: 60px;">+Tiket</th>
                                            </tr>
                                        </thead>
                                        <?php foreach ($pelanggan as $value) { ?>
                                        <tbody>
                                            <tr>
                                            <?php if($value["id_employ_tujuan"]==NULL){?>
                                                <td>
                                                    <span class="font-w600">#<?php echo $value["id_pelanggan"] ?></span>
                                                </td>
                                                <td >
                                                    <span class="font-w600"><?php echo $value["layanan"] ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="font-w600"><?php echo $value["customer"] ?></span>
                                                </td>
                                                <?php if($value["status"]=="tidak aktif"){?>
                                                    <td class="text-center"><span class="font-w600 text-danger "><?php echo $value["status"] ?></span></td>
                                                <?php }else{?>
                                                    <td class="text-center"><span class="font-w600 text-success"><?php echo $value["status"] ?></span></td>
                                                <?php }?>
                                                <td>
                                                <a class="text-decoration-none" href="<?php echo base_url('index.php/tiket/index/') . $employ_id . "/" . $value["id_pelanggan"] ?>">+ tiket</a>
                                                </td>
                                            <?php } ?>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                        <?php foreach ($taskdihead as $value) { ?>
                                        <tbody>
                                            <tr>
                                            <?php if($value["id_employ_tujuan"]!=NULL){?>
                                                <td>
                                                    <span class="font-w600"><?php echo $value["title"] ?></span>
                                                </td>
                                                <td >
                                                    <span class="font-w600"><?php echo $value["dateline"] ?></span>
                                                </td>
                                                <?php if($value["status"]=="belum selesai"){?>
                                                    <td class="text-center"><span class="font-w600 text-danger"><?php echo $value["status"] ?></span></td>
                                                <?php }else{?>
                                                    <td class="text-center"><span class="font-w600 text-success"><?php echo $value["status"] ?></span></td>
                                                <?php }?>
                                                <td class="text-center">
                                                    <span class="text-success"><?php echo $value["id_employ_tujuan"] ?></span>
                                                </td>
                                                <td>
                                                    <a class="text-decoration-none" href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] ?>">Buka</a>
                                                </td>
                                            <?php } ?>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                        <!-- END pelanggan -->

                        <!-- Latest Orders -->
                        <div class="col-lg-6 mt-3">
                            <div class="block block-mode-loading-oneui">
                                <div class="block-header border-bottom">
                                    <h3 class="block-title text-danger">Belum Selesai</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-settings"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                                        <thead class="thead-dark">
                                            <tr class="text-uppercase">
                                                <th class="font-w700 text-center">Title</th>
                                                <th class="d-none d-sm-table-cell font-w700 text-center">Deadline</th>
                                                <th class="font-w700 text-center">Status</th>
                                                <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 120px;">Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <?php foreach ($taskbelum as $value) { ?>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span class="font-w600"><?php echo $value["title"] ?></span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <span class="font-size-sm text-muted"><?php echo $value["dateline"] ?></span>
                                                </td>
                                                <td class="text-danger text-center">
                                                    <span class="font-w600 "><?php echo $value["status"] ?></span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                <a href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] ?>" class="text-decoration-none">Buka  |  </a>
                                                <a href="<?php echo base_url('index.php/home/status/') . $value["id_task"] ?>" class="text-decoration-none">Selesai</a>
                                        
                                                </td>
                                               
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END Latest Orders -->
                    </div>
                    <!-- END request task,pelanggan,tugas selesai,tugas belum selesai -->
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->

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
        <script src="<?php echo base_url('assets/oneui/js/oneui.core.min.js')?>"></script>
        
        
        <!--
            OneUI JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
        <script src="<?php echo base_url('assets/oneui/js/oneui.app.min.js')?>"></script>

        <!-- Page JS Plugins -->
        <script src="<?php echo base_url('assets/oneui/js/plugins/chart.js/Chart.bundle.min.js')?>"></script>

        <!-- Page JS Code -->
        <script src="<?php echo base_url('assets/oneui/js/pages/be_pages_dashboard.min.js')?>"></script>
    </body>
</html>
