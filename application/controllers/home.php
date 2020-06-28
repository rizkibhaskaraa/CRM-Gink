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

    public function hapussession()
    {
        session_destroy();
        redirect(base_url());
    }

    public function index($user)
    {
        if (!isset($_SESSION["login"])) {
            redirect(base_url());
        } else {
            $user = $_SESSION["staff_user"];
        }
        $employ = $this->home_model->getemploy($user);
        $data["employ_nama"] = $employ["nama"];
        $data["employ_id"] = $employ["id_employ"];
        $data["employ_dept"] = $employ["id_departemen"];
        $data["status"] = $employ["status_employ"];
        $data["pelanggan"] = $pelanggan = $this->home_model->getpelanggan();
        $data["layanan"] = $layanan = $this->home_model->getlayanan();
        $departemen = $this->home_model->getdepartemen($employ["id_departemen"]);
        $data["nama_departemen"] = $departemen["nama_departemen"];

        $data["taskselesai"] = $this->home_model->gettaskselesai($employ["id_employ"]);
        $data["taskbelum"] = $this->home_model->gettaskbelum($employ["id_employ"]);
        $data["taskdihead"] = $this->home_model->gettaskdihead($departemen["nama_departemen"]);
        $data["tasksaya"] = $this->home_model->gettasksaya($data["employ_id"]);
        $data["taskdiheadkosong"] = $this->home_model->gettaskdiheadkosong($departemen["nama_departemen"]);
        $data["taskparent"] = $this->home_model->gettaskparent($departemen["nama_departemen"]);
        $data["tiket"] = $this->home_model->gettiket($employ["id_employ"]);
        $data["report"] = $this->home_model->getreport($departemen["nama_departemen"]);
        $data['tugas_belum'] = $this->home_model->gettugaspjbelum($departemen["nama_departemen"]);
        $data['tugas_selesai'] = $this->home_model->gettugaspjselesai($departemen["nama_departemen"]);
        $data['employ_report'] = $this->home_model->getemploydept($data["employ_dept"]);
        $this->load->view('home/home', $data);
    }
    public function ceo($user)
    {
        if (!isset($_SESSION["login"])) {
            redirect(base_url());
        } else {
            $user = $_SESSION["staff_user"];
        }
        $employ = $this->home_model->getemploy($user);
        $data["employ_nama"] = $employ["nama"];
        $data["employ_id"] = $employ["id_employ"];
        $data["employ_dept"] = $employ["id_departemen"];
        $data["status"] = $employ["status_employ"];
        $data["pelanggan"] = $pelanggan = $this->home_model->getpelanggan();
        $departemen = $this->home_model->getdepartemen($employ["id_departemen"]);
        $data["nama_departemen"] = $departemen["nama_departemen"];

        $data["taskselesai"] = $this->home_model->gettaskselesai($employ["id_employ"],$departemen["nama_departemen"]);
        $data["taskbelum"] = $this->home_model->gettaskbelum($employ["id_employ"],$departemen["nama_departemen"]);
        $data["tasksaya"] = $this->home_model->gettasksaya($data["employ_id"],$departemen["nama_departemen"]);
        $data["taskparent"] = $this->home_model->gettaskparent($departemen["nama_departemen"]);
        
        $data["report"] = $this->home_model->getreport($departemen["nama_departemen"]);
        $data['tugas_belum'] = $this->home_model->gettugaspjbelum($departemen["nama_departemen"]);
        $data['tugas_selesai'] = $this->home_model->gettugaspjselesai($departemen["nama_departemen"]);
        $data['employ_report'] = $this->home_model->getemploydept($data["employ_dept"]);

        $data["pelanggan"] = $pelanggan = $this->home_model->getpelanggan();
        $data["layanan"] = $layanan = $this->home_model->getlayanan();

        $data["taskparent"] = $this->home_model->gettaskparent($departemen["nama_departemen"]);
        $data["tiket"] = $this->home_model->gettiket($employ["id_employ"]);
        $data["tiketsaya"] = $this->home_model->gettiketsaya($employ["id_employ"]);

        $this->load->view('home/home_ceo', $data);
    }

    public function status($id)
    {
        $user = $this->home_model->updatestatus($id);
        redirect(base_url('index.php/home/index/') . $user);
    }

    public function editpelanggan()
    {   
        $id = $this->input->post("id_pelanggan");
        $status = $this->input->post("status_pelanggan");
        $user = $this->home_model->updatestatuspelanggan($id,$status);
        redirect(base_url('index.php/home/index/') . $user);
    }

    public function detail($id, $task, $cekTabel)
    {
        if (!isset($_SESSION["login"])) {
            redirect(base_url());
        } else {
            $id = $_SESSION["staff_id"];
        }
        redirect(base_url('index.php/detail/detailumum/') . $id . "/" . $task . "/" . $cekTabel);
    }

    public function search($employ_id, $status, $search)
    {
        $search_pelanggan = str_replace('%20', ' ', $search);
        $status_pelanggan = str_replace('%20', ' ', $status);
        $data["pelanggan"] = $this->home_model->getsearch( $status_pelanggan, $search_pelanggan);
        $data["employ_id"] = $employ_id;
        $data["layanan"] = $layanan = $this->home_model->getlayanan();
        $this->load->view('home/hasil_search', $data);
    }

    public function searchreport($employ_id, $tgl_start, $tgl_end)
    {
        $employ = $this->home_model->getemploytiket($employ_id);
        $departemen = $this->home_model->getdepartemen($employ["id_departemen"]);
        $data["tgl_start"] = $tgl_start." 00:00:00";
        $data["tgl_end"] = $tgl_end." 00:00:00";
        $data["report"] = $this->home_model->getreport_periode($departemen["nama_departemen"],$data["tgl_start"],$data["tgl_end"]);
        $data['tugas_belum'] = $this->home_model->gettugaspjbelum_periode($departemen["nama_departemen"],$data["tgl_start"],$data["tgl_end"]);
        $data['tugas_selesai'] = $this->home_model->gettugaspjselesai_periode($departemen["nama_departemen"],$data["tgl_start"],$data["tgl_end"]);
        $data["employ_id"] = $employ_id;
        $data['employ_report'] = $this->home_model->getemploydept($employ["id_departemen"]);
        $this->load->view('home/hasil_search_report', $data);
    }

    function get_pelanggan()
    {
        $id_pelanggan = $this->input->get('id');
        $data = $this->home_model->getpelangganbyid($id_pelanggan);
        echo json_encode($data);
    }
    function get_layanan()
    {
        $id_pelanggan = $this->input->get('id');
        $data = $this->home_model->getlayananbyid($id_pelanggan);
        echo json_encode($data);
    }

    public function addtiket($id_employ)
    {
        date_default_timezone_set('Asia/Bangkok');

        $employ = $this->home_model->getemploytiket($id_employ);
        $departemen = $this->home_model->getdepartemen($employ["id_departemen"]);

        //validasi form
        $this->form_validation->set_rules('title', 'Judul', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        //akhir validasi form

        if ($this->form_validation->run() == false) {
            $data["id_employ"] = $id_employ;
            redirect(base_url('index.php/home/index/'));
        } else {
            //menentukan departemen tujuan
            $masalah = $this->input->post("masalah");
            if ($masalah != null) {
                if ($masalah == "umum") {
                    $departemen_tujuan = "umum";
                } else if ($masalah == "hosting" || $masalah == "billing") {
                    $departemen_tujuan = "finance";
                } else if ($masalah == "support") {
                    $departemen_tujuan = "developer";
                }
                //jika CS yang buat tiket dari pelanggan
                $data_task = array(
                    "id_task" => rand(0001, 1000),
                    "id_pelanggan" => $this->input->post("id_pelanggan"),
                    "nama_dept_tujuan" => $departemen_tujuan,
                    "id_employ_kirim" => $id_employ,
                    "nama_dept_kirim" => $departemen["nama_departemen"],
                    "title" => $this->input->post("title"),
                    "deskripsi" => $this->input->post("deskripsi"),
                    "kategori_masalah" => $masalah,
                    "date" => date("Y-m-d H-i-s"),
                    "dateline" => $this->input->post("dateline"),
                    "status" => "Belum Selesai"
                );
                //akhir jika CS yang buat tiket dari pelanggan
            } else {
                $departemen_tujuan = $this->input->post("departemen");
                //jika staff yang buat tiket untuk staff
                $data_task = array(
                    "id_task" => rand(0001, 1000),
                    "nama_dept_tujuan" => $departemen_tujuan,
                    "id_employ_kirim" => $id_employ,
                    "nama_dept_kirim" => $departemen["nama_departemen"],
                    "title" => $this->input->post("title"),
                    "deskripsi" => $this->input->post("deskripsi"),
                    "date" => date("Y-m-d H-i-s"),
                    "dateline" => $this->input->post("dateline"),
                    "status" => "Belum Selesai"
                );
                //akhir jika staff yang buat tiket untuk staff
            }
            //akhir menentukan departemen tujuan
            $this->home_model->insert_task($data_task);
            if($departemen["id_departemen"] == "ceo"){
                redirect(base_url('index.php/home/ceo/') . $user["username"]);
            }else{
                redirect(base_url('index.php/home/index/') . $user["username"]);
            }
            
        }
    }

    public function addpelanggan(){
        $data_pelanggan = array(
            "id_pelanggan" => rand(0001, 1000),
            "customer" => $this->input->post("customer"),
            "layanan" => $this->input->post("layanan"),
            "status" => $this->input->post("status_customer")
        );
        $this->home_model->insert_pelanggan($data_pelanggan);
        redirect(base_url('index.php/home/index/') . $user["username"]);
    }
}
