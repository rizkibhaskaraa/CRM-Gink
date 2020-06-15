<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
    }

    public function index($user)
    {
        $employ = $this->home_model->getemploy($user);
        $data["employ_nama"] = $employ["nama"];
        $data["employ_id"] = $employ["id_employ"];
        $data["employ_dept"] = $employ["id_departemen"];
        $data["status"] = $employ["status"];
        $data["pelanggan"] = $pelanggan = $this->home_model->getpelanggan();
        $departemen = $this->home_model->getdepartemen($employ["id_departemen"]);
        $data["nama_departemen"] = $departemen["nama_departemen"];

        $data["taskselesai"] = $this->home_model->gettaskselesai($employ["id_employ"]);
        $data["taskbelum"] = $this->home_model->gettaskbelum($employ["id_employ"]);
        $data["taskdihead"] = $this->home_model->gettaskdihead($departemen["nama_departemen"]);
        $this->load->view('home/home', $data);
    }

    public function status($id)
    {
        $user = $this->home_model->updatestatus($id);
        redirect(base_url('index.php/home/index/') . $user);
    }

    public function detail($id, $task)
    {
        redirect(base_url('index.php/detail/detailumum/') . $id . "/" . $task);
    }
}
