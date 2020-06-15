<?php
error_reporting(0);
class detail_model extends CI_model
{
    public function getemploy($user)
    {

        return $this->db->get_where("employe", array("id_employ" => $user))->row_array();
    }
    public function getdetail($id_task)
    {
        return $this->db->get_where('task', array('id_task' => $id_task))->row_array();
    }
}
