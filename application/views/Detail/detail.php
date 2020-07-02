<!DOCTYPE html>
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
    <link rel="stylesheet" href="<?php echo base_url('assets/js/plugins/sweetalert2/sweetalert2.min.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/oneui/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') ?>">

    <!-- Fonts and OneUI framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
    <link rel="stylesheet" id="css-main" href="<?php echo base_url('assets/oneui/css/oneui.min.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/oneui/js/plugins/summernote/summernote-bs4.css') ?>">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>
    <!-- Right Section -->
    <!-- Home button -->
    <?php if ($employ_dept == "ceo") {
        $linkhome = base_url('index.php/home/ceo/') . $username;
    } else {
        $linkhome = base_url('index.php/home/index/') . $username;
    } ?>
    <div class="ml-4" style="float:left;">
        <a class="btn btn-sm btn-dual" href="<?php echo $linkhome ?>">
            <img class="rounded" src="<?php echo base_url('assets/oneui/media/avatars/home.png') ?>" alt="Header Avatar" style="width: 18px;">
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
        <div class="bg-image overflow-hidden" style="background-image: url('http://localhost/crm-gink/assets/oneui/media/photos/photo3@2x.jpg');">
            <div class="bg-primary-dark-op">
                <div class="content content-narrow content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                        <div class="flex-sm-fill">
                            <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Detail Tiket</h1>

                            <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Selamat Datang , <?php echo $employ_nama ?></h2>

                            <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250"><?php echo $status . " " . $nama_dept ?> di Gink Technology</h2>
                        </div>
                        <?php if ($cekTabel == 'Request') { ?>
                            <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                                <span class="d-inline-block invisible" data-toggle="appear" data-timeout="350">
                                    <a class="btn btn-primary px-4 py-2" class="p-2 bg-primary text-white text-decoration-none tiket" data-toggle="modal" data-target="#modal-block-large-sub-tiket" href="">
                                        <i class="fa fa-plus mr-1"></i> Buat Sub Tiket
                                    </a>
                                </span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->
    </main>
    <!-- END Main Container -->



    <!-- Page Content -->
    <div class="content">
        <!-- Discussion -->
        <!-- Tampilan Detail Tugas secara umum -->
        <div class="block col-10 mx-auto mb-5 mt-2">
            <div class="block-header block-header-default ">
                <h3 class="block-title dark ">Hallo <?php echo $employ_nama ?> , berikut isi Detail Tasknya</h3>
            </div>
            <div class="block-content">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="d-none d-sm-table-cell text-center" rowspan="11" style="width: 15%;">
                                <p>Pengirim</p>
                                <p>
                                    <a>
                                        <img class="img-avatar " src="<?php echo base_url('assets/oneui/media/avatars/avatar7.jpg') ?>" alt="">
                                    </a>
                                </p>
                                <p class="font-size-sm "><?php echo $nama_kirim . " (" . $task["nama_dept_kirim"] . ")" ?></p>
                            </td>
                            <td class="font-weight-bold mt-2" width="15%">Title</td>
                            <td width="70%">: <?php echo $task["title"] ?> </td>
                        </tr>
                        <!-- <tr>
                            <td class="font-weight-bold">Nama Pengirim</td>
                            <td>: <?php echo $nama_kirim . " (" . $task["nama_dept_kirim"] . ")" ?></td>
                        </tr> -->
                        <?php if ($task["customer"] != NULL) { ?>
                            <tr>
                                <td class="font-weight-bold">Customer</td>
                                <td>: <?= $task["customer"] ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Layanan Customer</td>
                                <td>: <?= $task["nama_layanan"] ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td class="font-weight-bold">Departemen Tujuan</td>
                            <td>: <?php echo $task["nama_dept_tujuan"] ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Deadline</td>
                            <td>: <?php echo $task["dateline"] ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Status Task</td>
                            <?php if ($task["status"] == "Belum Selesai") { ?>
                                <td><span class=" font-w600 btn-sm btn-block btn-danger col-3"><i class="fa fa-fw fa-exclamation-circle"></i> <?php echo $task["status"] ?></span></td>
                            <?php } else { ?>
                                <td><span class="font-w600 btn-sm btn-block btn-success col-3"><i class="fa fa-fw fa-check"></i> <?php echo $task["status"] ?></span></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td class="font-weight-bold  ">Deskripsi Task</td>
                            <td>
                                <p>: <?php echo $task["deskripsi"] ?></p>
                            </td>
                        </tr>
                        <tr>
                            <!-- keterangan == Request, setting tampilan head departemen -->
                            <?php if ($cekTabel == 'Request') { ?>
                                <td class="font-weight-bold ">Penanggung Jawab</td>
                                <td>
                                    <form method="post" action="<?php echo base_url('index.php/detail/ubahPJ/' . $employ_id . '/' . $task['id_task']) ?>">
                                        : <?php $isi = $PJ_task['id_employ_tujuan'] ?>
                                        <!-- jika PJ task == null, add selection untuk pilih PJ task -->
                                        <?php if ($isi != null) {
                                            echo $namaPJ . "(" . $dept_PJtask . ")";
                                        } else { ?>
                                            <select name="PJbaru" id="PJbaru" class="btn btn-light dropdown-toggle">
                                                <option disabled selected> Belum ada </option>
                                                <?php
                                                $employe = [];
                                                // load data semua employ pada dept, dan jumlah task yang dipegang
                                                foreach ($tugas_employ as $value) {
                                                    foreach ($semua_employ as $value2) {
                                                        if ($value2["nama"] == $value["nama"]) {
                                                            if (!in_array($value["nama"], $employe)) {
                                                                array_push($employe, $value["nama"]);
                                                            }
                                                ?>
                                                            <option value="<?= $value["id_employ_tujuan"] ?>"><?php echo $value["nama"] . " | " . $value["count(task.status)"] ?></option>
                                                        <?php }
                                                    }
                                                }
                                                // load data semua employ pada dept, jika task pada PJ==0
                                                foreach ($semua_employ as $value2) {
                                                    if (!in_array($value2["nama"], $employe)) { ?>
                                                        <option value="<?= $value2["id_employ"] ?>"><?php echo $value2["nama"] . " | 0" ?></option>
                                                <?php }
                                                }
                                                ?>
                                            </select>
                                            </br>
                                            </br>
                                            <div class="row items-push text-center text-sm-left mb-4 mr-10 mt-2" style="float:right;margin-bottom:3%">
                                                <div class="col-sm-6 col-xl-4 ">
                                                    <input type="submit" value="Simpan" class="btn btn-primary" data-toggle="click-ripple"></input>
                                                </div>
                                            <?php } ?>
                                    </form>
                                </td>
                            <?php } else if (($cekTabel == 'TugasBelum' || $status == "staff" || $task["id_parent"] != NULL) && (count($subtask) == 0) && $cekTabel != 'Tiket' && $cekTabel != 'TugasSelesai') { ?>
                                <?php echo form_open_multipart('index.php/detail/insertLaporan/' . $employ_id . '/' . $task['id_task']); ?>
                                <td class="font-weight-bold">Berkas (opsional)</td>
                                <td>
                                    : <input type="file" name="file">
                                    <div class="block-content block-content-full text-right border-top mt-5">
                                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-sm btn-primary" value="Selesai">
                                    </div>
                                </td>
                                <?php echo form_close(); ?>
                            <?php } else if ($cekTabel == 'TugasSelesai' && $task["id_parent"] != NULL && $cekTabel != 'Tiket' && $cekTabel != 'TugasBelum' || (count($subtask) == 0 && $task["id_parent"] == NULL && $cekTabel != 'Tiket' && $cekTabel != 'TugasBelum')) { ?>
                                <?php echo form_open_multipart('index.php/detail/insertLaporan/' . $employ_id . '/' . $task['id_task']); ?>
                                <td class="font-weight-bold">Berkas (opsional)</td>
                                <td>
                                    :
                                    <?php if ($task['berkas'] != null) { ?>
                                        <a href="<?= base_url('upload/') . $task['berkas'] ?>"><?= $task['berkas'] ?></a>
                                        </br>
                                    <?php } ?>
                                    <input type="file" name="file">
                                    </br>
                                    <input type="submit" value="Simpan">
                                </td>
                                <?php echo form_close(); ?>
                            <?php } ?>
                        </tr>
                        <?php if ($cekTabel == 'Tiket') { ?>
                            <tr>
                                <td class="font-weight-bold">Penanggung Jawab</td>
                                <td>
                                    : <?= $namaPJ . " (" . $dept_PJtask . ")" ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Waktu Selesai</td>
                                <td>
                                    :
                                    <?php if ($task['status'] == 'Belum Selesai') {
                                        echo '-';
                                    } ?>
                                    <?= $task['waktu_selesai'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold  ">Berkas</td>
                                <td>
                                    :
                                    <?php if ($task['berkas'] == null) {
                                        echo '-';
                                    } ?>
                                    <a href="<?= base_url('upload/') . $task['berkas'] ?>"><?= $task['berkas'] ?></a>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php if ($cekTabel == "Request" && count($subtask) != 0) { ?>
                            <!-- tabel sub task -->
                            <div class="container-fluid">
                                <table class="table table-bordered table-hover table-vcenter font-size-sm mb-0">
                                    <thead>
                                        <tr>
                                            <td colspan="6">
                                                <?php $color = "bg-success";
                                                $progres = count($subtaskselesai) / count($subtask) * 100;
                                                if ($progres < 80) {
                                                    $color = "bg-warning";
                                                }
                                                if ($progres < 30) {
                                                    $color = "bg-danger";
                                                }

                                                ?>
                                                <h4>Progress Task</h4>
                                                <div class="progress push">
                                                    <div class="progress-bar <?php echo $color ?>" role="progressbar" style="width: <?php echo (count($subtaskselesai) / count($subtask)) * 100 ?>%;" aria-valuenow="<?php echo (count($subtaskselesai) / count($subtask)) * 100 ?>%" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="font-size-sm font-w600"><?php echo (count($subtaskselesai) / count($subtask)) * 100 ?>%</span>
                                                    </div>
                                                </div>

                                                <?php if ($progres == 100 && $task['status'] == 'Belum Selesai') { ?>
                                                    <a class="btn btn-success" class="bg-success text-white text-decoration-none" href="<?php echo base_url('index.php/detail/ubahstatustask/' . $employ_id . '/' . $task['id_task']) ?>" style="float:right">
                                                        <i class="fa fa-fw fa-check"></i> Konfirmasi Selesai
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </thead>
                                    <thead class="thead-dark">
                                        <tr class="text-uppercase">
                                            <th class="font-w700 text-center" style="width: 12%;"># ID Sub Task</th>
                                            <th class="font-w700 text-center" style="width: 16%;">Title Sub Task</th>
                                            <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 10%;">Penanggung Jawab</th>
                                            <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 16%;">Deadline</th>
                                            <th class="font-w700 text-center" style="width: 16%;">Status</th>
                                            <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 16%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($subtask as $value) { ?>
                                        <tbody>
                                            <tr>
                                                <td class="text-center" style="width: 10%;">
                                                    <span class="font-w600">#<?php echo $value["id_task"] ?></span>
                                                </td>
                                                <td style="width: 25%;">
                                                    <span class="font-w600"><?php echo $value["title"] ?></span>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="font-w600"><?php echo $value["nama"] ?></span>
                                                </td>
                                                <td class="text-center font-w700" style="width: 20%;">
                                                    <span class="font-size-sm  "><?php echo $value["dateline"] ?></span>
                                                </td>
                                                <?php if ($value["status"] == "Belum Selesai") { ?>
                                                    <td class="text-danger text-center" style="width: 15%;">
                                                        <span class="font-w600   btn-sm btn-block btn-danger "><i class="fa fa-fw fa-exclamation-circle"></i> <?php echo $value["status"] ?></span>
                                                    </td>
                                                <?php } else { ?>
                                                    <td class="text-danger text-center" style="width: 15%;">
                                                        <span class="font-w600   btn-sm btn-block btn-success "><i class="fa fa-fw fa-check"></i> <?php echo $value["status"] ?></span>
                                                    </td>
                                                <?php } ?>
                                                <td class="d-none d-sm-table-cell text-center" style="width: 10%;">
                                                    <a class="link-fx font-weight-bold" href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] . "/Tiket" ?>" class="text-decoration-none">Buka</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>
                                </table>

                            </div>
                            <!-- END tabel sub task -->
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Discussion -->
    </div>
    <!-- END Page Content -->
    <!-- ADD Komentar -->
    <div class="block col-10 mx-auto mb-5 mt-2">
        <div class="block-header block-header-default bg-dark ">
            <h3 class="block-title text-gray-lighter ml-3 pt-2 pb-2">Komentar / Catatan</h3>
            <div class="block-options">
                <a class="btn-block-option mr-2 text-gray-lighter" href="#forum-reply-form " data-toggle="scroll-to">
                    <i class="fa fa-reply mr-1  "> </i> Reply
                </a>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-borderless">
                <tbody>
                    <!-- untuk ID parent=null / tidak punya sub task -->
                    <?php if ($task["id_parent"] == null) { ?>
                        <?php foreach ($komentar as $value) { ?>
                            <tr class="table-active">
                                <td class="d-none d-sm-table-cell"></td>
                                <td class="font-size-md text-muted">
                                    <!-- Menampilkan nama pengirim komentar dan tanggal kirim komentarnya -->
                                    <a href=""><?= $value["nama_kirim_komen"] ?></a> on <em><?= $value["tanggal_komen"] ?></em>
                                    <!-- Jika user == pengirim komentar, tampilkan button delete komentar -->
                                    <?php if ($employ_nama == $value["nama_kirim_komen"]) { ?>
                                        <form action="<?php echo base_url('index.php/detail/deletekomen/') . $task["id_task"] . "/" . $employ_id . "/" . $cekTabel . "/" . $value["id_komentar"] ?>" method="POST">
                                            <button class="btn btn-sm btn-danger" data-toggle="click-ripple" type="submit">Delete</button>
                                        </form>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-none d-sm-table-cell text-center" style="width: 140px;">
                                    <p>
                                        <a href="">
                                            <img class="img-avatar" src="<?php echo base_url('assets/oneui/media/avatars/avatar7.jpg') ?>" alt="">
                                        </a>
                                    </p>
                                    <p class="font-size-sm"><?= $value["nama_kirim_komen"] ?><br><?= $value["nama_dept_komen"] ?></p>
                                </td>
                                <td>
                                    <p><?= $value["komentar"] ?></p>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <!-- untuk ID parent!=null / memiliki sub task -->
                        <?php foreach ($komentarsub as $value) { ?>
                            <tr class="table-active">
                                <td class="d-none d-sm-table-cell"></td>
                                <td class="font-size-md text-muted">
                                    <!-- Menampilkan nama pengirim komentar dan tanggal kirim komentarnya -->
                                    <a href=".html"><?= $value["nama_kirim_komen"] ?></a> on <em><?= $value["tanggal_komen"] ?></em>
                                    <?php if ($employ_nama == $value["nama_kirim_komen"]) { ?>
                                        <!-- Jika user == pengirim komentar, tampilkan button delete komentar -->
                                        <form action="<?php echo base_url('index.php/detail/deletekomen/') . $task["id_task"] . "/" . $employ_id . "/" . $cekTabel . "/" . $value["id_komentar"] ?>" method="POST">
                                            <button class="btn btn-sm btn-danger" data-toggle="click-ripple" type="submit">Delete</button>
                                        </form>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-none d-sm-table-cell text-center" style="width: 140px;">
                                    <p>
                                        <a href="be_pages_generic_profile.html">
                                            <img class="img-avatar" src="<?php echo base_url('assets/oneui/media/avatars/avatar7.jpg') ?>" alt="">
                                        </a>
                                    </p>
                                    <!-- menampilkan nama pengirim komentar dan nama departemen pengirim komentar -->
                                    <p class="font-size-sm"><?= $value["nama_kirim_komen"] ?><br><?= $value["nama_dept_komen"] ?></p>
                                </td>
                                <td>
                                    <p><?= $value["komentar"] ?></p>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>

                    <tr class="table-active" id="forum-reply-form">
                        <td class="d-none d-sm-table-cell"></td>
                        <td class="font-size-sm text-muted">
                            <a href="be_pages_generic_profile.html"></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="d-none d-sm-table-cell text-center">
                            <p>
                                <a href="">
                                    <img class="img-avatar" src="<?php echo base_url('assets/oneui/media/avatars/avatar10.jpg') ?>" alt="">
                                </a>
                            </p>
                            <p class="font-size-sm"><?= $employ_nama ?><br><?= $nama_dept ?></p>
                        </td>
                        <td>
                            <form action="<?php echo base_url('index.php/detail/addkomen/') . $task["id_task"] . "/" . $employ_nama . "/" . $employ_id . "/" . $cekTabel . "/" . $nama_dept ?>" method="POST">
                                <div class="form-group">
                                    <!-- CKEditor (js-ckeditor id is initialized in Helpers.ckeditor()) -->
                                    <!-- For more info and examples you can check out http://ckeditor.com -->
                                    <textarea id="js-ckeditor" name="komentar"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-reply mr-1"></i> Reply
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Discussion -->
    </div>
    <!-- END Page Content -->

    </main>
    <!-- END Main Container -->

    <!-- pop up tiket staff -->
    <!-- Membuat sub tiket -->
    <div class="modal fade" id="modal-block-large-sub-tiket" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Buat Sub Tiket</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content font-size-sm mt-3 text-justify ">
                        <h4>Isi Data Dibawah Ini dengan Lengkap untuk Membuat Sub Tiket</h4>
                        <!-- FORM add subtiket dengan parameter id employ, id task, status tabel -->
                        <form action="<?php echo base_url('index.php/detail/addsubtiket/') . $employ_id . "/" . $task["id_task"] . "/" . $cekTabel ?>" method="POST" id="form-staff">
                            <input type="text" name="id_parent" value="<?php echo $task["id_task"] ?>" hidden>

                            <div class="form-group">
                                <label for="title">Judul Parent Task</label>
                                <input type="text" class="form-control required" name="title" id="title" value="<?php echo $task["title"] ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="title">Judul Sub Task</label>
                                <input type="text" class="form-control required" name="title" id="title" placeholder="Judul/Subject">
                            </div>
                            <!-- Add pj sub task -->
                            <div class="form-group">
                                <label for="PJsubtask">Penanggung Jawab Sub Task</label></br>
                                <select name="PJsubtask" id="PJsubtask" class="btn btn-secondary dropdown-toggle">
                                    <option disabled selected> Belum ada </option>
                                    <?php
                                    $employe = [];
                                    //load data employ dengan jumlah task yang dipegang > 0
                                    foreach ($tugas_employ as $value) {
                                        foreach ($semua_employ as $value2) {
                                            if ($value2["nama"] == $value["nama"]) {
                                                if (!in_array($value["nama"], $employe)) {
                                                    array_push($employe, $value["nama"]);
                                                }
                                    ?>
                                                <option value="<?= $value["id_employ_tujuan"] ?>"><?php echo $value["nama"] . " | " . $value["count(task.status)"] ?></option>
                                            <?php }
                                        }
                                    }
                                    //load data employ dengan jumlah task yang dipegang == 0
                                    foreach ($semua_employ as $value2) {
                                        if (!in_array($value2["nama"], $employe)) { ?>
                                            <option value="<?= $value2["id_employ"] ?>"><?php echo $value2["nama"] . " | 0" ?></option>
                                    <?php }
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- atur deadline menggunakan datepicker -->
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
                                <textarea class="form-control required js-summernote" name="deskripsi" id="deskripsi" rows="3" placeholder="Isi Deskripsi"></textarea>
                            </div>
                            <div style="float:right;margin-bottom:3%">
                                <button type="reset" class="btn btn-outline-warning mr-2">Reset</button>
                                <button type="submit" class="btn btn-primary">Buat</button>
                            </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- akhir pop up tiket staff -->

    <script src="<?php echo base_url('assets/oneui/js/oneui.core.min.js') ?>"></script>
    <!--
            OneUI JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
    <script src="<?php echo base_url('assets/oneui/js/oneui.app.min.js') ?>"></script>

    <!-- Page JS Plugins -->
    <script src="<?php echo base_url('assets/oneui/js/plugins/es6-promise/es6-promise.auto.min.js') ?>"></script>


    <!-- Page JS Code -->
    <script src="<?php echo base_url('assets/oneui/js/pages/be_comp_dialogs.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/oneui/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
    <!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider plugins) -->
    <script>
        jQuery(function() {
            One.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider']);
        });
    </script>


    <!-- Page JS Plugins -->
    <script src="<?php echo base_url('assets/oneui/js/plugins/summernote/summernote-bs4.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/oneui/js/plugins/ckeditor/ckeditor.js') ?>"></script>

    <!-- Page JS Helpers (CKEditor plugin) -->
    <script>
        jQuery(function() {
            One.helpers(['ckeditor', 'summernote']);
        });
    </script>

    <!-- Page JS Helpers (Summernote + CKEditor + SimpleMDE plugins) -->

</body>

</html>