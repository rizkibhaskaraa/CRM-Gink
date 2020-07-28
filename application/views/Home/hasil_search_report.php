<div class="block-content-full" id="report-table">
    <table class="table table-bordered table-hover table-vcenter font-size-sm mb-0">
        <thead class="thead-dark">
            <tr class="text-uppercase">
                <th class="font-w700 text-center" style="width: 16%;">Nama</th>
                <th class="font-w700 text-center" style="width: 16%;">Departemen</th>
                <!-- <th class="font-w700 text-center" style="width: 16%;">Jabatan</th> -->
                <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 16%;">Request Tugas</th>
                <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 16%;">Selesai</th>
                <th class="font-w700 text-center" style="width:16%" ;>On Progress</th>
            </tr>
        </thead>
        <?php $data_report = [];
        foreach ($report as $value) {
            array_push($data_report, $value["employee_name"]);
        }
        foreach ($employ_report as $value) {
            if (!in_array($value["employee_name"], $data_report)) { ?>
                <tbody>
                    <tr>
                        <td>
                            <span class="font-w600"><?php echo $value["employee_name"] ?></span>
                        </td>
                        <td class="text-center">
                            <span class="font-w600"><?php echo $value["department_name"] ?></span>
                        </td>
                        <!-- <td class="text-center">
                                                        <span class="font-w600"><?php echo $value["status_employ"] ?></span>
                                                    </td> -->
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
        <?php }
        } ?>
        <?php $employe = [];
        foreach ($report as $value) { ?>
            <tbody>
                <?php foreach ($tugas_selesai as $value2) {
                    if ($value2["employee_name"] == $value["employee_name"]) {
                        array_push($employe, $value["employee_name"]); ?>
                        <tr>
                            <td>
                                <span class="font-w600"><?php echo $value["employee_name"] ?></span>
                            </td>
                            <td class="text-center">
                                <span class="font-w600"><?php echo $value["department_name"] ?></span>
                            </td>
                            <!-- <td class="text-center">
                                                        <span class="font-w600"><?php echo $value["status_employ"] ?></span>
                                                    </td> -->
                            <td class="text-center">
                                <span class="font-w600"><?php echo $value["count(tm_task.task_status)"] ?> Tugas</span>
                            </td>
                            <td class="text-center">
                                <span class="font-w600 text-success"><?php echo $value2["count(tm_task.task_status)"] ?> Tugas</span>
                            </td>
                            <td class="text-center">
                                <span class="font-w600 text-danger"><?php echo $value["count(tm_task.task_status)"] - $value2["count(tm_task.task_status)"] ?> Tugas</span>
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
                    if ($value2["employee_name"] == $value["employee_name"] && !in_array($value["employee_name"], $employe)) {
                        array_push($employe, $value["employee_name"]); ?>
                        <tr>
                            <td>
                                <span class="font-w600"><?php echo $value["employee_name"] ?></span>
                            </td>
                            <td class="text-center">
                                <span class="font-w600"><?php echo $value["department_name"] ?></span>
                            </td>
                            <!-- <td class="text-center">
                                                        <span class="font-w600"><?php echo $value["status_employ"] ?></span>
                                                    </td> -->
                            <td class="text-center">
                                <span class="font-w600"><?php echo $value["count(tm_task.task_status)"] ?> Tugas</span>
                            </td>
                            <td class="text-center">
                                <span class="font-w600 text-success"><?php echo $value["count(tm_task.task_status)"] - $value2["count(tm_task.task_status)"] ?> Tugas</span>
                            </td>
                            <td class="text-center">
                                <span class="font-w600 text-danger"><?php echo $value2["count(tm_task.task_status)"] ?> Tugas</span>
                            </td>
                        </tr>
                <?php
                    }
                } ?>
            </tbody>
        <?php } ?>
    </table>
</div>