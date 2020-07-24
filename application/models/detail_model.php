<?php
// error_reporting(0);
class detail_model extends CI_model
{
    public function getuser($id)
    {
        //dapatkan data user yang login
        return $this->db->get_where("master_user", array("employee_id" => $id))->row_array();
    }
    public function getemploy($user)
    {
        //dapatkan data user yang login
        return $this->db->get_where("hr_employee", array("employee_id" => $user))->row_array();
    }
    public function getdeptposisi($id_desig)
    {
        $id = $this->db->get_where("hr_designation", array("designation_id" => $id_desig))->row_array();
        return $this->db->get_where("hr_position", array("position_id" => $id["position_id"]))->row_array();
    }
    //fungsi ambil data tabel task
    public function gettask()
    {
        return $this->db->get("tm_task")->result_array();
    }
    // public function getdeptUser($id_task)
    // {
    //     $datatask = $this->db->get_where('tm_task', array('task_id' => $id_task))->row_array();
    //     $iddept = $this->db->get_where('', array('' => $$datatask["employee_destination"]));

    // }
    public function getdetail($id_task)
    {
        //dapatkan data task berdasarkan id task

        $this->db->join("hr_position", "hr_position.department_id = tm_task.department_destination");
        $this->db->join("hr_department", "hr_department.department_id = tm_task.department_destination");

        return $this->db->get_where('tm_task', array('task_id' => $id_task))->row_array();
    }
    public function getcustomer($service_id)
    {
        //dapatkan data task berdasarkan id task
        $this->db->join("crm_customer", "crm_customer.customer_id = master_service.service_id");
        $result = $this->db->get_where('master_service', array('service_id' => $service_id))->row_array();
        return $result["customer_name"];
    }
    public function getservice($service_id)
    {
        //dapatkan data task berdasarkan id task
        $result =  $this->db->get_where('master_service', array('service_id' => $service_id))->row_array();
        return $result["service_name"];
    }
    public function getdeptbyid($dept_id)
    {
        $result = $this->db->get_where('hr_department', array('department_id' => $dept_id))->row_array();
        return $result["department_name"];
    }
    public function getsubtask($id_parent)
    {
        //dapatkan data subtask sesuai id parent yang dikirim
        $this->db->order_by('task_status', 'ASC');
        $this->db->order_by('task_dateline', 'ASC');
        $this->db->join("hr_employee", "hr_employee.employee_id = tm_task.employee_destination");
        $this->db->where('task_parent', $id_parent);
        return $this->db->get('tm_task')->result_array();
    }
    public function getsubtaskselesai($id_parent)
    {
        //mengambil subtask selesai
        return $this->db->get_where('tm_task', array('task_parent' => $id_parent, 'task_status' => "Finish"))->result_array();
    }

    public function getsemuaPJ($position)
    {
        //ambil data semua PJ pada departemen head tsb
        $getpos = $this->db->get_where('hr_position', array('position_id' => $position))->row_array();
        $dept = $getpos["department_id"];
        return $this->db->get_where('hr_position', array('department_id' => $dept))->result_array();
    }
    public function getPJ_task($id_task)
    {
        return $this->db->get_where('tm_task', array('task_id' => $id_task))->row_array();
    }
    public function getdept($id_dept)
    {
        return $this->db->get_where('hr_department', array('department_id' => $id_dept))->row_array();
    }

    public function getnama_PJ($id_task)
    {
        //ambil nama PJ task
        $employ = $this->db->get_where('tm_task', array('task_id' => $id_task))->row_array();
        $id_employ_tujuan = $employ['employee_destination'];
        $data_pj = $this->db->get_where('hr_employee', array('employee_id' => $id_employ_tujuan))->row_array();
        return $data_pj["employee_name"];
    }
    public function getnama_kirim($id_task)
    {
        //join task dan employ
        $employ = $this->db->get_where('tm_task', array('task_id' => $id_task))->row_array();
        //ambil id nama pengirim task
        $id_employ_tujuan = $employ['employee_sent'];
        $data_pj = $this->db->get_where('hr_employee', array('employee_id' => $id_employ_tujuan))->row_array();
        return $data_pj["employee_name"];
    }
    public function getdept_kirim($id_task)
    {
        //ambil nama dept_kirim
        $dept = $this->db->get_where('tm_task', array('task_id' => $id_task))->row_array();
        return $dept["department_sent"];
    }
    public function getdeptPJTask($id_task)
    {
        $employ = $this->db->get_where('tm_task', array('task_id' => $id_task))->row_array();
        $id_employ_tujuan = $employ['employee_destination'];
        $data_pj = $this->db->get_where('hr_designation', array('employee_id' => $id_employ_tujuan))->row_array();
        $id_pos = $data_pj['position_id'];
        $nama_Dept = $this->db->get_where('hr_position', array('position_id' => $id_pos))->row_array();

        return $nama_Dept["position_name"];
    }
    public function ubahstatustask($id, $nama_berkas)
    {
        //update
        date_default_timezone_set('Asia/Bangkok');
        $this->db->set('task_file', $nama_berkas);
        $this->db->set('task_finish', date('Y-m-d H:i:s'));
        $this->db->set('task_status', "Finish");
        $this->db->where('task_id', $id);
        $this->db->update('tm_task');
        //data user

        return $id;
    }
    public function ubahPJ($id_tujuan, $id)
    {
        //update
        $this->db->set('employee_destination', $id_tujuan);
        $this->db->where('task_id', $id);
        $this->db->update('tm_task');
        //data user

        return $id;
    }
    public function taskSelesai($task, $date)
    {
        //update
        $this->db->set('task_status', 'Finish');
        $this->db->set('task_finish', $date);
        $this->db->where('task_id', $task);
        $this->db->update('tm_task');
        //data user

        return $task;
    }
    public function Laporan($id, $file, $task)
    {
        //update
        $this->db->set('task_file', $file);
        $this->db->where('task_id', $task);
        $this->db->update('tm_task');
        //data user

        return $id;
    }

    public function getdeptcalonpj($id_dept)
    {
        //ambil data nama departemen calon PJ pada departemen
        $nama_position = $this->db->get_where('hr_position', array('position_id' => $id_dept))->row_array();
        // $nama_Dept = $this->db->get_where('hr_department', array('department_id' => $nama_postion["department_id"]))->row_array();
        return $nama_position["position_name"];
    }

    public function gettugaspj($dept)
    {
        //join table employ dan task, dan add jumlah task employ yang belum selesai
        $this->db->where("department_destination", $dept);
        $this->db->where("tm_task.task_status", "Not Finished");
        $this->db->where_not_in("employee_destination", "");
        $this->db->select("count(tm_task.task_status),employee_destination,employee_name");
        $this->db->join("hr_employee", "hr_employee.employee_id = tm_task.employee_destination");
        $this->db->group_by("employee_destination");
        return $this->db->get("tm_task")->result_array();
    }

    public function getsemuaemploy($position_id) //id_posisi
    {
        $dept = $this->db->get_where("hr_position", array("position_id" => $position_id))->row_array();
        $this->db->join("hr_designation", "hr_employee.employee_id = hr_designation.employee_id", 'left');
        $this->db->join("hr_position", "hr_position.position_id = hr_designation.position_id");
        // $this->db->join("hr_department", "hr_department.department_id = hr_position.department_id");
        return $this->db->get_where("hr_employee", array("hr_position.department_id" => $dept["department_id"]))->result_array();
    }

    public function insert_sub_task($data_sub_task, $id_employ, $task)
    {
        //update status
        $parent_task = $this->db->get_where('tm_task', array('task_id' => $task))->row_array();
        if ($parent_task["task_status"] == "Finish") {
            $this->db->set('task_status', "Not Finished");
            $this->db->where('task_id', $task);
            $this->db->update('tm_task');
        }
        //akhir update status

        //update
        $this->db->set('employee_destination', $id_employ);
        $this->db->where('task_id', $task);
        $this->db->update('tm_task');
        //data user
        return $this->db->insert("tm_task", $data_sub_task);
    }
    public function getallkomen()
    {
        return $this->db->get("tm_comment")->result_array();
    }
    public function getkomentar($task)
    {
        // $this->db->or_where("id_parent", $task);
        $this->db->order_by('comment_date', 'ASC');
        $this->db->join("hr_employee", "tm_comment.employee_id = hr_employee.employee_id");
        $this->db->join("hr_position", "tm_comment.position_id = hr_position.position_id");
        $this->db->join("tm_task", "tm_comment.task_id = tm_task.task_id");
        $this->db->where("tm_task.task_id", $task);
        $this->db->or_where("tm_task.task_parent", $task);
        return $this->db->get("tm_comment")->result_array();
    }
    public function getkomentarsub($task)
    {
        // $this->db->or_where("id_parent", $task);
        $parent = $this->db->get_where("tm_task", array("task_id" => $task))->row_array();
        $parent1 = $parent["task_parent"];
        $subtask = $this->db->get_where("tm_task", array("task_parent" => $parent1))->result_array();
        $idsubtask = [];
        foreach ($subtask as $value) {
            array_push($idsubtask, $value["task_id"]);
        }

        $this->db->order_by('comment_date', 'ASC');
        $this->db->where("tm_comment.task_id", $parent1);
        $this->db->or_where_in("tm_comment.task_id", $idsubtask);
        $this->db->join("hr_employee", "tm_comment.employee_id = hr_employee.employee_id");
        $this->db->join("hr_position", "tm_comment.position_id = hr_position.position_id");
        $this->db->join("tm_task", "tm_comment.task_id = tm_task.task_id");
        return $this->db->get("tm_comment")->result_array();
    }
    public function buatkomen($data)
    {
        //membuat komentar task
        return $this->db->insert("tm_comment", $data);
    }
    public function deletekomen($data)
    {
        //membuat fungsi delete komentar task
        return $this->db->delete('tm_comment', array('comment_id' => $data));
    }
}
