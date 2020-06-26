<div class="block-content block-content-full" id="report-table">
                            <table class="table table-striped table-hover table-vcenter font-size-sm mb-0">
                                <thead class="thead-dark">
                                    <tr class="text-uppercase">
                                        <th class="font-w700 text-center" style="width: 35%;">Nama</th>
                                        <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 20%;">Request Tugas</th>
                                        <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 20%;">Selesai</th>
                                        <th class="font-w700 text-center" style="width:15%" ;>Pending / On Progress</th>
                                    </tr>
                                </thead>
                                <?php if(count($report)==0){
                                    foreach ($employ_report as $value) { ?>
                                        <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="font-w600"><?php echo $value["nama"] ?></span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="font-w600">0 Tugas</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="font-w600 text-success">0 Tugas</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="font-w600 text-danger">0 Tugas</span>
                                                    </td>
                                                </tr>
                                        </tbody>
                                    <?php } ?>
                                <?php }?>
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