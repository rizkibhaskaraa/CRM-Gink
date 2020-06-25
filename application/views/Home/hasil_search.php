<table class="table table-striped table-hover table-bordered table-vcenter font-size-sm mb-0" id="tabel-pelanggan">
    <thead class="thead-dark">
        <tr class="text-uppercase">
            <th class="font-w700 text-center" style="width: 10%;">#ID</th>
            <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 20%;">Layanan</th>
            <th class="font-w700 text-center" style="width: 40%;">Customer</th>
            <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 15%;">Status</th>
            <th class="font-w700 text-center" style="width: 15%;">+Tiket</th>
        </tr>
    </thead>
    <?php foreach ($pelanggan as $value) { ?>
    <tbody>
        <tr>
        
            <td class="text-center">
                <span class="font-w600">#<?php echo $value["id_pelanggan"] ?></span>
            </td>
            <td class="text-center">
                <?php $jumlah = 0; ?>
                    <?php foreach ($layanan as $value1) { ?>
                        <?php if ($value["id_pelanggan"] == $value1["id_pelanggan"]) { ?>
                            <?php $jumlah++ ?>
                            <span class="font-w600"><?php echo $jumlah . ". " . $value1["nama_layanan"] . '<br>' ?></span>
                        <?php } ?>
                    <?php } ?>
            </td>
            <td class="text-center">
                <span class="font-w600"><?php echo $value["customer"] ?></span>
            </td>
            <?php if ($value["status"] == "tidak aktif") { ?>
                <td class="text-center"><span class="font-w600   btn-sm btn-block btn-danger "><i class="fa fa-fw fa-exclamation-circle"></i> <?php echo $value["status"] ?></span></td>
            <?php } else { ?>
                <td class="text-center"><span class="font-w600   btn-sm btn-block btn-success"><i class="fa fa-fw fa-check"></i> <?php echo $value["status"] ?></span></td>
            <?php } ?>
            <td class="text-center">
                <a href="" data-toggle="modal" data-target="#modal-block-large" id="<?php echo $value["id_pelanggan"] ?>" onclick="datapelanggan(this,'CS');"><button class="btn btn-light"><i class="fa fa-plus fa-2x"></i></button></a>                         
                        <!-- <a class="text-decoration-none" href="" data-toggle="modal" data-target="#modal-block-large" id="<?php echo $value["id_pelanggan"] ?>" onclick="datapelanggan(this,'CS');">+ tiket</a> -->
                </td>
        
        </tr>
    </tbody>
    <?php } ?>
</table>