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
        <h1>hai <?php echo $employ_nama ?></h1>
        <a href="<?php echo base_url('index.php/tiket/index/') . $employ_id . "/" ?>">buat tiket</a>
        <?php if ($employ_dept == "CS") { ?>
            <div class="pelanggan">
                <h3>data pelanggan</h3>
                <table style="border:1px solid; width:100%">
                    <tr>
                        <th>id</th>
                        <th>layanan</th>
                        <th>costumer</th>
                        <th>status</th>
                        <th>buat tiket</th>
                    </tr>
                    <?php foreach ($pelanggan as $value) { ?>
                        <tr>
                            <td><?php echo $value["id_pelanggan"] ?></td>
                            <td><?php echo $value["layanan"] ?></td>
                            <td><?php echo $value["customer"] ?></td>
                            <td><?php echo $value["status"] ?></td>
                            <td>
                                <a href="<?php echo base_url('index.php/tiket/index/') . $employ_id . "/" . $value["id_pelanggan"] ?>">+ tiket</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } ?>
        <?php if ($status == "kepala") { ?>
            <h2>Kepala Departemen <?= $nama_departemen ?></h2>
            <table style="border:1px solid; width:100%">
                <tr>
                    <th>title</th>
                    <th>dateline</th>
                    <th>status</th>
                    <th>aksi</th>
                </tr>
                <?php foreach ($taskdihead as $value) { ?>
                    <tr>
                        <td><?php echo $value["title"] ?></td>
                        <td><?php echo $value["dateline"] ?></td>
                        <td><?php echo $value["status"] ?></td>
                        <td>
                            <a href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] ?>">Buka</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>

        <div class="belum">
            <h3>belum selesai</h3>
            <table style="border:1px solid; width:100%">
                <tr>
                    <th>title</th>
                    <th>dateline</th>
                    <th>status</th>
                    <th>aksi</th>
                </tr>
                <?php foreach ($taskbelum as $value) { ?>
                    <tr>
                        <td><?php echo $value["title"] ?></td>
                        <td><?php echo $value["dateline"] ?></td>
                        <td><?php echo $value["status"] ?></td>
                        <td>
                            <a href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] ?>">Buka</a>
                            <a href="<?php echo base_url('index.php/home/status/') . $value["id_task"] ?>">Selesai</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <div class="selesai">
            <h3>sudah selesai</h3>
            <table style="border:1px solid; width:100%">
                <tr>
                    <th>title</th>
                    <th>dateline</th>
                    <th>status</th>
                    <th>aksi</th>
                </tr>
                <?php foreach ($taskselesai as $value) { ?>
                    <tr>
                        <td><?php echo $value["title"] ?></td>
                        <td><?php echo $value["dateline"] ?></td>
                        <td><?php echo $value["status"] ?></td>
                        <td>
                            <a href="<?php echo base_url('index.php/home/detail/') . $employ_id . "/" . $value['id_task'] ?>">Buka</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>