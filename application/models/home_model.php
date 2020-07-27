<?php
// error_reporting(0); //menyembunyikan error
class home_model extends CI_model
{
    //fungsi ambil data tabel employ
    public function getemploy($user)
    {
        //ambil data berdasarkan username yang login
        $user = $this->db->get_where("master_user", array("user_username" => $user))->row_array();
        $id_employ = $user["employee_id"];
        return $this->db->get_where("hr_employee", array("employee_id" => $id_employ))->row_array();
    }

    //fungsi ambil data dept user
    public function getdeptuser($position_id)
    {
        //mendapatkan data berdasarkan id_employ
        return $this->db->get_where("hr_position", array("position_id" => $position_id))->row_array();
    }

    public function getdesignationUser($username)
    {
        $user = $this->db->get_where("master_user", array("user_username" => $username))->row_array();
        $id_position = $user["position_id"];
        return $this->db->get_where("hr_designation", array("position_id" => $id_position = $user["position_id"]))->row_array();
    }

    public function getdesignation($employee_id)
    {
        return $this->db->get_where("hr_designation", array("employee_id" => $employee_id))->row_array();
    }

    //fungsi ambil data tabel user
    public function getuser($id_employ)
    {
        //mendapatkan data berdasarkan id_employ
        return $this->db->get_where("master_user", array("employee_id" => $id_employ))->row_array();
    }

    //fungsi ambil data tabel task
    public function gettask()
    {
        return $this->db->get("tm_task")->result_array();
    }

    //fungsi ambil data tabel employ
    public function getemploytiket($id_employ)
    {
        //ambil data berdasarkan id_emoloy
        return $this->db->get_where("hr_employee", array("employee_id" => $id_employ))->row_array();
    }

    //fungsi ambil data table employ
    public function getemploydept($id_dept)
    {
        $this->db->select("hr_employee.employee_name,hr_department.department_name,hr_department.department_id");
        $this->db->order_by('hr_department.department_name', 'ASC');
        $this->db->join("hr_designation", "hr_employee.employee_id = hr_designation.employee_id", 'left');
        $this->db->join("hr_position", "hr_position.position_id = hr_designation.position_id");
        $this->db->join("hr_department", "hr_department.department_id = hr_position.department_id");
        if ($id_dept != "1") { //jika yang login dari CEO
            return $this->db->get_where("hr_employee", array("hr_department.department_id" => $id_dept))->result_array();
        } else {
            return $this->db->get_where("hr_employee")->result_array();
        }
    }

    //fungsi ambil data tabel pelanggan
    public function getpelanggan()
    {
        return $this->db->get("crm_customer")->result_array();
    }

    //fungsi ambil data tabel layanan
    public function getlayanan()
    {
        return $this->db->get("master_service")->result_array();
    }

    public function getproduct()
    {
        return $this->db->get("master_product")->result_array();
    }

    //fungsi ambil data tabel layanan berdasarkan id layanan
    public function getlayananbyid($id)
    {
        $this->db->select("crm_customer.customer_id,customer_name,service_name,service_id");
        $this->db->join("crm_customer", "master_service.customer_id = crm_customer.customer_id"); //join tabel employe dengan task
        return $this->db->get_where("master_service", array("service_id" => $id))->row_array();
    }

    //fungsi ambil data tabel departemen berdasarkan id departemen
    public function getdepartemen($user)
    {
        $datauser = $this->db->get_where("master_user", array("user_username" => $user))->row_array();
        return $this->db->get_where("hr_position", array("position_id" => $datauser["position_id"]))->row_array();
    }

    public function getdepartmentbyid($department_name)
    {
        if ($department_name == "umum") {
            return "";
        } else {
            return $this->db->get_where("hr_department", array("department_name" => $department_name))->row_array();
        }
    }

    //fungsi ambil data task selesai berdarakan id_employ_tujuan(PJ task)
    public function gettaskselesai($id_employ, $dept)
    {
        if ($dept == "1") { //jika CEO yang login
            return $this->db->get_where('tm_task', array("task_status" => "Finish"))->result_array();
        } else {
            return $this->db->get_where('tm_task', array('employee_destination' => $id_employ, "task_status" => "Finish"))->result_array();
        }
    }

    //fungsi ambil data task belum selesai berdarakan id_employ_tujuan(PJ task)
    public function gettaskbelum($id_employ, $dept)
    {
        if ($dept == "1") { //jika CEO yang login
            return $this->db->get_where('tm_task', array("task_status" => "Not Finished"))->result_array();
        } else {
            return $this->db->get_where('tm_task', array('employee_destination' => $id_employ, "task_status" => "Not Finished"))->result_array();
        }
    }

    //fungsi ambil data tabel task untuk tiket berdarakan id_employ_tujuan(PJ task)
    public function gettiket($id_employ)
    {
        $this->db->join("hr_employee", "hr_employee.employee_id = tm_task.employee_destination"); //join tabel employe ke task
        return $this->db->get_where('tm_task', array('employee_sent' => $id_employ))->result_array();
    }

    //fungsi ambil data tabel task untuk tiket berdarakan id_employ_tujuan(PJ task)
    public function gettiketsaya($id_employ)
    {
        return $this->db->get_where('tm_task', array('employee_sent' => $id_employ, 'employee_destination' => NULL))->result_array();
    }

    //fungsi ambil data tabel task untuk tugas saya berdarakan nama_dept_tujuan(departemen PJ task)
    public function gettaskparent($nama_departemen)
    {
        $departemen = array($nama_departemen, null);
        $this->db->join("hr_employee", "hr_employee.employee_id = tm_task.employee_destination");
        $this->db->join("hr_department", "hr_department.department_id = tm_task.department_destination");
        if ($nama_departemen != "1") {
            $this->db->where_in('department_destination', $departemen);
        }
        $this->db->where('task_parent', NULL);
        return $this->db->get('tm_task')->result_array();
    }

    //fungsi ambil data tabel task untuk tugas saya berdarakan nama_dept_tujuan(departemen PJ task) dan id_employ_tujuan
    public function gettasksaya($id_employ, $dept)
    {
        $this->db->where('task_parent', null);
        $this->db->join("hr_employee", "hr_employee.employee_id = tm_task.employee_destination");
        $this->db->join("hr_department", "hr_department.department_id = tm_task.department_destination");
        if ($dept != "1") { //jika bukan CEO yang login
            $this->db->where('employee_destination', $id_employ);
        }
        return $this->db->get('tm_task')->result_array();
    }

    //fungsi update db task
    public function updatestatus($id)
    {
        //update
        date_default_timezone_set('Asia/Bangkok');
        $this->db->set('task_status', "Finish"); //set status jadi selesai
        $this->db->set('task_finish', date("Y-m-d H-i-s")); //set waktu_selesai menjadi waktu saat ini
        $this->db->where('task_id', $id);
        $this->db->update('tm_task');
        //akhir update
        //data user
        $task = $this->db->get_where("tm_task", array("task_id" => $id))->row_array();
        $employ = $this->db->get_where("hr_employee", array("employee_id" => $task["employee_destination"]))->row_array();
        $user = $this->db->get_where("master_user", array("employee_id" => $employ["employee_id"]))->row_array();
        //akhir data user
        return $user["user_username"];
    }

    public function insert_task($data_task)
    {
        return $this->db->insert("tm_task", $data_task);
    }

    // report tanpa periode
    //fungsi get report (untuk kolom request tugas)
    public function getreport($dept)
    {
        $this->db->order_by('department_destination', 'ASC');
        // $this->db->order_by('status_employ', 'ASC');
        if ($dept != "1") { //jika bukan CEO yang login
            $this->db->where("department_destination", $dept);
        }
        $this->db->select("count(tm_task.task_status),employee_destination,employee_name,department_destination,department_name"); //select kolom
        $this->db->join("hr_employee", "hr_employee.employee_id = tm_task.employee_destination"); //join
        $this->db->join("hr_department", "hr_department.department_id = tm_task.department_destination"); //join
        $this->db->group_by("employee_destination"); //group by 
        return $this->db->get("tm_task")->result_array();
    }

    //fungsi get report (untuk kolom tugas selesai)
    public function gettugaspjselesai($dept)
    {
        if ($dept != "1") {
            $this->db->where("department_destination", $dept);
        }
        $this->db->where("tm_task.task_status", "Finish");
        $this->db->where_not_in("employee_destination", "");
        $this->db->select("count(tm_task.task_status),employee_destination,employee_name,department_destination,department_name");
        $this->db->join("hr_employee", "hr_employee.employee_id = tm_task.employee_destination"); //join
        $this->db->join("hr_department", "hr_department.department_id = tm_task.department_destination"); //join
        $this->db->group_by("employee_destination");
        return $this->db->get("tm_task")->result_array();
    }

    //fungsi get report (untuk kolom on progres)
    public function gettugaspjbelum($dept)
    {
        if ($dept != "1") {
            $this->db->where("department_destination", $dept);
        }
        $this->db->where("tm_task.task_status", "Not Finished");
        $this->db->where_not_in("employee_destination", "");
        $this->db->select("count(tm_task.task_status),employee_destination,employee_name,department_destination,department_name");
        $this->db->join("hr_employee", "hr_employee.employee_id = tm_task.employee_destination"); //join
        $this->db->join("hr_department", "hr_department.department_id = tm_task.department_destination"); //join
        $this->db->group_by("employee_destination");
        return $this->db->get("tm_task")->result_array();
    }
    // end report tanpa periode

    // report dengan periode
    //fungsi get report (untuk kolom request tugas) dengan periode
    public function getreport_periode($dept, $tgl_start, $tgl_end)
    {
        $this->db->order_by('department_destination', 'ASC');
        // $this->db->order_by('status_employ', 'ASC');
        if ($dept != "1") { //jika bukan CEO yang login
            $this->db->where("department_destination", $dept);
        }
        $this->db->where('task_date >=', $tgl_start); //where tanggal
        $this->db->where('task_date <=', $tgl_end); //where tanggan
        $this->db->select("count(tm_task.task_status),employee_destination,employee_name,department_destination,department_name"); //select kolom
        $this->db->join("hr_employee", "hr_employee.employee_id = tm_task.employee_destination"); //join
        $this->db->join("hr_department", "hr_department.department_id = tm_task.department_destination"); //join
        $this->db->group_by("employee_destination"); //group by 
        return $this->db->get("tm_task")->result_array();
    }

    //fungsi get report (untuk kolom tugas selesai) dengan periode
    public function gettugaspjselesai_periode($dept, $tgl_start, $tgl_end)
    {
        if ($dept != "1") {
            $this->db->where("department_destination", $dept);
        }
        $this->db->where('task_date >=', $tgl_start);
        $this->db->where('task_date <=', $tgl_end);
        $this->db->where("tm_task.task_status", "Finish");
        $this->db->where_not_in("employee_destination", "");
        $this->db->select("count(tm_task.task_status),employee_destination,employee_name,department_destination,department_name");
        $this->db->join("hr_employee", "hr_employee.employee_id = tm_task.employee_destination"); //join
        $this->db->join("hr_department", "hr_department.department_id = tm_task.department_destination"); //join
        $this->db->group_by("employee_destination");
        return $this->db->get("tm_task")->result_array();
    }

    //fungsi get report (untuk kolom on progres) dengan periode
    public function gettugaspjbelum_periode($dept, $tgl_start, $tgl_end)
    {
        if ($dept != "1") {
            $this->db->where("department_destination", $dept);
        }
        $this->db->where('task_date >=', $tgl_start);
        $this->db->where('task_date <=', $tgl_end);
        $this->db->where("tm_task.task_status", "Not Finished");
        $this->db->where_not_in("employee_destination", "");
        $this->db->select("count(tm_task.task_status),employee_destination,employee_name,department_destination,department_name");
        $this->db->join("hr_employee", "hr_employee.employee_id = tm_task.employee_destination"); //join
        $this->db->join("hr_department", "hr_department.department_id = tm_task.department_destination"); //join
        $this->db->group_by("employee_destination");
        return $this->db->get("tm_task")->result_array();
    }
    // end report dengan periode

    //function-fiunction datatable
    public function count_all($dept, $status)
    {
        $this->db->where("department_destination", $dept);
        if ($status != "") {
            $this->db->where("task_status", $status);
        }
        $this->db->from('tm_task');
        $result = $this->db->count_all_results();
        return $this->db->count_all_results();
    }

    public function filter($search, $limit, $start, $order_field, $order_ascdesc, $dept, $status)
    {
        if ($search != "") {
            $this->db->like('task_title', $search);
            $this->db->where("department_destination", $dept);
        }
        if ($status != "") {
            $this->db->where("task_status", $status);
        }
        $this->db->order_by($order_field, $order_ascdesc);
        $this->db->limit($limit, $start);
        $this->db->where("task_parent",null);
        $this->db->join("hr_employee", "hr_employee.employee_id = tm_task.employee_destination",'left'); //join tabel employe dengan task
        return $this->db->get_where('tm_task', array("department_destination" => $dept))->result_array();
    }

    public function count_filter($search, $dept, $status)
    {
        if ($search != "") {
            $this->db->like('task_title', $search);
            $this->db->where("department_destination", $dept);
        }
        if ($status != "") {
            $this->db->where("task_status", $status);
        }
        return $this->db->get_where('tm_task', array("department_destination" => $dept))->num_rows();
    }
    //akhir function-fiunction datatable

    //function-fiunction datatable pelanggan
    public function count_all_pelanggan($status)
    {
        $this->db->select("crm_customer.customer_id,customer_name,service_name,service_id,service_status");
        if ($status != "") {
            $this->db->where("service_status", $status);
        }
        $this->db->join("master_service", "master_service.customer_id = crm_customer.customer_id", 'left'); //join tabel employe dengan task
        return $this->db->count_all_results("crm_customer");
    }

    public function filter_pelanggan($search, $limit, $start, $order_field, $order_ascdesc, $status)
    {
        $this->db->select("crm_customer.customer_id,customer_name,service_name,service_id,service_status");
        if ($status != "") {
            $this->db->where("service_status", $status);
        }
        // $this->db->like('crm_customer.customer_id', $search); 
        $this->db->like('customer_name', $search);
        $this->db->order_by($order_field, $order_ascdesc);
        $this->db->limit($limit, $start);
        $this->db->join("master_service", "master_service.customer_id = crm_customer.customer_id", 'left'); //join tabel employe dengan task
        return $this->db->get('crm_customer')->result_array();
    }

    public function count_filter_pelanggan($search, $status)
    {
        $this->db->select("crm_customer.customer_id,customer_name,service_name,service_id,service_status");
        if ($status != "") {
            $this->db->where("service_status", $status);
        }
        // $this->db->like('crm_customer.customer_id', $search); 
        $this->db->like('customer_name', $search);
        $this->db->join("master_service", "master_service.customer_id = crm_customer.customer_id", 'left'); //join tabel employe dengan task
        return $this->db->get('crm_customer')->num_rows();
    }
    //akhir function-fiunction datatable pelanggan
}
