<?php
error_reporting(0);
class home_model extends CI_model
{
    public function gettaskselesai($user){
        $nama = $this->db->get_where("staff",array('username'=>$user))->row_array();
        return $this->db->get_where('task', array('nama_to'=>$nama["nama"],"status"=>"selesai"))->result_array();
    }
    public function gettaskbelum($user){
        $nama = $this->db->get_where("staff",array('username'=>$user))->row_array();
        return $this->db->get_where('task', array('nama_to'=>$nama["nama"],'status'=>"belum selesai"))->result_array();
    }

    public function updatestatus($id){
        //update
        $this->db->set('status',"selesai");
        $this->db->where('id',$id);
        $this->db->update('task');
        //data user
        $task = $this->db->get_where("task",array("id"=>$id))->row_array();
        $user = $this->db->get_where("staff",array("nama"=>$task["nama_to"]))->row_array();
        return $user["username"];
    }
}