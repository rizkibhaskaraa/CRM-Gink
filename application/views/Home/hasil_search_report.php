                    <div class="block-content block-content-full" id="report-table">
                        <table class="table table-bordered table-hover table-vcenter font-size-sm mb-0">
                            <thead class="thead-dark">
                                <tr class="text-uppercase">
                                    <th class="font-w700 text-center" style="width: 16%;">Nama</th>
                                    <th class="font-w700 text-center" style="width: 16%;">Departemen</th>
                                    <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 16%;">Request Tugas</th>
                                    <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 16%;">Selesai</th>
                                    <th class="font-w700 text-center" style="width:16%" ;>On Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $data_report = [];
                                foreach ($reportall as $value) {
                                    array_push($data_report, $value["employee_name"]);
                                }
                                foreach ($employ_report as $value) {
                                    if (!in_array($value["employee_name"], $data_report)) { ?>
                                            <tr>
                                                <td>
                                                    <span class="font-w600"><?php echo $value["employee_name"] ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="font-w600"><?php echo $value["department_name"]?></span>
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
                                    <?php }
                                } ?>
                                <?php foreach ($reportall as $value) {?>
                                    <tr>
                                        <td>
                                            <span class="font-w600"><?php echo $value["employee_name"] ?></span>
                                        </td>
                                        <td class="text-center">
                                            <span class="font-w600"><?php echo $value["department_name"] ?></span>
                                        </td>
                                        <td class="text-center">
                                            <span class="font-w600"><?php  echo $value["total_task"]?> Tugas</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="font-w600 text-success"><?php  echo $value["total_selesai"]?> Tugas</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="font-w600 text-danger"><?php echo $value["total_belum"]?> Tugas</span>
                                        </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                        