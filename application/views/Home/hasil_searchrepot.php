<div class="tab-pane fade fade-up" id="report" role="tabpanel">
    <div class="container-fluid">
        <div class="block block-mode-loading-oneui">
            <div class="block-header border-bottom ">
                <h3 class="block-title text-primary">Report Staff</h3>
            </div>
            <input type="text" class="js-datepicker form-control col-2 search  mt-3 ml-2 mr-4 search required" name="tgl-end" id="tgl-end" data-date-format="yyyy-mm-dd" data-week-start="1" data-autoclose="true" data-today-highlight="true" placeholder="Tanggal End">
            <h1 class="search"><i class="far fa-window-minimize mr-3"></i></h1>
            <input type="text" class="js-datepicker form-control col-2 search  mt-3 ml-2 mr-4 search required" name="tgl-start" id="tgl-start" data-date-format="yyyy-mm-dd" data-week-start="1" data-autoclose="true" data-today-highlight="true" placeholder="Tanggal Start">
            <div class="block-content block-content-full">
                <table class="table table-striped table-hover table-vcenter font-size-sm mb-0">
                    <thead class="thead-dark">
                        <tr class="text-uppercase">
                            <th class="font-w700 text-center" style="width: 35%;">Nama</th>
                            <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 20%;">Request Tugas</th>
                            <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 20%;">Selesai</th>
                            <th class="font-w700 text-center" style="width:15%" ;>Pending / On Progress</th>
                        </tr>
                    </thead>
                    <?php $employe = [];
                    foreach ($report as $value) { ?>
                        <tbody>
                            <?php foreach ($tugas_selesai as $value2) {
                                if ($value2["nama"] == $value["nama"]) {
                                    array_push($employe, $value["nama"]); ?>
                                    <tr>
                                        <td>
                                            <span class="font-w600"><?php echo $value["nama"] ?></span>
                                        </td>
                                        <td class="text-center">
                                            <span class="font-w600"><?php echo $value["count(task.status)"] ?> Tugas</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="font-w600 text-success"><?php echo $value2["count(task.status)"] ?> Tugas</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="font-w600 text-danger"><?php echo $value["count(task.status)"] - $value2["count(task.status)"] ?> Tugas</span>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } ?>
                        </tbody>
                    <?php } ?>
                    <?php foreach ($report as $value) { ?>
                        <tbody>
                            <?php foreach ($tugas_belum as $value2) {
                                if ($value2["nama"] == $value["nama"] && !in_array($value["nama"], $employe)) {
                                    array_push($employe, $value["nama"]); ?>
                                    <tr>
                                        <td>
                                            <span class="font-w600"><?php echo $value["nama"] ?></span>
                                        </td>
                                        <td class="text-center">
                                            <span class="font-w600"><?php echo $value["count(task.status)"] ?> Tugas</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="font-w600 text-success"><?php echo $value["count(task.status)"] - $value2["count(task.status)"] ?> Tugas</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="font-w600 text-danger"><?php echo $value2["count(task.status)"] ?> Tugas</span>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } ?>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- END Request Task dan report-->