<?php
error_reporting(0);
class login_model extends CI_model
{
    public function getuser($email)
    {
        return $this->db->get_where('master_user', array("user_username" => $email))->row_array();
    }
    public function getemploy($id_user)
    {
        return $this->db->get_where('hr_employee', array("employee_id" => $id_user))->row_array();
    }
    public function getdept($id_user)
    {
        return $this->db->get_where('hr_position', array("position_id" => $id_user))->row_array();
    }
}
