<?php
error_reporting(0);
class home_model extends CI_model
{
    public function getemploy($user)
    {
        $user = $this->db->get_where("user", array("username" => $user))->row_array();
        $id_employ = $user["id_employ"];
        return $this->db->get_where("employe", array("id_employ" => $id_employ))->row_array();
    }

    public function getuser($id_employ){
        return $this->db->get_where("user",array("id_employ"=>$id_employ))->row_array();
    }

    public function getemploytiket($id_employ){
        return $this->db->get_where("employe",array("id_employ"=>$id_employ))->row_array();
    }

    public function getpelanggan()
    {
        return $this->db->get("pelanggan")->result_array();
    }

    public function getpelangganbyid($id)
    {
        return $this->db->get_where("pelanggan", array("id_pelanggan" => $id))->row_array();
    }

    public function getdepartemen($id_departemen)
    {
        return $this->db->get_where("departemen", array("id_departemen" => $id_departemen))->row_array();
    }

    public function gettaskselesai($id_employ)
    {
        return $this->db->get_where('task', array('id_employ_tujuan' => $id_employ, "status" => "Selesai"))->result_array();
    }
    public function gettaskbelum($id_employ)
    {
        return $this->db->get_where('task', array('id_employ_tujuan' => $id_employ, 'status' => "Belum Selesai"))->result_array();
    }
    public function gettiket($id_employ)
    {
        return $this->db->get_where('task', array('id_employ_kirim' => $id_employ))->result_array();
    }
    public function gettaskdihead($nama_departemen)
    {   
        $departemen = array($nama_departemen,"umum");
        $this->db->order_by('status', 'ASC');
        $this->db->order_by('dateline', 'ASC');
        $this->db->join("employe", "employe.id_employ = task.id_employ_tujuan");
        $this->db->where_in('nama_dept_tujuan', $departemen);
        return $this->db->get('task')->result_array();
    }
    public function gettaskdiheadkosong($nama_departemen)
    {   
        $departemen = array($nama_departemen,"umum");
        $this->db->order_by('status', 'ASC');
        $this->db->order_by('dateline', 'ASC');
        $this->db->where_in('nama_dept_tujuan', $departemen);
        return $this->db->get('task')->result_array();
    }
    public function updatestatus($id)
    {
        //update
        date_default_timezone_set('Asia/Bangkok');
        $this->db->set('status', "Selesai");
        $this->db->set('waktu_selesai', date("Y-m-d H-i-s"));
        $this->db->where('id_task', $id);
        $this->db->update('task');
        //data user
        $task = $this->db->get_where("task", array("id_task" => $id))->row_array();
        $employ = $this->db->get_where("employe", array("id_employ" => $task["id_employ_tujuan"]))->row_array();
        $user = $this->db->get_where("user", array("id_employ" => $employ["id_employ"]))->row_array();
        return $user["username"];
    }

    public function updatestatuspelanggan($id,$status)
    {
        $this->db->set('status', $status);
        $this->db->where('id_pelanggan', $id);
        $this->db->update('pelanggan');

        $task = $this->db->get_where("task", array("id_task" => $id))->row_array();
        $employ = $this->db->get_where("employe", array("id_employ" => $task["id_employ_tujuan"]))->row_array();
        $user = $this->db->get_where("user", array("id_employ" => $employ["id_employ"]))->row_array();
        return $user["username"];
    }

    public function getsearch($layanan, $status, $search)
    {
        if ($layanan == "semua") {
            if ($status == "semua") {
            } else {
                $this->db->where("status", $status);
            }
        } else {
            if ($status == "semua") {
                $this->db->where("layanan", $layanan);
            } else {
                $this->db->where("layanan", $layanan);
                $this->db->where("status", $status);
            }
        }
        $this->db->like('customer', $search);
        return $this->db->get("pelanggan")->result_array();
    }

    public function insert_task($data_task){
        return $this->db->insert("task",$data_task);
    }
    public function insert_pelanggan($data_pelanggan){
        return $this->db->insert("pelanggan",$data_pelanggan);
    }
}
