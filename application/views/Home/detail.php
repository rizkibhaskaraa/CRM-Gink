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
        <table style="font-size:18px"  >
            <tbody valign="top">
                <tr>
                    <td class="font-weight-bold mt-2" width="30%">Title</td>
                    <td width="70%">: <?php echo $task["title"] ?> | <span id="id_task"></span></td>
                </tr>
                <tr>
                    <td class="font-weight-bold ">Deskripsi Task</td>
                    <td>: <?php echo $task["deskripsi"] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Kategori Masalah</td>
                    <td>: <?php echo $task["kategori_masalah"] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Nama Pengirim</td>
                    <td>: <?php echo $nama_kirim ." (".$task["nama_dept_kirim"].")"?></td>
                </tr>
                <tr>
                    <td  class="font-weight-bold">Deadline</td>
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
                                echo $namaPJ ."(".$dept_PJtask.")";
                            } else { ?>
                                <select name="PJbaru" id="PJbaru">
                                    <option disabled selected> Belum ada </option>
                                    <?php 
                                    $employe = [];
                                    foreach ($tugas_employ as $value) {
                                        foreach($semua_employ as $value2){
                                            if($value2["nama"] == $value["nama"]){
                                                if(!in_array($value["nama"],$employe)){
                                                    array_push($employe,$value["nama"]);
                                                }
                                                ?>
                                                <option value="<?= $value["id_employ_tujuan"] ?>"><?php echo $value["nama"]." | ".$value["count(task.status)"] ?></option>     
                                            <?php }
                                        }
                                    }
                                    foreach($semua_employ as $value2){
                                        if(!in_array($value2["nama"],$employe)){ ?>
                                            <option value="<?= $value2["id_employ"] ?>"><?php echo $value2["nama"]." | 0"?></option>     
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
                            <input type="file" name="file">
                        </td>
                        <input type="submit" value="Selesai">
                        <?php echo form_close(); ?>
                    <?php } else if ($cekTabel == 'TugasSelesai') { ?>
                        <?php echo form_open_multipart('index.php/detail/insertLaporan/' . $employ_id . '/' . $task['id_task']); ?>
                        <td class="font-weight-bold">Berkas (opsional)</td>
                        <td>
                            <input type="file" name="file">
                            </br>
                            <input type="submit" value="Simpan">
                        </td>

                        <?php echo form_close(); ?>
                    <?php } ?>
                </tr>
                <?php if ($cekTabel == 'Tiket') { ?>
                    <tr>
                        <td  class="font-weight-bold">Penanggung Jawab</td>
                        <td>
                        : <?= $namaPJ." (".$dept_PJtask.")" ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold ">Berkas</td>
                        <td>
                            <a href="<?= base_url('upload/').$task['berkas'] ?>"><?= $task['berkas'] ?></a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>