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