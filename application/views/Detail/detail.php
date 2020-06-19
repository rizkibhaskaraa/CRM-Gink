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

    <!-- Fonts and OneUI framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
    <link rel="stylesheet" id="css-main" href="<?php echo base_url('assets/oneui/css/oneui.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/home/home.css') ?>">


    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>
    <!-- Start Popup Detail -->

    <!-- Large Block Modal -->
    <div class="modal fade" id="modal-block-large" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Detail Task</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content font-size-sm mt-3 text-justify ">
                        <h3>Hallo <?php echo $employ_nama ?> , berikut isi Detail Tasknya</h3>
                        <table style="font-size:18px">
                            <tbody valign="top">
                                <tr>
                                    <td class="font-weight-bold mt-2" width="30%">Title</td>
                                    <td width="70%">: <?php echo $task["title"] ?> </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold ">Deskripsi Task</td>
                                    <td>: <?php echo $task["deskripsi"] ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Nama Pengirim</td>
                                    <td>: <?php echo $nama_kirim . " (" . $task["nama_dept_kirim"] . ")" ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Deadline</td>
                                    <td>: <?php echo $task["dateline"] ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Status Task</td>
                                    <td>: <?php echo $task["status"] ?></td>
                                </tr>
                                <tr>
                                    <?php if ($cekTabel == 'Request') { ?>
                                        <td class="font-weight-bold">Penanggung Jawab</td>
                                        <td>
                                            <form method="post" action="<?php echo base_url('index.php/detail/ubahPJ/' . $employ_id . '/' . $task['id_task']) ?>">
                                                : <?php $isi = $PJ_task['id_employ_tujuan'] ?>
                                                <?php if ($isi != null) {
                                                    echo $namaPJ . "(" . $dept_PJtask . ")";
                                                } else { ?>
                                                    <select name="PJbaru" id="PJbaru">
                                                        <option disabled selected> Belum ada </option>
                                                        <?php
                                                        $employe = [];
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
                                                        foreach ($semua_employ as $value2) {
                                                            if (!in_array($value2["nama"], $employe)) { ?>
                                                                <option value="<?= $value2["id_employ"] ?>"><?php echo $value2["nama"] . " | 0" ?></option>
                                                        <?php }
                                                        }
                                                        ?>
                                                    </select>
                                                    </br>
                                                    </br>
                                                    <div class="row items-push text-center text-sm-left mb-4">
                                                        <div class="col-sm-6 col-xl-4">
                                                            <input type="submit" value="Simpan" class="btn btn-primary" data-toggle="click-ripple"></input>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="col-md-6">
                                                        <!-- Success -->
                                                        <h4 class="border-bottom pb-2">Success</h4>
                                                        <p class="font-size-sm text-muted mb-2">
                                                            A dialog showing a message after a successful operation
                                                        </p>
                                                        <button type="button" class="js-swal-success btn btn-light push">
                                                            <i class="fa fa-check-circle text-success mr-1"></i> Launch Dialog
                                                        </button>
                                                        <!-- END Success -->
                                                    </div>
                                            </form>
                                        </td>

                                    <?php } else if ($cekTabel == 'TugasBelum') { ?>
                                        <?php echo form_open_multipart('index.php/detail/insertLaporan/' . $employ_id . '/' . $task['id_task']); ?>
                                        <td class="font-weight-bold">Berkas (opsional)</td>
                                        <td>
                                            : <input type="file" name="file">
                                        </td>
                                        <input type="submit" value="Selesai">
                                        <?php echo form_close(); ?>
                                    <?php } else if ($cekTabel == 'TugasSelesai') { ?>
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
                                            <?php if ($task['status'] == 'belum selesai') {
                                                echo '-';
                                            } ?>
                                            <?= $task['waktu_selesai'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold ">Berkas</td>
                                        <td>
                                            :
                                            <?php if ($task['berkas'] == null) {
                                                echo '-';
                                            } ?>
                                            <a href="<?= base_url('upload/') . $task['berkas'] ?>"><?= $task['berkas'] ?></a>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="block-content block-content-full text-right border-top mt-5">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal"><i class="fa fa-check mr-1"></i>Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Large Block Modal -->


    <div class="col-md-6">
        <!-- Size: Large -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Size: Large</h3>
            </div>
            <div class="block-content">
                <p class="font-size-sm text-muted">
                    If you need more space you can use the large size variation
                </p>
                <button type="button" class="btn btn-sm btn-primary push" data-toggle="modal" data-target="#modal-block-large">Launch Modal</button>
            </div>
        </div>
        <!-- END Size: Large -->
        <!-- END Popup Detail -->













        <script src="<?php echo base_url('assets/oneui/js/oneui.core.min.js') ?>"></script>


        <!--
            OneUI JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
        <script src="<?php echo base_url('assets/oneui/js/oneui.app.min.js') ?>"></script>

        <!-- Page JS Plugins -->
        <script src="<?php echo base_url('assets/oneui/js/plugins/es6-promise/es6-promise.auto.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/oneui/js/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>

        <!-- Page JS Code -->
        <script src="<?php echo base_url('assets/oneui/js/pages/be_comp_dialogs.min.js') ?>"></script>

</body>

</html>