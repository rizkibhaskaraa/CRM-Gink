<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('tiket_model');
    }

    public function index($id_employ){
        $data["id_employ"] = $id_employ;
        $this->load->view("tiket/tiket",$data);
    }

    public function addtiket($id_employ){
        $user = $this->tiket_model->getuser($id_employ);
        $employ = $this->tiket_model->getemploy($id_employ);
        $departemen = $this->tiket_model->getdept($employ["id_departemen"]);
        $data_task = array(
            "id_task" => rand(0001,1000),
            "nama_dept_tujuan" => $this->input->post("departemen"),
            "id_employ_kirim" => $id_employ,
            "nama_dept_kirim" => $departemen["nama_departemen"],
            "title" => $this->input->post("title"),
            "deskripsi" => $this->input->post("deskripsi"),
            "date" => date("Y-m-d"),
            "dateline" => $this->input->post("dateline"),
            "status" => "belum selesai"
        );
        $this->tiket_model->insert_task($data_task);

        redirect(base_url('index.php/home/index/').$user["username"]);
    }


}