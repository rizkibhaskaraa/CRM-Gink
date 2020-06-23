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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/home/home.css') ?>">


    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>

    <!-- Right Section -->
    <div class="col-md-2 ml-auto px-4">
        <!-- User Dropdown -->
        <div class="dropdown d-inline-block ml-2">
            <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded" src="<?php echo base_url('assets/oneui/media/avatars/avatar10.jpg') ?>" alt="Header Avatar" style="width: 18px;">
                <span class="d-none d-sm-inline-block ml-1"><?php echo $employ_nama ?> </span>
                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm " aria-labelledby="page-header-user-dropdown">
                <div class="p-3 text-center bg-primary">
                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="<?php echo base_url('assets/oneui/media/avatars/avatar10.jpg') ?>" alt="">
                </div>
                <div class="p-2">
                    <h5 class="dropdown-header text-uppercase">User Options</h5>
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?php echo base_url('index.php/home/hapussession') ?>">
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
        <div class="bg-image overflow-hidden" style="background-image: url('http://localhost/crm-gink/assets/oneui/media/photos/photo29@2x.jpg');">
            <div class="bg-primary-dark-op">
                <div class="content content-narrow content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                        <div class="flex-sm-fill">
                            <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Dashboard</h1>

                            <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Selama Datang , <?php echo $employ_nama ?></h2>

                            <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250"><?php echo $status . " " . $nama_departemen ?> di Gink Technology</h2>
                        </div>
                        <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                            <span class="d-inline-block invisible" data-toggle="appear" data-timeout="350">
                                <a class="btn btn-primary px-4 py-2" class="p-2 bg-primary text-white text-decoration-none tiket" data-toggle="modal" data-target="#modal-block-large-staff" href="">
                                    <i class="fa fa-plus mr-1"></i> Buat Tiket
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->
    </main>
    <!-- END Main Container -->
    
    <!-- Page Content -->
    <!-- request task,pelanggan,tugas selesai,tugas Belum Selesai,tiket selesai,tiket Belum Selesai -->
    <!-- navigasi bar pilih tabel -->
    <ul class="nav nav-tabs nav-tabs-block ml-3 px-3 mt-3" data-toggle="tabs" role="tablist">
        <?php if ($status == "kepala") { ?>
            <li style="background-color:lavender" class="nav-item">
                <a class="nav-link" href="#request">Request Tugas</a>
            </li>
        <?php }
        if ($employ_dept == "CS") { ?>
            <li style="background-color:lavender" class="nav-item">
                <a class="nav-link" href="#pelanggan">Data Pelanggan</a>
            </li>
        <?php } ?>
        </li>
        <li style="background-color:lavender" class="nav-item" >
            <a class="nav-link" href="#tugas">Tugas Saya</a>
        </li>
        <li style="background-color:lavender" class="nav-item">
            <a class="nav-link" href="#tiket">Tiket Saya</a>
        </li>
    </ul>
    <!-- akhir navigasi bar pilih tabel -->
    <div class="block-content tab-content overflow-hidden">
        <!-- Request Task -->
        <?php if ($status == "kepala") { ?>
            <div class="tab-pane fade fade-up show active" id="request" role="tabpanel">
                <div class="container-fluid">
                    <div class="block block-mode-loading-oneui">
                        <div class="block-header border-bottom">
                            <h3 class="block-title text-primary">Request Tugas</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-striped table-hover table-bordered table-vcenter font-size-sm mb-0">
                                <thead class="thead-dark">
                                    <tr class="text-uppercase">
                                        <th class="font-w700 text-center" style="width: 20%;">Title</th>
                                        <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 20%;">Penanggung Jawab</th>
                                        <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 20%;">Deadline</th>
                                        <th class="font-w700 text-center" style="width:15%" ;>Status</th>
                                        <th class="font-w700 text-center" style="width: 20%;">Aksi</th>
                                    </tr>
                                </thead>
                                <!-- request task belum ada pj -->
                                <?php foreach ($taskdiheadkosong as $value) { ?>
                                    <tbody>
                                        <tr>
                                            <!-- <?php if ($value["id_employ_tujuan"] == NULL) { ?> -->
                                                <td>
                                                    <span class="font-w600"><?php echo $value["title"] ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="font-w600 text-danger">Belum Ada</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="font-w600 "><?php echo $value["dateline"] ?></span>
                                                </td>
                                                <?php if ($value["status"] == "Belum Selesai") { ?>
                                                    <td class="text-center ">
                                                        <span class=" font-w600 btn-sm btn-block btn-danger "><i class="fa fa-fw fa-exclamation-circle"></i> <?php echo $value["status"] ?></span>
                                                    </td>
                                                <?php } else { ?>
                                                    <td class="text-center"><span class="font-w600 btn-sm btn-block btn-success"><i class="fa fa-fw fa-check"></i> <?php echo $value["status"] ?></span></td>
                                                <?php } ?>
                                               
                                                <td class="text-center">
                                                <a class="link-fx font-weight-bold" href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] . "/Request" ?>">Buka</a>
                                                </td>
                                            <!-- <?php } ?> -->
                                        </tr>
                                    </tbody>
                                <?php } ?> 
                                <!-- akhir request task belum ada pj -->
                                <!-- request task sudah ada pj -->
                                <?php foreach ($taskdihead as $value) { ?>
                                    <tbody>
                                        <tr>
                                            <!-- <?php if ($value["id_employ_tujuan"] != NULL) { ?> -->
                                                <td>
                                                    <span class="font-w600"><?php echo $value["title"] ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-success"><?php echo $value["nama"] ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="font-w600"><?php echo $value["dateline"] ?></span>
                                                </td>
                                                <?php if ($value["status"] == "Belum Selesai") { ?>
                                                    <td class="text-center"><span class="font-w600   btn-sm btn-block btn-danger"><i class="fa fa-fw fa-exclamation-circle"></i> <?php echo $value["status"] ?></span></td>
                                                <?php } else { ?>
                                                    <td class="text-center"><span class="font-w600   btn-sm btn-block btn-success"><i class="fa fa-fw fa-check"></i> <?php echo $value["status"] ?></span></td>
                                                <?php } ?>
                                                
                                                <td class="text-center">
                                                <a class="link-fx font-weight-bold" href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] . "/Request" ?>">Buka</a>
                                                </td>
                                            <!-- <?php } ?> -->
                                        </tr>
                                    </tbody>
                                <?php } ?>
                                <!-- akhir request task sudah ada pj -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- END Request Task -->
        <!-- pelanggan -->
        <?php if ($employ_dept == "CS") { ?>
            <div class="tab-pane fade fade-up show active" id="pelanggan" role="tabpanel">
                <div class="container-fluid">
                    <div class="block block-mode-loading-oneui">
                        <div class="block-header border-bottom">
                            <h3 class="block-title text-primary">Data Pelanggan</h3>
                        </div>
                        <a class="btn btn-primary mt-3 ml-4 tambah_pelanggan" data-toggle="modal" data-target="#modal-block-large-pelanggan" href="">
                            <i class="fa fa-plus mr-1"></i> Pelanggan
                        </a>
                        <input type="text" id="search" class="form-control col-2 search  mt-3 ml-2 mr-4" name="search" placeholder="Cari Customer">
                        <select name="layanan" id="layanan" class="form-control col-2 layanan  mt-3  ml-2">
                            <option value="semua">Semua Layanan</option>
                            <option value="app website">App Website</option>
                            <option value="website">Website</option>
                            <option value="Hosting">Hosting</option>
                            <option value="mobile">App Mobile</option>
                        </select>
                        <select name="status" id="status-pelanggan" class="form-control col-2 status-pelanggan mt-3">
                            <option value="semua">Semua Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak aktif">Tidak Aktif</option>
                        </select>
                        <input type="text" id="link" name="link" value="<?php echo base_url('index.php/home/search/') . $employ_id . "/" ?>" hidden>
                        <div class="block-content block-content-full">
                            <table class="table table-striped table-hover table-bordered table-vcenter font-size-sm mb-0" id="tabel-pelanggan">
                                <thead class="thead-dark">
                                    <tr class="text-uppercase">
                                        <th class="font-w700 text-center" style="width: 10%;">#ID</th>
                                        <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 20%;">Layanan</th>
                                        <th class="font-w700 text-center" style="width: 40%;">Customer</th>
                                        <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 15%;">Status</th>
                                        <th class="font-w700 text-center" style="width: 15%;">+Tiket</th>
                                    </tr>
                                </thead>
                                <?php foreach ($pelanggan as $value) { ?>
                                    <tbody>
                                        <tr>
                                            <?php if ($value["id_employ_tujuan"] == NULL) { ?>
                                                <td class="text-center">
                                                    <span class="font-w600 ">#<?php echo $value["id_pelanggan"] ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="font-w600"><?php echo $value["layanan"] ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="font-w600"><?php echo $value["customer"] ?></span>
                                                </td>
                                                <?php if ($value["status"] == "tidak aktif") { ?>
                                                    <td class="text-center"><span class="font-w600   btn-sm btn-block btn-danger "><i class="fa fa-fw fa-exclamation-circle"></i> <?php echo $value["status"] ?></span></td>
                                                <?php } else { ?>
                                                    <td class="text-center"><span class="font-w600   btn-sm btn-block btn-success"><i class="fa fa-fw fa-check"></i> <?php echo $value["status"] ?></span></td>
                                                <?php } ?>
                                                <td class="text-center">
                                                    <a href="" data-toggle="modal" data-target="#modal-block-large" id="<?php echo $value["id_pelanggan"] ?>" onclick="datapelanggan(this,'CS');"><button class="btn btn-light"><i class="fa fa-plus fa-2x"></i></button></a>                         
                                                    <!-- <a class="text-decoration-none" href="" data-toggle="modal" data-target="#modal-block-large" id="<?php echo $value["id_pelanggan"] ?>" onclick="datapelanggan(this,'CS');">+ tiket</a> -->
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- END pelanggan -->
        <div class="tab-pane fade fade-up <?php if ($employ_dept != "CS" && $status != "kepala") {
                                                echo "show active";
                                            } ?>" id="tugas" role="tabpanel">



        <!-- Belum Selesai -->
        <div class="container-fluid">
                        <div class="block block-mode-loading-oneui">
                            <div class="block-header border-bottom">
                                <h3 class="block-title text-danger">Tugas Saya | Belum Selesai</h3>
                            </div>
                            <div class="block-content block-content-full">
                                <table class="table table-striped table-hover table-bordered table-vcenter font-size-sm mb-0">
                                    <thead class="thead-dark">
                                        <tr class="text-uppercase">
                                            <th class="font-w700 text-center" style="width: 35%;">Title</th>
                                            <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 35%;">Deadline</th>
                                            <th class="font-w700 text-center" style="width: 15%;">Status</th>
                                            <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 15%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($taskbelum as $value) { ?>
                                        <tbody>
                                            <tr>
                                                <td style="width: 35%;">
                                                    <span class="font-w600"><?php echo $value["title"] ?></span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center" style="width: 35%;">
                                                    <span class="font-size-sm text-muted"><?php echo $value["dateline"] ?></span>
                                                </td>
                                                <td class="text-danger text-center" style="width: 15%;">
                                                    <span class="font-w600   btn-sm btn-block btn-danger "><i class="fa fa-fw fa-exclamation-circle"></i> <?php echo $value["status"] ?></span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center" style="width: 15%;">
                                                    <a class="link-fx font-weight-bold" href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] . "/TugasBelum" ?>" class="text-decoration-none">Buka | </a>
                                                    <a class="link-fx font-weight-bold" href="<?php echo base_url('index.php/home/status/') . $value["id_task"] ?>" class="text-decoration-none">Selesai</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END Belum Selesai -->

                    <!--  Selesai -->
                    <div class="container-fluid">
                        <div class="block block-mode-loading-oneui">
                            <div class="block-header border-bottom">
                                <h3 class="block-title text-success">Tugas Saya | Selesai</h3>
                            </div>
                            <div class="block-content block-content-full">
                                <table class="table table-striped table-hover table-bordered table-vcenter font-size-sm mb-0">
                                    <thead class="thead-dark">
                                        <tr class="text-uppercase">
                                            <th class="font-w700 text-center" style="width: 35%;">Title</th>
                                            <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 35%;">Deadline</th>
                                            <th class="font-w700 text-center" style="width: 15%;">Status</th>
                                            <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 15%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($taskselesai as $value) { ?>
                                        <tbody>
                                            <tr>
                                                <td style="width: 35%;">
                                                    <span class="font-w600"><?php echo $value["title"] ?></span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center" style="width: 35%;">
                                                    <span class="font-size-sm text-muted"><?php echo $value["dateline"] ?></span>
                                                </td>
                                                <td class="text-success text-center" style="width: 15%;">
                                                    <span class="font-w600   btn-sm btn-block btn-success "><i class="fa fa-fw fa-check"></i> <?php echo $value["status"] ?></span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center" style="width: 15%;">
                                                    <a class="link-fx font-weight-bold" href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] . "/TugasSelesai" ?>" class="text-decoration-none">Buka</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END  Selesai -->
                    
                </div>
                <div class="tab-pane fade fade-up" id="tiket" role="tabpanel">


        <!--  Tiket Belum Selesai -->
        <div class="container-fluid">
                <div class="block block-mode-loading-oneui">
                    <div class="block-header border-bottom">
                        <h3 class="block-title text-danger">Tiket Saya | Belum Selesai</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <table class="table table-striped table-hover table-bordered table-vcenter font-size-sm mb-0">
                            <thead class="thead-dark">
                                <tr class="text-uppercase">
                                    <th class="font-w700 text-center" style="width: 35%;">Title</th>
                                    <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 35%;">Deadline</th>
                                    <th class="font-w700 text-center" style="width: 15%;">Status</th>
                                    <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 15%;">Aksi</th>
                                </tr>
                            </thead>
                            <?php foreach ($tiket as $value) {
                                if ($value["status"] == "Belum Selesai") { ?>
                                    <tbody>
                                        <tr>
                                            <td style="width: 35%;">
                                                <span class="font-w600"><?php echo $value["title"] ?></span>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center" style="width: 35%;">
                                                <span class="font-size-sm text-muted"><?php echo $value["dateline"] ?></span>
                                            </td>
                                            <td class=" text-center" style="width: 15%;">
                                                <span class="font-w600   btn-sm btn-block btn-danger "><i class="fa fa-fw fa-exclamation-circle"></i> <?php echo $value["status"] ?></span>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center" style="width: 15%;">
                                                <a class="link-fx font-weight-bold" href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] . "/Tiket" ?>" class="text-decoration-none">Buka</a>
                                            </td>
                                        </tr>
                                    </tbody>
                            <?php }
                            } ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END  Tiket Belum Selesai -->

            <!--  Tiket Selesai -->
            <div class="container-fluid">
                <div class="block block-mode-loading-oneui">
                    <div class="block-header border-bottom">
                        <h3 class="block-title text-success">Tiket Saya | Selesai</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <table class="table table-striped table-hover table-bordered table-vcenter font-size-sm mb-0">
                            <thead class="thead-dark">
                                <tr class="text-uppercase">
                                    <th class="font-w700 text-center" style="width: 35%;">Title</th>
                                    <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 15%;">Deadline</th>
                                    <th class="font-w700 text-center" style="width: 15%;">Waktu Selesai</th>
                                    <th class="font-w700 text-center" style="width: 15%;">Status</th>
                                    
                                    <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <?php foreach ($tiket as $value) {
                                if ($value["status"] == "Selesai") { ?>
                                    <tbody>
                                        <tr>
                                            <td style="width: 35%;">
                                                <span class="font-w600"><?php echo $value["title"] ?></span>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center style=" style="width: 15%">
                                                <span class="font-size-sm text-muted"><?php echo $value["dateline"] ?></span>
                                            </td>
                                            <td class="text-success text-center" style="width: 15%;">
                                                <span class="font-w600 "><?php echo $value["waktu_selesai"] ?></span>
                                            </td>
                                            <td class="text-success text-center" style="width: 15%;">
                                                <span class="font-w600   btn-sm btn-block btn-success"><i class="fa fa-fw fa-check"></i><?php echo $value["status"] ?></span>
                                            </td>
                                           
                                            <td class="d-none d-sm-table-cell text-center" style="width: 10%;">
                                                <a class="link-fx font-weight-bold" href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] . "/Tiket" ?>" class="text-decoration-none">Buka</a>
                                            </td>
                                        </tr>
                                    </tbody>
                            <?php }
                            } ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END  Tiket Selesai -->
            
        </div>
    </div>
    <!-- END request task,pelanggan,tugas selesai,tugas Belum Selesai,tiket selesai,tiket Belum Selesai -->
    <!-- END Page Content -->
    <!-- POP UP BUAT TIKET -->
    <script>
        function datapelanggan(a, status) {
            var id_pelanggan = a.id;
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('index.php/home/get_pelanggan') ?>",
                dataType: "JSON",
                data: {
                    id: id_pelanggan
                },
                success: function(data) {
                    $('input[name="customer"]').val(data["customer"]);
                    $("#layanan_pelanggan").val(data["layanan"]);
                    $('input[name="id_pelanggan"]').val(id_pelanggan);
                }
            });
        }
    </script>
    <!-- pop up tiket pelanggan -->
    <div class="modal fade" id="modal-block-large" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Buat Tiket</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content font-size-sm mt-3 text-justify ">
                        <h4>Isi Data Dibawah Ini dengan Lengkap Untuk Membuat Tiket</h4>
                        <form action="<?php echo base_url('index.php/home/addtiket/') . $employ_id ?>" method="POST" id="form-tiket">
                            <input type="text" name="id_pelanggan" id="id_pelanggan" value="123" hidden>
                            <div class="form-group">
                                <label for="title">Customer</label>
                                <input type="text" class="form-control" name="customer" id="customer" value="<?php echo $customer ?>" placeholder="<?php echo $customer ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="title">Layanan</label>
                                <input type="text" class="form-control" name="layanan" id="layanan_pelanggan" value="<?php echo $layanan ?>" placeholder="<?php echo $layanan ?>" readonly>
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
                            <div class="form-group">
                                <label for="title">Judul Tugas</label>
                                <input type="text" class="form-control required" name="title" id="title" placeholder="Judul/Subject">
                                <?= form_error('title', '<span class="text-danger">', '</span>') ?>
                            </div>
                            <div class="form-group">
                                <label for="dateline">Deadline</label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text-alt">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                    <input type="text" class="js-datepicker form-control required" name="dateline" id="dateline" data-date-format="yyyy-mm-dd" data-week-start="1" data-autoclose="true" data-today-highlight="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control required" name="deskripsi" id="deskripsi" rows="3" placeholder="Isi Deskripsi"></textarea>
                                <?= form_error('deskripsi', '<span class="text-danger">', '</span>') ?>
                            </div>
                            <div style="float:right;margin-bottom:3%">
                                <button type="reset" class="btn btn-outline-warning mr-2">Reset</button>
                                <button type="submit" class="btn btn-primary">Buat</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir pop up tiket pelanggan -->
    <!-- pop up tiket staff -->
    <div class="modal fade" id="modal-block-large-staff" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Buat Tiket</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content font-size-sm mt-3 text-justify ">
                        <h4>Isi Data Dibawah Ini dengan Lengkap untuk Membuat Tiket</h4>
                        <form action="<?php echo base_url('index.php/home/addtiket/') . $employ_id ?>" method="POST" id="form-staff">
                            <input type="text" name="id_pelanggan" value="<?php echo $id_pelanggan ?>" hidden>
                            <input type="text" name="masalah" value="" hidden>
                            <input type="text" name="layanan" value="" hidden>
                            <div class="form-group">
                                <label for="departemen">Departemen tujuan</label>
                                <select name="departemen" id="departemen" class="form-control">
                                    <option value="developer">Developer</option>
                                    <option value="finance">Finance</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Judul Tugas</label>
                                <input type="text" class="form-control required" name="title" id="title" placeholder="Judul/Subject">
                                <?= form_error('title', '<span class="text-danger">', '</span>') ?>
                            </div>
                            <div class="form-group">
                                <label for="dateline">Deadline</label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text-alt">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                    <input type="text" class="js-datepicker form-control required" name="dateline" id="dateline" data-date-format="yyyy-mm-dd" data-week-start="1" data-autoclose="true" data-today-highlight="true"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control required" name="deskripsi" id="deskripsi" rows="3" placeholder="Isi Deskripsi"></textarea>
                                <?= form_error('deskripsi', '<span class="text-danger">', '</span>') ?>
                            </div>
                            <div style="float:right;margin-bottom:3%">
                                <button type="reset" class="btn btn-outline-warning mr-2">Reset</button>
                                <button type="submit" class="btn btn-primary">Buat</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir pop up tiket staff -->
    <!-- pop up tambah pelanggan -->
    <div class="modal fade" id="modal-block-large-pelanggan" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Tambah Pelanggan</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content font-size-sm mt-3 text-justify ">
                        <h4>Isi Data Dibawah Ini dengan Lengkap Untuk Menambah Pelanggan</h4>
                        <form action="<?php echo base_url('index.php/home/addpelanggan/')?>" method="POST" id="form-pelanggan">
                            <div class="form-group">
                                <label for="title">Customer</label>
                                <input type="text" class="form-control required" name="customer" id="customer" placeholder="Nama Customer">
                            </div>
                            <div class="form-group">
                                <label for="layanan">Jenis Layanan</label>
                                <select name="layanan" id="layanan" class="form-control">
                                    <option value="Website">Website</option>
                                    <option value="APP Website">APP Website</option>
                                    <option value="Mobile">Mobile</option>
                                    <option value="Aplikasi Desktop">Aplikasi Desktop</option>
                                </select>
                            </div>
                            <div style="float:right;margin-bottom:3%">
                                <button type="reset" class="btn btn-outline-warning mr-2">Reset</button>
                                <button type="submit" class="btn btn-primary">Buat</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir pop up tambah pelanggan -->
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

    <!-- validasi form -->
    <script src="<?php echo base_url('assets/oneui/js/plugins/jquery-validation/jquery.validate.js') ?>"></script>
    <script>
        $(document).ready(function(){
            $("#form-staff").validate();
            });
        $(document).ready(function(){
            $("#form-pelanggan").validate();
        })
        $(document).ready(function(){
            $("#form-tiket").validate();
        });
    </script>
    <!-- akhir validasi form -->

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

    <!-- search pelanggan -->
    <script src="<?php echo base_url('assets/ajax/search.js') ?>"></script>

    <script src="<?php echo base_url('assets/oneui/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
    <!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider plugins) -->
    <script>
        jQuery(function() {
            One.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider']);
        });
    </script>
</body>

</html>