<?php
error_reporting(0);
class detail_model extends CI_model
{
    public function getuser($id)
    {
        return $this->db->get_where("user", array("id_employ" => $id))->row_array();
    }
    public function getemploy($user)
    {
        return $this->db->get_where("employe", array("id_employ" => $user))->row_array();
    }
    public function getdetail($id_task)
    {
        return $this->db->get_where('task', array('id_task' => $id_task))->row_array();
    }
    public function getsemuaPJ($id_departemen)
    {
        return $this->db->get_where('employe', array('id_departemen' => $id_departemen))->result();
    }
    public function getPJ_task($id_task)
    {
        return $this->db->get_where('task', array('id_task' => $id_task))->row_array();
    }
    public function getnama_PJ($id_task)
    {
        $employ = $this->db->get_where('task', array('id_task' => $id_task))->row_array();
        $id_employ_tujuan = $employ['id_employ_tujuan'];
        $data_pj = $this->db->get_where('employe', array('id_employ' => $id_employ_tujuan))->row_array();
        return $data_pj["nama"];
    }
    public function getnama_kirim($id_task)
    {
        $employ = $this->db->get_where('task', array('id_task' => $id_task))->row_array();
        $id_employ_tujuan = $employ['id_employ_kirim'];
        $data_pj = $this->db->get_where('employe', array('id_employ' => $id_employ_tujuan))->row_array();
        return $data_pj["nama"];
    }
    public function getdept_kirim($id_task)
    {
        $dept = $this->db->get_where('task', array('id_task' => $id_task))->row_array();
        return $dept["nama_dept_kirim"];
    }
    public function getdeptPJTask($id_task)
    {
        $employ = $this->db->get_where('task', array('id_task' => $id_task))->row_array();
        $id_employ_tujuan = $employ['id_employ_tujuan'];
        $data_pj = $this->db->get_where('employe', array('id_employ' => $id_employ_tujuan))->row_array();
        $id_dept = $data_pj['id_departemen'];
        $nama_Dept = $this->db->get_where('departemen', array('id_departemen' => $id_dept))->row_array();
        return $nama_Dept["nama_departemen"];
    }
    public function ubahPJ($id_tujuan, $id)
    {
        //update
        $this->db->set('id_employ_tujuan', $id_tujuan);
        $this->db->where('id_task', $id);
        $this->db->update('task');
        //data user

        return $id;
    }
    public function taskSelesai($task)
    {
        //update
        $this->db->set('status', 'selesai');
        $this->db->where('id_task', $task);
        $this->db->update('task');
        //data user

        return $task;
    }
    public function Laporan($id, $file, $task)
    {
        //update
        $this->db->set('berkas', $file);
        $this->db->where('id_task', $task);
        $this->db->update('task');
        //data user

        return $id;
    }
}
