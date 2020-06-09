<?php
error_reporting(0);
class login_model extends CI_model
{
    public function getstaff($email){
        $this->db->where("email = ",$email);
        $this->db->or_where("username = ",$email);
        return $this->db->get('staff')->row_array();
    }

}