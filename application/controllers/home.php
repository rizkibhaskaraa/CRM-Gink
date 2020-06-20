<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->model('detail_model');
    }
    
    public function hapussession(){
        session_destroy();
		redirect(base_url());
    }

    public function index($user)
    {   
        if(!isset($_SESSION["login"])){
            redirect(base_url());
        }else{
            $user = $_SESSION["staff_user"];
        }
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
        $data["tiket"] = $this->home_model->gettiket($employ["id_employ"]);
        $this->load->view('home/home', $data);
    }

    public function status($id)
    {
        $user = $this->home_model->updatestatus($id);
        redirect(base_url('index.php/home/index/') . $user);
    }

    public function detail($id, $task, $cekTabel)
    {   
        if(!isset($_SESSION["login"])){
            redirect(base_url());
        }else{
            $id = $_SESSION["staff_id"];
        }
        redirect(base_url('index.php/detail/detailumum/') . $id . "/" . $task . "/" . $cekTabel);
    }

    public function search($employ_id,$layanan, $status, $search)
    {
        $search_pelanggan = str_replace('%20', ' ', $search);
        $layanan_pelanggan = str_replace('%20', ' ', $layanan);
        $status_pelanggan = str_replace('%20', ' ', $status);
        $data["pelanggan"] = $this->home_model->getsearch($layanan_pelanggan, $status_pelanggan, $search_pelanggan);
        $data["employ_id"] = $employ_id;
        $this->load->view('home/hasil_search', $data);
    }

    function get_pelanggan(){
		$id_pelanggan=$this->input->get('id');
		$data=$this->home_model->getpelangganbyid($id_pelanggan);
		echo json_encode($data);
	}
}
