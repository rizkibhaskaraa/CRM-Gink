<table class="table table-striped table-hover table-bordered table-vcenter font-size-sm mb-0" id="tabel-pelanggan">
    <thead class="thead-dark">
        <tr class="text-uppercase">
            <th class="font-w700 text-center" style="width: 10%;">#ID</th>
            <th class="font-w700 text-center" style="width: 30%;">Customer</th>
            <th class="font-w700 text-center" style="width: 30%;">Layanan</th>
            <th class="font-w700 text-center" style="width: 15%;">Status</th>
            <th class="font-w700 text-center" style="width: 15%;">+Tiket</th>
        </tr>
    </thead>
    <tbody>
                            <?php foreach ($pelanggan as $value) { 
                                $i = 1;
                                $row_layanan = 1; //untuk row span
                                foreach ($layanan as $valuelayanan) {
                                    if ($value["id_pelanggan"] == $valuelayanan["id_pelanggan"]) {
                                        $row_layanan += 1;
                                    }
                                }?>
                                    <tr>
                                        <td class="text-center" rowspan="<?= $row_layanan ?>">
                                            <span class="font-w600 ">#<?php echo $value["id_pelanggan"] ?></span>
                                        </td>
                                        <td class="text-center" rowspan="<?= $row_layanan ?>">
                                            <span class="font-w600"><?php echo $value["customer"] ?></span>
                                        </td>
                                    </tr>
                                    <?php foreach ($layanan as $value1){ 
                                        if ($value["id_pelanggan"] == $value1["id_pelanggan"]){?>
                                        <tr>                                        
                                        <td >
                                            <span class="font-w600"><?php echo $i . ". " . $value1["nama_layanan"] ?></span>
                                        </td>
                                        <?php if ($value1["status"] == "Tidak Aktif") { ?>
                                            <!-- jika status tidak aktif -->
                                            <td class="text-center"><span class="font-w600   btn-sm btn-block btn-danger "><i class="fa fa-fw fa-exclamation-circle"></i> <?php echo $value1["status"] ?></span></td>
                                        <?php } else { ?>
                                            <!-- jika status aktif -->
                                            <td class="text-center"><span class="font-w600   btn-sm btn-block btn-success"><i class="fa fa-fw fa-check"></i> <?php echo $value1["status"] ?></span></td>
                                        <?php } ?>
                                        <td class="text-center">
                                            <a href="" data-toggle="modal" data-target="#modal-block-large" id="<?php echo $value["id_pelanggan"] ?>" onclick="datapelanggan(this,'CS');"><button class="btn btn-light"><i class="fa fa-plus fa-2x"></i></button></a>
                                            <!-- <a class="text-decoration-none" href="" data-toggle="modal" data-target="#modal-block-large" id="<?php echo $value["id_pelanggan"] ?>" onclick="datapelanggan(this,'CS');">+ tiket</a> -->
                                        </td>
                                        </tr>
                                    <?php $i += 1; 
                                        }
                                    }
                                } ?>
                            </tbody>
</table>