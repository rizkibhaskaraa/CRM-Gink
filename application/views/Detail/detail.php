<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Detail Tiket - Task Manager </title>

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->

    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url('assets/oneui/media/favicons/favicon-192x192.png') ?>">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url('assets/js/plugins/sweetalert2/sweetalert2.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/oneui/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') ?>">
    <!-- Fonts and OneUI framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
    <link rel="stylesheet" id="css-main" href="<?php echo base_url('assets/oneui/css/oneui.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/oneui/js/plugins/summernote/summernote-bs4.css') ?>">
    <!-- END Stylesheets -->
</head>

<body>
    <!-- Right Section -->
    <!-- Home button -->
    <?php if ($status == "C-Level") {
        $linkhome = base_url('index.php/home/ceo/') . $username;
    } else {
        $linkhome = base_url('index.php/home/index/') . $username;
    } ?>
    <div class="ml-5" style="float:left;">
        <a class="btn btn-sm btn-dual" href="<?php echo $linkhome ?>">
            <img class="rounded" src="<?php echo base_url('assets/oneui/media/avatars/home.png') ?>" alt="Header Avatar" style="width: 18px;">
            <span class="ml-2">Home</span>
        </a>
    </div>
    <!-- end home button -->
    <div class="col-md-2 ml-auto px-4">
        <!-- User Dropdown -->
        <div class="dropdown d-inline-block">
            <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded" src="<?php echo base_url('assets/oneui/media/avatars/avatar10.jpg') ?>" alt="Header Avatar" style="width: 18px;">
                <span class="d-none d-sm-inline-block"><?php echo $employ_nama ?> </span>
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

                            <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250"><?php echo $position ?> di Gink Technology</h2>
                        </div>
                        <?php if ($cekTabel == 'Request' || ($cekTabel == "TugasBelum" && count($subtask) != 0) || ($cekTabel == "TugasSelesai" && count($subtask) != 0)) { ?>
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
                                <p class="font-size-sm "><?php echo $nama_kirim . " (" . $task["department_name"] . ")" ?></p>
                            </td>
                            <td class="font-weight-bold mt-2" style="width: 20%;">Title</td>
                            <td width="70%"><?php echo $task["task_title"] ?> </td>
                        </tr>
                        <?php if ($task["service_id"] != NULL) { ?>
                            <tr>
                                <td class="font-weight-bold" style="width: 20%;">Customer</td>
                                <td><?= $customer ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold" style="width: 20%;">Layanan Customer</td>
                                <td><?= $nama_layanan ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td class="font-weight-bold" style="width: 20%;">Departemen Tujuan</td>
                            <td><?php echo $department_destination ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="width: 20%;">Deadline</td>
                            <td><?php echo $task["task_dateline"] ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" style="width: 20%;">Status Task</td>
                            <?php if ($task["task_status"] == "Not Finished") { ?>
                                <td><span class=" font-w600 btn-sm btn-block btn-danger col-3"><i class="fa fa-fw fa-exclamation-circle"></i> <?php echo $task["task_status"] ?></span></td>
                            <?php } else { ?>
                                <td><span class="font-w600 btn-sm btn-block btn-success col-3"><i class="fa fa-fw fa-check"></i> <?php echo $task["task_status"] ?></span></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td class="font-weight-bold " style="width: 20%;">Deskripsi Task</td>
                            <td>
                                <p><?php echo $task["task_description"] ?></p>
                            </td>
                        </tr>
                        <tr>
                            <!-- keterangan == Request, setting tampilan head departemen -->
                            <?php if ($cekTabel == 'Request') { ?>
                                <td class="font-weight-bold" style="width: 20%;">Penanggung Jawab</td>
                                <td>
                                    <form method="post" action="<?php echo base_url('index.php/detail/ubahPJ/' . $employ_id . '/' . $task['task_id'] . '/' . $department_user) ?>">
                                        <?php $isi = $PJ_task['employee_destination'] ?>
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
                                                        if ($value2["employee_name"] == $value["employee_name"]) {
                                                            if (!in_array($value["employee_name"], $employe)) {
                                                                array_push($employe, $value["employee_name"]);
                                                            }
                                                ?>
                                                            <option value="<?= $value["employee_destination"] ?>"><?php echo $value["employee_name"] . " | " . $value["count(tm_task.task_status)"] ?></option>
                                                        <?php }
                                                    }
                                                }
                                                // load data semua employ pada dept, jika task pada PJ==0
                                                foreach ($semua_employ as $value2) {
                                                    if (!in_array($value2["employee_name"], $employe)) { ?>
                                                        <option value="<?= $value2["employee_id"] ?>"><?php echo $value2["employee_name"] . " | 0" ?></option>
                                                <?php }
                                                }
                                                ?>
                                            </select>
                                            </br>
                                            </br>
                                            <div style="float:right;">
                                                <input type="submit" value="Simpan" class="btn btn-primary" data-toggle="click-ripple"></input>
                                            </div>
                                        <?php } ?>
                                    </form>
                                </td>
                            <?php } else if (($cekTabel == 'TugasBelum' || $status == "staff" || $task["task_parent"] != NULL) && (count($subtask) == 0) && $cekTabel != 'Tiket' && $cekTabel != 'TugasSelesai') { ?>
                                <?php echo form_open_multipart('index.php/detail/insertLaporan/' . $employ_id . '/' . $task['task_id']); ?>
                                <td class="font-weight-bold" style="width: 20%;">Berkas (opsional)</td>
                                <td>
                                    <input type="file" name="file">
                                    <div class="mt-5" style="float:right;">
                                        <input type="submit" class="btn btn-primary" value="Selesai">
                                    </div>
                                </td>
                                <?php echo form_close(); ?>
                            <?php } else if ($cekTabel == 'TugasSelesai' && $task["task_parent"] != NULL && $cekTabel != 'Tiket' && $cekTabel != 'TugasBelum' || (count($subtask) == 0 && $task["task_parent"] == NULL && $cekTabel != 'Tiket' && $cekTabel != 'TugasBelum') || (count($subtask) != 0 && $task["task_status"]=="Finish" && $cekTabel != 'Tiket' && $cekTabel != 'TugasBelum')) { ?>
                                <?php echo form_open_multipart('index.php/detail/insertLaporan/' . $employ_id . '/' . $task['task_id']); ?>
                                <td class="font-weight-bold" style="width: 20%;">Berkas (opsional)</td>
                                <td>
                                    <?php if ($task['task_file'] != null) { ?>
                                        <a href="<?= base_url('upload/') . $task['task_file'] ?>"><?= $task['task_file'] ?></a>
                                        </br>
                                    <?php } ?>
                                    <input type="file" name="file">
                                    </br>
                                    <div>
                                        <input class="btn btn-primary mt-5" style="float:right;" type="submit" value="Simpan">
                                    </div>

                                </td>
                                <?php echo form_close(); ?>
                            <?php } ?>
                        </tr>
                        <?php if ($cekTabel == 'Tiket') { ?>
                            <tr>
                                <td class="font-weight-bold" style="width: 20%;">Penanggung Jawab</td>
                                <td>
                                    <?= $namaPJ . " (" . "$dept_PJtask" . ")" ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold" style="width: 20%;">Waktu Selesai</td>
                                <td>
                                    <?php if ($task['task_status'] == 'Not Finished') {
                                        echo '-';
                                    } ?>
                                    <?= $task['task_finish'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold" style="width: 20%;">Berkas</td>
                                <td>
                                    <?php if ($task['task_file'] == null) {
                                        echo '-';
                                    } ?>
                                    <a href="<?= base_url('upload/') . $task['task_file'] ?>"><?= $task['task_file'] ?></a>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php if (($cekTabel == "Request" && count($subtask) != 0) || ($cekTabel == "TugasBelum" && count($subtask) != 0) || ($cekTabel == "TugasSelesai" && count($subtask) != 0)) { ?>
                            <!-- tabel sub task -->
                            <div class="container-fluid">
                                <table class="table table-bordered table-hover table-vcenter font-size-sm mb-0">
                                    <thead>
                                        <tr>
                                            <td colspan="4">
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
                                                <?php if ($progres == 100 && $task['task_status'] == 'Not Finished') { ?>
                                                    <?php echo form_open_multipart('index.php/detail/ubahstatustask/' . $designation . "/" . $employ_id . '/' . $task['task_id'] . "/" . $status); ?>
                                            <td class="font-weight-bold" style="width: 20%;">Berkas (opsional)</td>
                                            <td>
                                                <input type="file" name="file">
                                                <div class="mt-5" style="float:right;">
                                                    <input type="submit" class="btn btn-success" value="Konfirmasi Selesai">
                                                </div>
                                            </td>
                                            <?php echo form_close(); ?>
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
                                                    <span class="font-w600">#<?php echo $value["task_id"] ?></span>
                                                </td>
                                                <td style="width: 25%;">
                                                    <span class="font-w600"><?php echo $value["task_title"] ?></span>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="font-w600"><?php echo $value["employee_name"] ?></span>
                                                </td>
                                                <td class="text-center font-w700" style="width: 20%;">
                                                    <span class="font-size-sm  "><?php echo $value["task_dateline"] ?></span>
                                                </td>
                                                <?php if ($value["task_status"] == "Not Finished") { ?>
                                                    <td class="text-danger text-center" style="width: 15%;">
                                                        <span class="font-w600   btn-sm btn-block btn-danger "><i class="fa fa-fw fa-exclamation-circle"></i> <?php echo $value["task_status"] ?></span>
                                                    </td>
                                                <?php } else { ?>
                                                    <td class="text-danger text-center" style="width: 15%;">
                                                        <span class="font-w600   btn-sm btn-block btn-success "><i class="fa fa-fw fa-check"></i> <?php echo $value["task_status"] ?></span>
                                                    </td>
                                                <?php } ?>
                                                <td class="d-none d-sm-table-cell text-center" style="width: 10%;">
                                                    <a class="link-fx font-weight-bold" href="<?php echo base_url('index.php/home/detail/') . $designation . "/" . $employ_id . "/" . $value['task_id'] . "/" . $status . "/Tiket" ?>" class="text-decoration-none">Buka</a>
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
                    <?php if ($task["task_parent"] == null) { ?>
                        <?php foreach ($komentar as $value) { ?>
                            <tr class="table-active">
                                <td class="d-none d-sm-table-cell"></td>
                                <td class="font-size-md text-muted">
                                    <!-- Menampilkan nama pengirim komentar dan tanggal kirim komentarnya -->
                                    <a href=""><?= $value["employee_name"] ?></a> on <em><?= $value["comment_date"] ?></em>
                                    <!-- Jika user == pengirim komentar, tampilkan button delete komentar -->
                                    <?php if ($employ_id == $value["employee_id"]) { ?>
                                        <form action="<?php echo base_url('index.php/detail/deletekomen/') . $designation . "/" . $employ_id . "/" . $task["task_id"] .  "/" . $status . "/" . $cekTabel . "/" . $value["comment_id"]  ?>" method="POST">
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
                                    <p class="font-size-sm"><?= $value["employee_name"] ?><br><?= "(" . $value["position_name"] . ")" ?></p>
                                </td>
                                <td>
                                    <p><?= $value["comment_description"] ?></p>
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
                                    <a href=".html"><?= $value["employee_name"] ?></a> on <em><?= $value["comment_date"] ?></em>
                                    <?php if ($employ_nama == $value["employee_name"]) { ?>
                                        <!-- Jika user == pengirim komentar, tampilkan button delete komentar -->
                                        <form action="<?php echo base_url('index.php/detail/deletekomen/') . $designation . "/" . $employ_id . "/" . $task["task_id"] .  "/" . $status . "/" . $cekTabel . "/" . $value["comment_id"]  ?>" method="POST">
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
                                    <p class="font-size-sm"><?= $value["employee_name"] ?><br><?= "(" . $value["position_name"] . ")" ?></p>
                                </td>
                                <td>
                                    <p><?= $value["comment_description"] ?></p>
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
                            <p class="font-size-sm"><?= $employ_nama ?><br><?= "(" . $nama_dept . ")" ?></p>
                        </td>
                        <td>
                            <form action="<?php echo base_url('index.php/detail/addkomen/') . $designation . "/" . $employ_id . "/" . $task["task_id"] .  "/" . $status . "/" . $cekTabel ?>" method="POST">
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
                        <form action="<?php echo base_url('index.php/detail/addsubtiket/') . $designation . "/" . $employ_id . "/" . $task["task_id"] . "/" . $status . "/" . $cekTabel ?>" method="POST" id="form-staff">
                            <input type="text" name="id_parent" value="<?php echo $task["task_id"] ?>" hidden>
                            <input type="text" name="id_service" value="<?php echo $task["service_id"] ?>" hidden>
                            <!-- <input type="text" name="customer" value="<?php echo $task["customer"] ?>" hidden> -->
                            <!-- <input type="text" name="nama_layanan" value="<?php echo $task["nama_layanan"] ?>" hidden> -->

                            <div class="form-group">
                                <label for="title">Judul Parent Task</label>
                                <input type="text" class="form-control required" name="title" id="title" value="<?php echo $task["task_title"] ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="title">Judul Sub Task</label>
                                <input autocomplete="off" type="text" class="form-control required" name="title" id="title" placeholder="Judul/Subject " required>
                            </div>
                            <!-- Add pj sub task -->
                            <div class="form-group">
                                <label for="PJsubtask">Penanggung Jawab Sub Task</label></br>
                                <select name="PJsubtask" id="PJsubtask" class="btn btn-secondary dropdown-toggle custom-select" required>
                                    <option disabled selected value=""> Belum ada </option>
                                    <?php
                                    $employe = [];
                                    //load data employ dengan jumlah task yang dipegang > 0
                                    foreach ($tugas_employ as $value) {
                                        foreach ($semua_employ as $value2) {
                                            if ($value2["employee_name"] == $value["employee_name"]) {
                                                if (!in_array($value["employee_name"], $employe)) {
                                                    array_push($employe, $value["employee_name"]);
                                                }
                                    ?>
                                                <option value="<?= $value["employee_destination"] ?>"><?php echo $value["employee_name"] . " | " . $value["count(tm_task.task_status)"] ?></option>
                                            <?php }
                                        }
                                    }
                                    //load data employ dengan jumlah task yang dipegang == 0
                                    foreach ($semua_employ as $value2) {
                                        if (!in_array($value2["employee_name"], $employe)) { ?>
                                            <option value="<?= $value2["employee_id"] ?>"><?php echo $value2["employee_name"] . " | 0" ?></option>
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
                                    <input autocomplete="off" type="text" class="js-datepicker form-control required" name="dateline" id="dateline" data-date-format="yyyy-mm-dd" data-week-start="1" data-autoclose="true" data-today-highlight="true" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control js-summernote" name="deskripsi" id="deskripsi" rows="3" placeholder="Isi Deskripsi"></textarea>
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