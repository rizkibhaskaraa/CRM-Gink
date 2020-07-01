<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Dashboard </title>

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

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/oneui/js/plugins/summernote/summernote-bs4.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/oneui/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>">


    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>

    <!-- Right Section -->
    <!-- Home button -->
    <?php if($employ_dept=="ceo"){
        $linkhome = base_url('index.php/home/ceo/').$username;
    }else{
        $linkhome = base_url('index.php/home/index/').$username;
    }?>
    <div class="ml-4"  style="float:left;">
                <a class="btn btn-sm btn-dual" href="<?php echo $linkhome?>">
                    <img class="rounded"  src="<?php echo base_url('assets/oneui/media/avatars/home.png') ?>" alt="Header Avatar" style="width: 18px;">
                    <span class="ml-2">Home</span>
                
                </a>
            </div>
            <!-- end home button -->
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
            <li style="background-color:lavender" class="nav-item">
                <a class="nav-link" href="#pelanggan">Pelanggan</a>
            </li>
            <li style="background-color:lavender" class="nav-item">
                <a class="nav-link" href="#report">Report</a>
            </li>
            <li style="background-color:lavender" class="nav-item">
                <a class="nav-link" href="#tugas">Tugas</a>
            </li>
            <li style="background-color:lavender" class="nav-item">
                <a class="nav-link" href="#tiket">Tiket Saya</a>
            </li>
    </ul>
    <!-- akhir navigasi bar pilih tabel -->
    <div class="block-content tab-content overflow-hidden">

        <!-- pelanggan -->
        <div class="tab-pane fade fade-up show active" id="pelanggan" role="tabpanel">
            <div class="container-fluid">
                <div class="block block-mode-loading-oneui">
                    <div class="block-header border-bottom">
                        <h3 class="block-title text-primary">Data Pelanggan</h3>
                    </div>
                    <input type="text" id="search" class="form-control col-2 search  mt-3 ml-2 mr-4" name="search" placeholder="Cari Customer">
                    <select name="status" id="status-pelanggan" class="form-control col-2 status-pelanggan mt-3">
                        <option value="semua">Semua Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="tidak aktif">Tidak Aktif</option>
                    </select>
                    <input type="text" id="link" name="link" value="<?php echo base_url('index.php/home/search/') . $employ_id . "/" ?>" hidden>
                    <div class="block-content block-content-full">
                        <table class="table table-bordered table-hover  table-vcenter font-size-sm mb-0" id="tabel-pelanggan">
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

                                        <td class="text-center">
                                            <span class="font-w600 ">#<?php echo $value["id_pelanggan"] ?></span>
                                        </td>
                                        <td class="text-center">
                                            <?php $jumlah = 0; ?>
                                            <?php foreach ($layanan as $value1) { ?>
                                                <?php if ($value["id_pelanggan"] == $value1["id_pelanggan"]) { ?>
                                                    <?php $jumlah++ ?>
                                                    <span class="font-w600"><?php echo $jumlah . ". " . $value1["nama_layanan"] . '<br>' ?></span>
                                                <?php } ?>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <span class="font-w600"><?php echo $value["customer"] ?></span>
                                        </td>
                                        <?php if ($value["status"] == "Tidak Aktif") { ?>
                                            <td class="text-center"><span class="font-w600   btn-sm btn-block btn-danger "><i class="fa fa-fw fa-exclamation-circle"></i> <?php echo $value["status"] ?></span></td>
                                        <?php } else { ?>
                                            <td class="text-center"><span class="font-w600   btn-sm btn-block btn-success"><i class="fa fa-fw fa-check"></i> <?php echo $value["status"] ?></span></td>
                                        <?php } ?>
                                        <td class="text-center">
                                            <a href="" data-toggle="modal" data-target="#modal-block-large" id="<?php echo $value["id_pelanggan"] ?>" onclick="datapelanggan(this,'CS');"><button class="btn btn-light"><i class="fa fa-plus fa-2x"></i></button></a>
                                            <!-- <a class="text-decoration-none" href="" data-toggle="modal" data-target="#modal-block-large" id="<?php echo $value["id_pelanggan"] ?>" onclick="datapelanggan(this,'CS');">+ tiket</a> -->
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END pelanggan -->

        <!--report -->
            <div class="tab-pane fade fade-up" id="report" role="tabpanel">
                <div class="container-fluid">
                    <div class="block block-mode-loading-oneui">
                        <div class="block-header border-bottom ">
                            <h3 class="block-title text-primary">Report Staff</h3>
                        </div>
                        <button class="btn btn-primary search mt-3 ml-2 mr-4" data-toggle="click-ripple" id="button-report">Terapkan</button>
                        <button class="btn btn-outline-danger search mt-3 ml-1 mr-2" data-toggle="click-ripple" id="button-reset">Reset</button>
                        
                        <input type="text" class="js-datepicker form-control col-2 search  mt-3 ml-2 mr-4 search required" name="tgl-end" id="tgl-end" data-date-format="yyyy-mm-dd" data-week-start="0" data-autoclose="true" data-today-highlight="true" placeholder="Tanggal End">
                        
                        <h1 class="search"><i class="fa fa-minus mr-2"></i></h1>
                        
                        <input type="text" class="js-datepicker form-control col-2 search  mt-3 ml-2 mr-4 search required" name="tgl-start" id="tgl-start" data-date-format="yyyy-mm-dd" data-week-start="0" data-autoclose="true" data-today-highlight="true" placeholder="Tanggal Start">
                        
                        <input type="text" name="alamat-report" id="alamat-report" value="<?php echo base_url('index.php/home/searchreport/') . $employ_id . "/" ?>" hidden>
                        
                        <div class="block-content block-content-full" id="report-table">
                            <table class="table table-bordered table-hover table-vcenter font-size-sm mb-0">
                                <thead class="thead-dark">
                                    <tr class="text-uppercase">
                                        <th class="font-w700 text-center" style="width: 16%;">Nama</th>
                                        <th class="font-w700 text-center" style="width: 16%;">Departemen</th>
                                        <th class="font-w700 text-center" style="width: 16%;">Jabatan</th>
                                        <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 16%;">Request Tugas</th>
                                        <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 16%;">Selesai</th>
                                        <th class="font-w700 text-center" style="width:16%" ;>On Progress</th>
                                    </tr>
                                </thead>
                                <?php $data_report = [];
                                foreach ($report as $value){
                                    array_push($data_report, $value["nama"]);
                                }
                                    foreach ($employ_report as $value) { 
                                        if(!in_array($value["nama"], $data_report)){?>
                                        <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="font-w600"><?php echo $value["nama"] ?></span>
                                                    </td>
                                                    <td class="text-center" >
                                                        <span class="font-w600"><?php echo $value["nama_departemen"] ?></span>
                                                    </td>                                                    
                                                    <td class="text-center" >
                                                        <span class="font-w600"><?php echo $value["status_employ"] ?></span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="font-w600">0 Tugas</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="font-w600 text-success">0 Tugas</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="font-w600 text-danger">0 Tugas</span>
                                                    </td>
                                                </tr>
                                        </tbody>
                                    <?php }
                                    } ?>
                                <?php $employe = [];
                                foreach ($report as $value) { ?>
                                    <tbody>
                                        <?php foreach ($tugas_selesai as $value2) {
                                            if ($value2["nama"] == $value["nama"]) {
                                                array_push($employe, $value["nama"]); ?>
                                                <tr>
                                                    <td>
                                                        <span class="font-w600"><?php echo $value["nama"] ?></span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="font-w600"><?php echo $value["nama_dept_tujuan"] ?></span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="font-w600"><?php echo $value["status_employ"] ?></span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="font-w600"><?php echo $value["count(task.status)"] ?> Tugas</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="font-w600 text-success"><?php echo $value2["count(task.status)"] ?> Tugas</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="font-w600 text-danger"><?php echo $value["count(task.status)"] - $value2["count(task.status)"] ?> Tugas</span>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } ?>
                                    </tbody>
                                <?php } ?>
                                <?php foreach ($report as $value) { ?>
                                    <tbody>
                                        <?php foreach ($tugas_belum as $value2) {
                                            if ($value2["nama"] == $value["nama"] && !in_array($value["nama"], $employe)) {
                                                array_push($employe, $value["nama"]); ?>
                                                <tr>
                                                    <td>
                                                        <span class="font-w600"><?php echo $value["nama"] ?></span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="font-w600"><?php echo $value["nama_dept_tujuan"] ?></span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="font-w600"><?php echo $value["status_employ"] ?></span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="font-w600"><?php echo $value["count(task.status)"] ?> Tugas</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="font-w600 text-success"><?php echo $value["count(task.status)"] - $value2["count(task.status)"] ?> Tugas</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="font-w600 text-danger"><?php echo $value2["count(task.status)"] ?> Tugas</span>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } ?>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!-- END report-->
        <div class="tab-pane fade fade-up" id="tugas" role="tabpanel">
            <!-- Belum Selesai -->
            <div class="container-fluid">
                <div class="block block-mode-loading-oneui">
                    <div class="block-header border-bottom">
                        <h3 class="block-title text-danger">Tugas staff | Belum Selesai</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <table class="table table-bordered table-hover table-vcenter font-size-sm mb-0">
                            <thead class="thead-dark">
                                <tr class="text-uppercase">
                                    <th class="font-w700 text-center" style="width: 16%;"># ID Task</th>
                                    <th class="font-w700 text-center" style="width: 16%;">Ketua Task</th>
                                    <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 16%;">Departemen PJ</th>
                                    <th class="font-w700 text-center" style="width: 16%;">Sub Title Task</th>
                                    <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 16%;">Deadline</th>
                                    <th class="font-w700 text-center" style="width: 16%;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tasksaya as $valueparent) {
                                    if ($valueparent["status"] == "Belum Selesai") { ?>
                                        <tr>
                                            <td style="width: 10%;" rowspan="<?= $row ?>">
                                                <span class="font-w600">#<?php echo $valueparent["id_task"] ." ".$valueparent["title"] ?></span>
                                            </td>
                                            <td style="width: 10%;" rowspan="<?= $row ?>">
                                                <span class="font-w600"><?php echo $valueparent["nama"] ?></span>
                                            </td>
                                            <td style="width: 10%;" class="text-center">
                                                <span class="font-w600"><?php echo $valueparent["nama_dept_tujuan"] ?></span>
                                            </td>
                                            <td style="width: 10%;" class="text-center">
                                                <span class="font-w600">-</span>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-w700" style="width: 20%;">
                                                <span class="font-size-sm  "><?php echo $valueparent["dateline"] ?></span>
                                            </td>
                                            <td class="text-danger text-center" style="width: 15%;">
                                                <span class="font-w600   btn-sm btn-block btn-danger "><i class="fa fa-fw fa-exclamation-circle"></i> <?php echo $valueparent["status"] ?></span>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            <tbody>
                            <tbody>
                                <?php foreach ($taskparent as $valueparent) {
                                    $i = 1;
                                    $row_taskbelum = 1;
                                    foreach ($taskbelum as $value) {
                                        if ($valueparent["id_task"] == $value["id_parent"]) {
                                            $row_taskbelum += 1;
                                        }
                                    }
                                ?>
                                    <tr>
                                        <?php if ($row_taskbelum != 1) { ?>
                                            <td style="width: 10%;" rowspan="<?= $row_taskbelum ?>">
                                                <span class="font-w600">#<?php echo $valueparent["id_task"]." ".$valueparent["title"] ?></span>
                                            </td>
                                            <td style="width: 10%;" rowspan="<?= $row_taskbelum ?>">
                                                <span class="font-w600"><?php echo $valueparent["nama"] ?></span>
                                            </td>
                                            <td style="width: 10%;" class="text-center" rowspan="<?= $row_taskbelum ?>">
                                                <span class="font-w600"><?php echo $valueparent["nama_dept_tujuan"] ?></span>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                    <?php foreach ($taskbelum as $value) {
                                        if ($valueparent["id_task"] == $value["id_parent"]) { ?>
                                            <tr>
                                                <td style="width: 10%;">
                                                    <span class="font-w600"><?php echo $i . "." . $value["title"] ?></span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center font-w700" style="width: 20%;">
                                                    <span class="font-size-sm  "><?php echo $value["dateline"] ?></span>
                                                </td>
                                                <td class="text-danger text-center" style="width: 15%;">
                                                    <span class="font-w600   btn-sm btn-block btn-danger "><i class="fa fa-fw fa-exclamation-circle"></i> <?php echo $value["status"] ?></span>
                                                </td>
                                            </tr>
                                <?php $i += 1;
                                        }
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END Belum Selesai -->
            <!--  Selesai -->
            <div class="container-fluid">
                <div class="block block-mode-loading-oneui">
                    <div class="block-header border-bottom">
                        <h3 class="block-title text-success">Tugas Staff | Selesai</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <table class="table table-bordered table-hover table-vcenter font-size-sm mb-0">
                            <thead class="thead-dark">
                                <tr class="text-uppercase">
                                    <th class="font-w700 text-center" style="width: 16%;"># ID Task</th>
                                    <th class="font-w700 text-center" style="width: 16%;">Ketua Task</th>
                                    <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 16%;">Departemen PJ</th>
                                    <th class="font-w700 text-center" style="width: 16%;">Sub Title Task</th>
                                    <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 16%;">Deadline</th>
                                    <th class="font-w700 text-center" style="width: 16%;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tasksaya as $valueparent) {
                                    if ($valueparent["status"] == "Selesai") { ?>
                                        <tr>
                                            <td style="width: 10%;" `>
                                                <span class="font-w600">#<?php echo $valueparent["id_task"] ." ".$valueparent["title"]  ?></span>
                                            </td>
                                            <td style="width: 10%;" `>
                                                <span class="font-w600"><?php echo $valueparent["nama"] ?></span>
                                            </td>
                                            <td style="width: 10%;" class="text-center">
                                                <span class="font-w600"><?php echo $valueparent["nama_dept_tujuan"] ?></span>
                                            </td>
                                            <td style="width: 10%;" class="text-center">
                                                <span class="font-w600">-</span>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-w700" style="width: 20%;">
                                                <span class="font-size-sm  "><?php echo $valueparent["dateline"] ?></span>
                                            </td>
                                            <td class="text-danger text-center" style="width: 15%;">
                                                <span class="font-w600   btn-sm btn-block btn-success "><i class="fa fa-fw fa-check"></i> <?php echo $valueparent["status"] ?></span>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            <tbody>
                                <?php foreach ($taskparent as $valueparent) {
                                    $i = 1;
                                    $row_taskselesai = 1;
                                    foreach ($taskselesai as $value) {
                                        if ($valueparent["id_task"] == $value["id_parent"]) {
                                            $row_taskselesai += 1;
                                        }
                                    }
                                ?>
                                    <tr>
                                        <?php if ($row_taskselesai != 1) { ?>
                                            <td style="width: 10%;" rowspan="<?= $row_taskselesai ?>">
                                                <span class="font-w600">#<?php echo $valueparent["id_task"]." ".$valueparent["title"] ?></span>
                                            </td>
                                            <td style="width: 10%;" rowspan="<?= $row_taskselesai ?>">
                                                <span class="font-w600"><?php echo $valueparent["nama"] ?></span>
                                            </td>
                                            <td style="width: 10%;" class="text-center" rowspan="<?= $row_taskselesai ?>">
                                                <span class="font-w600"><?php echo $valueparent["nama_dept_tujuan"] ?></span>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                    <?php foreach ($taskselesai as $value) {
                                        if ($valueparent["id_task"] == $value["id_parent"]) { ?>
                                            <tr>
                                                <td style="width: 10%;">
                                                    <span class="font-w600"><?php echo $i . "." . $value["title"] ?></span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center font-w700" style="width: 20%;">
                                                    <span class="font-size-sm  "><?php echo $value["dateline"] ?></span>
                                                </td>
                                                <td class="text-danger text-center" style="width: 15%;">
                                                    <span class="font-w600   btn-sm btn-block btn-success "><i class="fa fa-fw fa-check"></i> <?php echo $value["status"] ?></span>
                                                </td>
                                            </tr>
                                <?php $i += 1;
                                        }
                                    }
                                } ?>
                            </tbody>
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
                        <table class="table table-bordered table-hover  table-vcenter font-size-sm mb-0">
                            <thead class="thead-dark">
                                <tr class="text-uppercase">
                                    <th class="font-w700 text-center" style="width: 16%;"># ID Task</th>
                                    <th class="font-w700 text-center" style="width: 16%;">Ketua Task</th>
                                    <th class="font-w700 text-center" style="width: 16%;">Sub Title Task</th>
                                    <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 16%;">Deadline</th>
                                    <th class="font-w700 text-center" style="width: 16%;">Status</th>
                                    <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 16%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tiketsaya as $value) {
                                    if ($value["status"] == "Belum Selesai" && $value["id_parent"]=="") { ?>
                                        <tr>
                                            <td style="width: 10%;" >
                                                <span class="font-w600">#<?php echo $value["id_task"]." ".$value["title"] ?></span>
                                            </td>
                                            <td style="width: 10%;" class="text-center">
                                                <span class="font-w600">-</span>
                                            </td>
                                            <td style="width: 10%;" class="text-center">
                                                <span class="font-w600">-</span>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-w700" style="width: 20%;">
                                                <span class="font-size-sm  "><?php echo $value["dateline"] ?></span>
                                            </td>
                                            <td class="text-danger text-center" style="width: 15%;">
                                                <span class="font-w600   btn-sm btn-block btn-danger "><i class="fa fa-fw fa-exclamation-circle"></i> <?php echo $value["status"] ?></span>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center" style="width: 15%;">
                                                <a class="link-fx font-weight-bold" href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] . "/Tiket" ?>" class="text-decoration-none">Buka</a>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            <tbody>
                            <tbody>
                                <?php foreach ($tiket as $value) {
                                    if ($value["status"] == "Belum Selesai" && $value["id_parent"]=="") { ?>
                                        <tr>
                                            <td style="width: 10%;" >
                                                <span class="font-w600">#<?php echo $value["id_task"]." ".$value["title"] ?></span>
                                            </td>
                                            <td style="width: 10%;" >
                                                <span class="font-w600"><?php echo $value["nama"] ?></span>
                                            </td>
                                            <td style="width: 10%;" class="text-center">
                                                <span class="font-w600">-</span>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-w700" style="width: 20%;">
                                                <span class="font-size-sm  "><?php echo $value["dateline"] ?></span>
                                            </td>
                                            <td class="text-danger text-center" style="width: 15%;">
                                                <span class="font-w600   btn-sm btn-block btn-danger "><i class="fa fa-fw fa-exclamation-circle"></i> <?php echo $value["status"] ?></span>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center" style="width: 15%;">
                                                <a class="link-fx font-weight-bold" href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] . "/Tiket" ?>" class="text-decoration-none">Buka</a>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            <tbody>
                            <tbody>
                                <?php foreach ($taskparent as $valueparent) {
                                    $i = 1;
                                    $row_tiketbelum = 1;
                                    foreach ($tiket as $value) {
                                        if ($valueparent["id_task"] == $value["id_parent"] && $value["status"] == "Belum Selesai") {
                                            $row_tiketbelum += 1;
                                        }
                                    }
                                ?>
                                    <tr>
                                        <?php if ($row_tiketbelum != 1) { ?>
                                            <td style="width: 10%;" rowspan="<?= $row_tiketbelum ?>">
                                                <span class="font-w600">#<?php echo $valueparent["id_task"] ?></span>
                                            </td>
                                            <td style="width: 10%;" rowspan="<?= $row_tiketbelum ?>">
                                                <span class="font-w600"><?php echo $valueparent["nama"] ?></span>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                    <?php foreach ($tiket as $value) {
                                        if ($valueparent["id_task"] == $value["id_parent"] && $value["status"] == "Belum Selesai") { ?>
                                            <tr>
                                                <td style="width: 10%;">
                                                    <span class="font-w600"><?php echo $i . "." . $value["title"] ?></span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center font-w700" style="width: 20%;">
                                                    <span class="font-size-sm  "><?php echo $value["dateline"] ?></span>
                                                </td>
                                                <td class="text-danger text-center" style="width: 15%;">
                                                    <span class="font-w600   btn-sm btn-block btn-danger "><i class="fa fa-fw fa-exclamation-circle"></i> <?php echo $value["status"] ?></span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center" style="width: 15%;">
                                                    <a class="link-fx font-weight-bold" href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] . "/Tiket" ?>" class="text-decoration-none">Buka</a>
                                                </td>
                                            </tr>
                                <?php $i += 1;
                                        }
                                    }
                                } ?>
                            </tbody>
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
                        <table class="table table-bordered table-hover table-vcenter font-size-sm mb-0">
                            <thead class="thead-dark">
                                <tr class="text-uppercase">
                                    <th class="font-w700 text-center" style="width: 16%;"># ID Task</th>
                                    <th class="font-w700 text-center" style="width: 16%;">Ketua Task</th>
                                    <th class="font-w700 text-center" style="width: 16%;">Sub Title Task</th>
                                    <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 16%;">Deadline</th>
                                    <th class="font-w700 text-center" style="width: 16%;">Status</th>
                                    <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 16%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tiket as $value) { 
                                    if ($value["status"] == "Selesai" && $value["id_parent"]=="") { ?>
                                        <tr>
                                            <td style="width: 10%;">
                                                <span class="font-w600">#<?php echo $value["id_task"] ?></span>
                                            </td>
                                            <td style="width: 10%;">
                                                <span class="font-w600"><?php echo $value["nama"] ?></span>
                                            </td>
                                            <td style="width: 10%;">
                                                <span class="font-w600"><?php echo $value["title"] ?></span>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-w700" style="width: 20%;">
                                                <span class="font-size-sm  "><?php echo $value["dateline"] ?></span>
                                            </td>
                                            <td class="text-danger text-center" style="width: 15%;">
                                                <span class="font-w600   btn-sm btn-block btn-success "><i class="fa fa-fw fa-check"></i> <?php echo $value["status"] ?></span>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center" style="width: 15%;">
                                                <a class="link-fx font-weight-bold" href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] . "/Tiket" ?>" class="text-decoration-none">Buka</a>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            <tbody>
                            <tbody>
                                <?php foreach ($taskparent as $valueparent) {
                                    $i = 1;
                                    $row = 1;
                                    foreach ($tiket as $value) {
                                        if ($valueparent["id_task"] == $value["id_parent"] && $value["status"] == "Selesai") {
                                            $row += 1;
                                        }
                                    }
                                ?>
                                    <tr>
                                        <?php if ($row != 1) { ?>
                                            <td style="width: 10%;" rowspan="<?= $row ?>">
                                                <span class="font-w600">#<?php echo $valueparent["id_task"] ?></span>
                                            </td>
                                            <td style="width: 10%;" rowspan="<?= $row ?>">
                                                <span class="font-w600"><?php echo $valueparent["nama"] ?></span>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                    <?php foreach ($tiket as $value) {
                                        if ($valueparent["id_task"] == $value["id_parent"] && $value["status"] == "Selesai") { ?>
                                            <tr>
                                                <td style="width: 10%;">
                                                    <span class="font-w600"><?php echo $i . "." . $value["title"] ?></span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center font-w700" style="width: 20%;">
                                                    <span class="font-size-sm  "><?php echo $value["dateline"] ?></span>
                                                </td>
                                                <td class="text-danger text-center" style="width: 15%;">
                                                    <span class="font-w600   btn-sm btn-block btn-success "><i class="fa fa-fw fa-check"></i> <?php echo $value["status"] ?></span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center" style="width: 15%;">
                                                    <a class="link-fx font-weight-bold" href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] . "/Tiket" ?>" class="text-decoration-none">Buka</a>
                                                </td>
                                            </tr>
                                <?php $i += 1;
                                        }
                                    }
                                } ?>
                            </tbody>
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
                    $('input[name="id_pelanggan"]').val(id_pelanggan);
                }
            });
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('index.php/home/get_layanan') ?>",
                dataType: "JSON",
                data: {
                    id: id_pelanggan
                },
                success: function(data) {
                    $("#layanan-pelanggan").empty();
                    for(i=0;i<data.length;i++){
                        $('#layanan-pelanggan').append(new Option(data[i]["nama_layanan"], data[i]["nama_layanan"])); 
                    }
                    $("#layanan_pelanggan").val(data.length);
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
                                <label for="layanan">Layanan</label>
                                <select name="layanan" id="layanan-pelanggan" class="form-control">

                                </select>
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
                                    <input type="text" class="js-datepicker form-control required" name="dateline" id="dateline" data-date-format="yyyy-mm-dd" data-week-start="0" data-autoclose="true" data-today-highlight="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control required js-summernote" name="deskripsi" id="deskripsi" rows="3" placeholder="Isi Deskripsi"></textarea>
                                <?= form_error('deskripsi', '<span class="text-danger">', '</span>') ?>
                            </div>
                            <div  style="float:right;margin-bottom:3%">
                                <button type="reset" class="btn btn-outline-danger mr-2">Reset</button>
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
                                    <option value="Developer">Developer</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Support">Support</option>
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
                                    <input type="text" class="js-datepicker form-control required" name="dateline" id="dateline" data-date-format="yyyy-mm-dd" data-week-start="0" data-autoclose="true" data-today-highlight="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control required js-summernote" name="deskripsi" id="deskripsi" rows="3" placeholder="Isi Deskripsi"></textarea>
                                <?= form_error('deskripsi', '<span class="text-danger">', '</span>') ?>
                            </div>

                            
                    </div>
                    
                    <div style="float:right;margin-bottom:3%">
                        <button type="reset" class="btn btn-outline-danger mr-2">Reset</button>

                        <button type="submit" class="btn btn-primary mr-4">Buat</button>

                    </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- akhir pop up tiket staff -->
    <!-- Footer -->
    <footer id="page-footer" class="bg-body-light">
        <div class="content py-3">
            <div class="row font-size-sm">
                <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-right">
                    Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="" target="_blank">ARMTEAM</a>
                </div>
                <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
                    <a class="font-w600" href="https://1.envato.market/xWy" target="_blank">Gink Technology x ARMTEAM</a> &copy; <span data-toggle="year-copy"></span>
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->


    <script src="<?php echo base_url('assets/oneui/js/oneui.core.min.js') ?>"></script>

    <!-- validasi form -->
    <script src="<?php echo base_url('assets/oneui/js/plugins/jquery-validation/jquery.validate.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $("#form-staff").validate();
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#form-tiket").validate();
        });
    </script>
    <!-- akhir validasi form -->

   
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


    <!-- Page JS Plugins -->
    <script src="<?php echo base_url('assets/oneui/js/plugins/summernote/summernote-bs4.min.js') ?>"></script>
    <!-- Page JS Helpers (Summernote + CKEditor + SimpleMDE plugins) -->
    <script>
        jQuery(function() {
            One.helpers(['summernote']);
        });
    </script>

<!-- 
                            script atur summernote height di buat tiket pelanggan -->
                            <script type='text/javascript'>//<![CDATA[ 
                            $(function(){
                            $('#deskripsi').summernote({height: 200});
                                          
                            });//]]>  
                            </script>
                            <!-- akhir -->

</body>

</html>