<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->model('tiket_model');
    }

    public function index($id_employ,$id_pelanggan){
        //session
            if(!isset($_SESSION["login"])){
                redirect(base_url());
            }else{
                $id_employ = $_SESSION["staff_id"];
            }
        //akhir session
        $pelanggan = $this->tiket_model->getpelangganid($id_pelanggan);
        if ($pelanggan != NULL){
            $data["status"] = "CS";
        }
        $data["id_pelanggan"] = $pelanggan["id_pelanggan"];
        $data["customer"] = $pelanggan["customer"];
        $data["layanan"] = $pelanggan["layanan"];
        $data["id_employ"] = $id_employ;
        $employ = $this->tiket_model->getemploy($id_employ);
        $data["employ_nama"] = $employ["nama"];
        $this->load->view("tiket/tiket",$data);
    }

    public function addtiket($id_employ){
        //session
        if(!isset($_SESSION["login"])){
            redirect(base_url());
        }else{
            $id_employ = $_SESSION["staff_id"];
        }
        //akhir session
        $user = $this->tiket_model->getuser($id_employ);
        $employ = $this->tiket_model->getemploy($id_employ);
        $departemen = $this->tiket_model->getdept($employ["id_departemen"]);

        //validasi form
        $this->form_validation->set_rules('title', 'Judul', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim|min_length[50]');
        //akhir validasi form

        if ($this->form_validation->run() == false) {
            $data["id_employ"] = $id_employ;
            redirect(base_url('index.php/home/index/'));
        }else{
            //menentukan departemen tujuan
            $masalah = $this->input->post("masalah");
            if ($masalah != null){
                if($masalah == "umum"){
                    $departemen_tujuan = "umum";
                }else if($masalah == "hosting" || $masalah == "billing"){
                    $departemen_tujuan = "finance";
                }else if($masalah == "support"){
                    $departemen_tujuan = "developer";
                }
                //jika CS yang buat tiket dari pelanggan
                $data_task = array(
                    "id_task" => rand(0001,1000),
                    "id_pelanggan" => $this->input->post("id_pelanggan"),
                    "nama_dept_tujuan" => $departemen_tujuan,
                    "id_employ_kirim" => $id_employ,
                    "nama_dept_kirim" => $departemen["nama_departemen"],
                    "title" => $this->input->post("title"),
                    "deskripsi" => $this->input->post("deskripsi"),
                    "kategori_masalah" => $masalah,
                    "date" => date("Y-m-d"),
                    "dateline" => $this->input->post("dateline"),
                    "status" => "belum selesai"
                );    
                //akhir jika CS yang buat tiket dari pelanggan
            }else{
                $departemen_tujuan = $this->input->post("departemen");
                //jika staff yang buat tiket untuk staff
                $data_task = array(
                    "id_task" => rand(0001,1000),
                    "nama_dept_tujuan" => $departemen_tujuan,
                    "id_employ_kirim" => $id_employ,
                    "nama_dept_kirim" => $departemen["nama_departemen"],
                    "title" => $this->input->post("title"),
                    "deskripsi" => $this->input->post("deskripsi"),
                    "date" => date("Y-m-d"),
                    "dateline" => $this->input->post("dateline"),
                    "status" => "belum selesai"
                );    
                //akhir jika staff yang buat tiket untuk staff
            }
            //akhir menentukan departemen tujuan
            $this->tiket_model->insert_task($data_task);
            redirect(base_url('index.php/home/index/').$user["username"]);
        }
    }


}
