<?php
error_reporting(0);
class tiket_model extends CI_model
{
    public function getemploy($id_employ){
        return $this->db->get_where("employe",array("id_employ"=>$id_employ))->row_array();
    }

    public function getdept($id_departemen){
        return $this->db->get_where("departemen",array("id_departemen"=>$id_departemen))->row_array();
    }

    public function getuser($id_employ){
        return $this->db->get_where("user",array("id_employ"=>$id_employ))->row_array();
    }

    public function insert_task($data_task){
        return $this->db->insert("task",$data_task);
    }

    public function getpelangganid($id_pelanggan){
        return $this->db->get_where("pelanggan",array("id_pelanggan"=>$id_pelanggan))->row_array();
    }
}