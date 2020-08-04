<?php
// error_reporting(0); //menyembunyikan error
class home_model extends CI_model
{
    //fungsi ambil data tabel employ
    public function getemploy($user)
    {
        //ambil data employe berdasarkan username yang login
        $user = $this->db->get_where("master_user", array("user_username" => $user))->row_array();
        $id_employ = $user["employee_id"];
        return $this->db->get_where("hr_employee", array("employee_id" => $id_employ))->row_array();
    }

    //fungsi ambil data tabel designation by username yang login
    public function getdesignationUser($username)
    {
        $user = $this->db->get_where("master_user", array("user_username" => $username))->row_array();
        $id_position = $user["position_id"];
        return $this->db->get_where("hr_designation", array("position_id" => $id_position = $user["position_id"]))->row_array();
    }

    //fungsi ambil data tabel user by id employee
    public function getuser($id_employ)
    {
        return $this->db->get_where("master_user", array("employee_id" => $id_employ))->row_array();
    }

    //fungsi ambil data tabel user by username
    public function getuserbyusername($username)
    {
        return $this->db->get_where("master_user", array("user_username" => $username))->row_array();
    }
    //fungsi ambil data tabel employ by id employee
    public function getemploytiket($id_employ)
    {
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

    //fungsi ambil data tabel customer by id
    public function getcustomerbyid($id)
    {
        return $this->db->get_where("crm_customer", array("customer_id" => $id))->row_array();
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
    public function getposition($user)
    {
        $datauser = $this->db->get_where("master_user", array("user_username" => $user))->row_array();
        return $this->db->get_where("hr_position", array("position_id" => $datauser["position_id"]))->row_array();
    }

    //fungsi ambil data nama departemen dari tabel departmen
    public function getdepartmentuser($username)
    {
        $datauser = $this->db->get_where("master_user", array("user_username" => $username))->row_array();
        $pos_id = $datauser["position_id"];
        $getpos = $this->db->get_where("hr_position", array("position_id" => $pos_id))->row_array();
        $id_dept = $getpos["department_id"];
        $table_dept = $this->db->get_where("hr_department", array("department_id" => $id_dept))->row_array();
        return $table_dept["department_name"];
    }

    //fungsi ambil data nama departemen dari tabel departmen
    public function getdepartmentbyid($department_name)
    {
       return $this->db->get_where("hr_department", array("department_name" => $department_name))->row_array();
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

    // fungsi insert task
    public function insert_task($data_task)
    {
        return $this->db->insert("tm_task", $data_task);
    }

    //update status layanan / service
    public function updatestatuslayanan($id, $status)
    {
        $this->db->set('service_status', $status);
        $this->db->where('service_id', $id);
        $this->db->update('master_service');

        return "berhasil";
    }

    //fungsi untuk tambah layanan / service
    public function insert_layanan($data_layanan)
    {
        return $this->db->insert("master_service", $data_layanan);
    }

    //fungsi ambil data table produk by nama produk
    public function getproduk($produk)
    {
        return $this->db->get_where("master_product", array("product_name" => $produk))->row_array();
    }

    //fungsi untuk tambah pelanggan / customer
    public function insert_pelanggan($data_pelanggan)
    {
        return $this->db->insert("crm_customer", $data_pelanggan);
    }

    //fungsi ambil data seluruh employe
    public function getall_employee()
    {
        return $this->db->get('hr_employee')->result_array();
    }

    public function getreportall($dept)
        {
            if ($dept != "1") { //jika bukan CEO yang login
                $sql = "SELECT employee_name, department_name,
                        COUNT(IF(a.task_status='Finish',1,NULL)) as total_selesai, 
                        COUNT(IF(a.task_status='Not Finished',1,NULL)) as total_belum, 
                        COUNT(a.task_status='Finish') as total_task,a.employee_destination FROM hr_employee 
                        JOIN tm_task as a ON hr_employee.employee_id = a.employee_destination
                        JOIN hr_department ON hr_department.department_id = a.department_destination
                        WHERE a.department_destination = '$dept'
                        GROUP by employee_destination";
            }else{
                $sql = "SELECT employee_name, department_name,
                        COUNT(IF(a.task_status='Finish',1,NULL)) as total_selesai, 
                        COUNT(IF(a.task_status='Not Finished',1,NULL)) as total_belum, 
                        COUNT(a.task_status='Finish') as total_task,a.employee_destination FROM hr_employee 
                        JOIN tm_task as a ON hr_employee.employee_id = a.employee_destination
                        JOIN hr_department ON hr_department.department_id = a.department_destination
                        GROUP by employee_destination";
            }
            $result = $this->db->query($sql);
            return $result->result_array();
        }
    public function getreportall_periode($dept, $tgl_start, $tgl_end)
        {
            if ($dept != "1") { //jika bukan CEO yang login
                $sql = "SELECT employee_name, department_name,
                        COUNT(IF(a.task_status='Finish',1,NULL)) as total_selesai, 
                        COUNT(IF(a.task_status='Not Finished',1,NULL)) as total_belum, 
                        COUNT(a.task_status='Finish') as total_task,a.employee_destination FROM hr_employee 
                        JOIN tm_task as a ON hr_employee.employee_id = a.employee_destination
                        JOIN hr_department ON hr_department.department_id = a.department_destination 
                        WHERE a.task_date BETWEEN '$tgl_start' AND '$tgl_end' AND
                        a.department_destination = '$dept'
                        GROUP by employee_destination";
            }else{
                $sql = "SELECT employee_name, department_name,
                        COUNT(IF(a.task_status='Finish',1,NULL)) as total_selesai, 
                        COUNT(IF(a.task_status='Not Finished',1,NULL)) as total_belum, 
                        COUNT(a.task_status='Finish') as total_task,a.employee_destination FROM hr_employee 
                        JOIN tm_task as a ON hr_employee.employee_id = a.employee_destination
                        JOIN hr_department ON hr_department.department_id = a.department_destination 
                        WHERE a.task_date BETWEEN '$tgl_start' AND '$tgl_end'
                        GROUP by employee_destination";
            }
            $result = $this->db->query($sql);
            return $result->result_array();
        }

    //function-fiunction datatable
        public function count_all($dept, $status)
        {
            $this->db->where("task_parent", null);
            $dept_dest = array($dept, 5);
            $this->db->where_in("department_destination", $dept_dest);
            if ($status != "") {
                $this->db->where("task_status", $status);
            }
            return $this->db->count_all_results('tm_task');
        }

        public function filter($search, $limit, $start, $order_field, $order_ascdesc, $dept, $status)
        {
            $this->db->like('task_title', $search);
            $this->db->where("task_parent", null);
            $dept_dest = array($dept, 5);
            $this->db->where_in("department_destination", $dept_dest);
            if ($status != "") {
                $this->db->where("task_status", $status);
            }
            $this->db->order_by($order_field, $order_ascdesc);
            $this->db->limit($limit, $start);
            $this->db->select("task_title,a.employee_name as penerima,b.employee_name as pengirim,task_dateline,task_status,task_id");
            $this->db->join("hr_employee as a", "a.employee_id = tm_task.employee_destination", 'left'); //join tabel employe dengan task
            $this->db->join("hr_employee as b", "b.employee_id = tm_task.employee_sent", 'left'); //join tabel employe dengan task
            return $this->db->get('tm_task')->result_array();
        }

        public function count_filter($search, $dept, $status)
        {
            $this->db->where("task_parent", null);
            $this->db->like('task_title', $search);
            $dept_dest = array($dept, 5);
            $this->db->where_in("department_destination", $dept_dest);
            if ($status != "") {
                $this->db->where("task_status", $status);
            }
            return $this->db->get('tm_task')->num_rows();
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

    //function-fiunction datatable task departement
        public function count_all_dept($dept, $status)
        {
            if ($status != "") {
                $this->db->where("a.task_status", $status);
            }
            $this->db->select("b.task_title as task_parent, employee_name, a.task_title as task, a.task_id, a.task_dateline, a.task_status, a.department_destination");
            $this->db->join("hr_employee", "hr_employee.employee_id = a.employee_destination", 'left'); //join tabel employe dengan task
            $this->db->join("tm_task as b", "b.task_id = a.task_parent", 'left'); //join tabel employe dengan task
            $this->db->where("a.department_destination", $dept);
            return $this->db->count_all_results("tm_task as a");
        }

        public function filter_dept($search, $limit, $start, $order_field, $order_ascdesc, $dept, $status)
        {
            if ($status != "") {
                $this->db->where("a.task_status", $status);
            }
            $this->db->like('a.task_title', $search);
            $this->db->order_by($order_field, $order_ascdesc);
            $this->db->limit($limit, $start);
            $this->db->select("b.task_title as task_parent, employee_name, a.task_title as task, a.task_id, a.task_dateline, a.task_status, a.department_destination");
            $this->db->join("hr_employee", "hr_employee.employee_id = a.employee_destination", 'left'); //join tabel employe dengan task
            $this->db->join("tm_task as b", "b.task_id = a.task_parent", 'left'); //join tabel employe dengan task
            $this->db->where("a.department_destination", $dept);
            return $this->db->get('tm_task as a')->result_array();
        }

        public function count_filter_dept($search, $dept, $status)
        {
            if ($status != "") {
                $this->db->where("a.task_status", $status);
            }
            $this->db->like('a.task_title', $search);
            $this->db->select("b.task_title as task_parent, employee_name, a.task_title as task, a.task_id, a.task_dateline, a.task_status, a.department_destination");
            $this->db->join("hr_employee", "hr_employee.employee_id = a.employee_destination", 'left'); //join tabel employe dengan task
            $this->db->join("tm_task as b", "b.task_id = a.task_parent", 'left'); //join tabel employe dengan task
            $this->db->where("a.department_destination", $dept);
            return $this->db->get('tm_task as a')->num_rows();
        }
    //akhir function-fiunction datatable task departement

    //function-fiunction datatable tiket saya
        public function count_all_tiket($employ_id, $status)
        {
            if ($status != "") {
                $this->db->where("a.task_status", $status);
            }
            // $this->db->select("b.task_title as task_parent, employee_name, a.task_title as task, a.task_id,a.task_parent, a.task_dateline, a.task_status, a.employee_sent,a.employee_destination)");
            $this->db->join("hr_employee", "hr_employee.employee_id = a.employee_destination", 'left'); //join tabel employe dengan task
            $this->db->join("tm_task as b", "b.task_id = a.task_parent", 'left'); //join tabel employe dengan task
            $this->db->where("a.employee_sent", $employ_id);
            return $this->db->count_all_results("tm_task as a");
        }

        public function filter_tiket($search, $limit, $start, $order_field, $order_ascdesc, $employ_id, $status)
        {
            if ($status != "") {
                $this->db->where("a.task_status", $status);
            }
            $this->db->where("a.employee_sent", $employ_id);
            $this->db->like('a.task_title', $search);
            // $this->db->like('b.task_title', $search);
            $this->db->order_by($order_field, $order_ascdesc);
            $this->db->limit($limit, $start);
            $this->db->select("b.task_title as task_parent, employee_name, a.task_title as task, a.task_id, a.task_dateline, a.task_status, a.department_destination,a.employee_sent");
            $this->db->join("hr_employee", "hr_employee.employee_id = a.employee_destination", 'left'); //join tabel employe dengan task
            $this->db->join("tm_task as b", "b.task_id = a.task_parent", 'left'); //join tabel employe dengan task
            return $this->db->get('tm_task as a')->result_array();
        }

        public function count_filter_tiket($search, $employ_id, $status)
        {
            if ($status != "") {
                $this->db->where("a.task_status", $status);
            }
            $this->db->like('a.task_title', $search);
            // $this->db->select("b.task_title as task_parent, employee_name, a.task_title as task, a.task_id,a.task_parent, a.task_dateline, a.task_status, a.employee_sent,a.employee_destination)");
            $this->db->join("hr_employee", "hr_employee.employee_id = a.employee_destination", 'left'); //join tabel employe dengan task
            $this->db->join("tm_task as b", "b.task_id = a.task_parent", 'left'); //join tabel employe dengan task
            $this->db->where("a.employee_sent", $employ_id);
            return $this->db->get('tm_task as a')->num_rows();
        }
    //akhir function-fiunction datatable tiket saya

    //function-fiunction datatable tugas saya
        public function count_all_tugas($employ_id, $status, $status_employee)
        {
            if ($status != "") {
                $this->db->where("a.task_status", $status);
            }
            // $this->db->select("b.task_title as task_parent, employee_name, a.task_title as task, a.task_id,a.task_parent, a.task_dateline, a.task_status, a.employee_sent,a.employee_destination)");
            $this->db->join("hr_employee", "hr_employee.employee_id = a.employee_destination", 'left'); //join tabel employe dengan task
            $this->db->join("tm_task as b", "b.task_id = a.task_parent", 'left'); //join tabel employe dengan task
            $this->db->join("hr_department", "hr_department.department_id = a.department_destination", "left");
            if ($status_employee != "C-Level") {
                $this->db->where("a.employee_destination", $employ_id);
            }
            return $this->db->count_all_results("tm_task as a");
        }

        public function filter_tugas($search, $limit, $start, $order_field, $order_ascdesc, $employ_id, $status, $status_employee)
        {
            if ($status != "") {
                $this->db->where("a.task_status", $status);
            }
            if ($status_employee != "C-Level") {
                $this->db->where("a.employee_destination", $employ_id);
            }
            $this->db->like('a.task_title', $search);
            // $this->db->like('b.task_title', $search);
            $this->db->order_by($order_field, $order_ascdesc);
            $this->db->limit($limit, $start);
            $this->db->select("b.task_title as task_parent, employee_name, a.task_title as task, a.task_id, a.task_dateline, a.task_status, a.department_destination,a.employee_sent,a.employee_destination,department_name");
            $this->db->join("hr_employee", "hr_employee.employee_id = a.employee_destination", 'left'); //join tabel employe dengan task
            $this->db->join("tm_task as b", "b.task_id = a.task_parent", 'left'); //join tabel employe dengan task
            $this->db->join("hr_department", "hr_department.department_id = a.department_destination", "left");
            return $this->db->get('tm_task as a')->result_array();
        }

        public function count_filter_tugas($search, $employ_id, $status, $status_employee)
        {
            if ($status != "") {
                $this->db->where("a.task_status", $status);
            }
            $this->db->like('a.task_title', $search);
            // $this->db->select("b.task_title as task_parent, employee_name, a.task_title as task, a.task_id,a.task_parent, a.task_dateline, a.task_status, a.employee_sent,a.employee_destination)");
            $this->db->join("hr_employee", "hr_employee.employee_id = a.employee_destination", 'left'); //join tabel employe dengan task
            $this->db->join("tm_task as b", "b.task_id = a.task_parent", 'left'); //join tabel employe dengan task
            $this->db->join("hr_department", "hr_department.department_id = a.department_destination", "left");
            if ($status_employee != "C-Level") {
                $this->db->where("a.employee_destination", $employ_id);
            }
            return $this->db->get('tm_task as a')->num_rows();
        }
    //akhir function-fiunction datatable tugas saya

}
