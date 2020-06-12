<?php
error_reporting(0);
class home_model extends CI_model
{
    public function getemploy($user){
        $user = $this->db->get_where("user",array("username"=>$user))->row_array();
        $id_employ = $user["id_employ"];
        return $this->db->get_where("employe",array("id_employ"=>$id_employ))->row_array();
    }
    
    public function gettaskselesai($id_employ){
        return $this->db->get_where('task', array('id_employ_tujuan'=>$id_employ,"status"=>"selesai"))->result_array();
    }
    public function gettaskbelum($id_employ){
        return $this->db->get_where('task', array('id_employ_tujuan'=>$id_employ,'status'=>"belum selesai"))->result_array();
    }
    
    public function updatestatus($id){
        //update
        $this->db->set('status',"selesai");
        $this->db->where('id_task',$id);
        $this->db->update('task');
        //data user
        $task = $this->db->get_where("task",array("id_task"=>$id))->row_array();
        $employ = $this->db->get_where("employe",array("id_employ"=>$task["id_employ_tujuan"]))->row_array();
        $user = $this->db->get_where("user",array("id_employ"=>$employ["id_employ"]))->row_array();
        return $user["username"];
    }
}