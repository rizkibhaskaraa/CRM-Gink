<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/home/home.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/body.css') ?>">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <title>Gink Technology</title>
</head>

<body>
    <div class="container-task">
        <h1>hai,<?php echo $employ_nama ?></h1>
        <h3><?php echo $status." ".$nama_departemen?> di Gink Technology</h3>
        <a href="<?php echo base_url('index.php/tiket/index/') . $employ_id . "/" ?>" class="p-2 bg-primary text-white text-decoration-none tiket">buat tiket</a>
        <?php if ($employ_dept == "CS") { ?>
            <div class="pelanggan">
                <h3 class="text-primary data-pelanggan">data pelanggan</h3>
                <input type="text" id="search" class="form-control col-2 search" name="search" placeholder="Cari Customer">
                <select name="layanan" id="layanan" class="form-control col-2 layanan">
                    <option value="semua">Semua Layanan</option>
                    <option value="app website">App Website</option>
                    <option value="website">Website</option>
                    <option value="Hosting">Hosting</option>
                    <option value="mobile">App Mobile</option>
                </select>
                <select name="status" id="status-pelanggan" class="form-control col-2 status-pelanggan">
                    <option value="semua">Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="tidak aktif">Tidak Aktif</option>
                </select>
                <input type="text" id="link" name="link" value="<?php echo base_url('index.php/home/search/')?>" hidden>
                <table class="table table-bordered" id="pelanggan">
                    <thead class="thead-dark">
                        <tr>
                            <th>#id</th>
                            <th>layanan</th>
                            <th>costumer</th>
                            <th>status</th>
                            <th>buat tiket</th>
                        </tr>
                    </thead>
                    <?php foreach ($pelanggan as $value) { ?>
                    <tbody>
                        <tr>
                            <td>#<?php echo $value["id_pelanggan"] ?></td>
                            <td><?php echo $value["layanan"] ?></td>
                            <td><?php echo $value["customer"] ?></td>
                            <?php if($value["status"]=="Tidak aktif"){?>
                                <td class="text-danger"><?php echo $value["status"] ?></td>
                            <?php }else{?>
                                <td class="text-success"><?php echo $value["status"] ?></td>
                            <?php }?>
                            <td>
                                <a class="text-decoration-none" href="<?php echo base_url('index.php/tiket/index/') . $employ_id . "/" . $value["id_pelanggan"] ?>">+ tiket</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        <?php } ?>
        <?php if ($status == "kepala") { ?>
            <h3 class="text-primary req-tugas">Request Tugas</h3>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>title</th>
                        <th>dateline</th>
                        <th>status</th>
                        <th>penanggung jawab</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <?php foreach ($taskdihead as $value) { ?>
                <tbody>
                    <tr>
                    <?php if($value["id_employ_tujuan"]==NULL){?>
                        <td><?php echo $value["title"] ?></td>
                        <td><?php echo $value["dateline"] ?></td>
                        <?php if($value["status"]=="belum selesai"){?>
                            <td class="text-danger"><?php echo $value["status"] ?></td>
                        <?php }else{?>
                            <td class="text-success"><?php echo $value["status"] ?></td>
                        <?php }?>
                        <td class="text-danger">Belum ada</td>
                        <td>
                            <a class="text-decoration-none" href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] ?>">Buka</a>
                        </td>
                    <?php }?>
                    </tr>
                </tbody>
                <?php } ?>
                <?php foreach ($taskdihead as $value) { ?>
                <tbody>
                    <tr>
                    <?php if($value["id_employ_tujuan"]!=NULL){?>
                        <td><?php echo $value["title"] ?></td>
                        <td><?php echo $value["dateline"] ?></td>
                        <?php if($value["status"]=="belum selesai"){?>
                            <td class="text-danger"><?php echo $value["status"] ?></td>
                        <?php }else{?>
                            <td class="text-success"><?php echo $value["status"] ?></td>
                        <?php }?>
                        <td class="text-success"><?php echo $value["id_employ_tujuan"] ?></td>
                        <td>
                            <a class="text-decoration-none" href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] ?>">Buka</a>
                        </td>
                    <?php }?>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        <?php } ?>

        <div class="belum">
            <h3 class="text-danger belum-selesai">belum selesai</h3>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>title</th>
                        <th>dateline</th>
                        <th>status</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <?php foreach ($taskbelum as $value) { ?>
                <tbody>
                    <tr>
                        <td><?php echo $value["title"] ?></td>
                        <td><?php echo $value["dateline"] ?></td>
                        <td class="text-danger"><?php echo $value["status"] ?></td>
                        <td>
                            <a href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] ?>" class="text-decoration-none">Buka  |  </a>
                            <a href="<?php echo base_url('index.php/home/status/') . $value["id_task"] ?>" class="text-decoration-none">Selesai</a>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>
        <div class="text-success selesai">
            <h3 class="sudah-selesai">sudah selesai</h3>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>title</th>
                        <th>dateline</th>
                        <th>status</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <?php foreach ($taskselesai as $value) { ?>
                <tbody>
                    <tr>
                        <td><?php echo $value["title"] ?></td>
                        <td><?php echo $value["dateline"] ?></td>
                        <td class="text-success"><?php echo $value["status"] ?></td>
                        <td>
                            <a class="text-decoration-none" href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] ?>">Buka</a>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
    
    <script src="<?php echo base_url('assets/ajax/search.js') ?>"></script>
</body>

</html>