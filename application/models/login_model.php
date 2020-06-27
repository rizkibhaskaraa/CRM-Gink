<?php
error_reporting(0);
class login_model extends CI_model
{
    public function getuser($email)
    {
        return $this->db->get_where('user',array("username"=>$email))->row_array();
    }
    public function getemploy($id_user)
    {
        return $this->db->get_where('employe',array("id_employ"=>$id_user))->row_array();
    }
    
    public function regisStaff($data)
    {
        $this->db->insert('staff', $data);
    }
}
