<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/home/home.css')?>">
   
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


    <title>Gink Technology</title>
</head>
<body>
    <div class="container-task">
        <h1>hai <?php echo $employ_nama?></h1>
        <a href="">buat tiket</a>
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
                        <td><?php echo $value["title"]?></td>
                        <td><?php echo $value["dateline"]?></td>
                        <td><?php echo $value["status"]?></td>
                        <td>
                        <a href="">Buka</a>
                        <a href="<?php echo base_url('index.php/home/status/').$value["id_task"]?>">Selesai</a>
                        </td>
                    </tr>
                <?php }?>
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
                        <td><?php echo $value["title"]?></td>
                        <td><?php echo $value["dateline"]?></td>
                        <td><?php echo $value["status"]?></td>
                        <td>
                        <a href="">Buka</a>
                        </td>
                    </tr>
                <?php }?>
            </table>
        </div>
    </div>    
</body>
</html>