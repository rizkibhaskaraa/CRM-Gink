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
        <!-- <form method="post" action="<?php echo base_url('index.php/detail/insertLaporan/' . $employ_id . '/' . $task['id_task']) ?>"> -->
        <?php echo form_open_multipart('index.php/detail/insertLaporan/' . $employ_id . '/' . $task['id_task']); ?>
        <table style="font-size:20px">
            <tbody valign="top">
                <tr>
                    <td width="30%">Title</td>
                    <td width="70%"><?php echo $task["title"] ?> </td>
                </tr>
                <tr>
                    <td>Deskripsi Task</td>
                    <td><?php echo $task["deskripsi"] ?></td>
                </tr>
                <tr>
                    <td>Kategori Masalah</td>
                    <td><?php echo $task["kategori_masalah"] ?></td>
                </tr>
                <tr>
                    <td>Nama Pengirim</td>
                    <td><?php echo $task["id_employ_kirim"] ?></td>
                </tr>
                <tr>
                    <td>Dateline</td>
                    <td><?php echo $task["dateline"] ?></td>
                </tr>
                <tr>
                    <td>Status Task</td>
                    <td><?php echo $task["status"] ?></td>
                </tr>
                <tr>

                    <td>Berkas (opsional)</td>
                    <td>
                        <input type="file" name="file">
                    </td>
                </tr>
            </tbody>
        </table>
        </br>

        <input type="submit" value="Selesai">
        <?php echo form_close(); ?>
        <!-- </form> -->
    </div>

</body>

</html>