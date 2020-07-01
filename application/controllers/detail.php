<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('detail_model');
    }

    public function detailumum($user, $task, $cekTabel)
    {
        if (!isset($_SESSION["login"])) {
            redirect(base_url());
        } else {
            $user = $_SESSION["staff_id"];
        }
        //data employ yang akses
        $user1 = $this->detail_model->getuser($user);
        $data["username"] = $user1["username"];
        $employ = $this->detail_model->getemploy($user);
        $data["employ_nama"] = $employ["nama"];
        $data["employ_id"] = $employ["id_employ"];
        $data["employ_dept"] = $employ["id_departemen"];
        $data["status"] = $employ["status_employ"];
        //akhir data employ yang akses

        $data["cekTabel"] = $cekTabel; //cek table asal
        $data["getPJ"] = $this->detail_model->getsemuaPJ($employ["id_departemen"]); //data employ di departemen
        $data["task"] = $this->detail_model->getdetail($task); //data task dengan id $task
        $data["PJ_task"] = $this->detail_model->getPJ_task($task); //data task dengan id $task
        $data["nama_kirim"] = $this->detail_model->getnama_kirim($task); //nama pengirim
        $data["dept_PJtask"] = $this->detail_model->getdeptPJTask($task); //data departemen PJ task
        $data["komentar"] = $this->detail_model->getkomentar($task); //ambil data komentar, untuk task parent
        $data["komentarsub"] = $this->detail_model->getkomentarsub($task); //ambil data komentar, untuk subtask
        $data["nama_dept"] = $this->detail_model->getdeptcalonpj($data["employ_dept"]); //data departemen calon PJ task
        $data['namaPJ'] = $this->detail_model->getnama_PJ($task); //data nama PJ task
        $data['tugas_employ'] = $this->detail_model->gettugaspj($data["nama_dept"]); //data tugas milik calon PJ
        $data["semua_employ"] = $this->detail_model->getsemuaemploy($data["employ_dept"]); //data employ pada suatu departemen
        $data["subtask"] = $this->detail_model->getsubtask($task); //ambil subtask berdasarkan parent task
        $data["subtaskselesai"] = $this->detail_model->getsubtaskselesai($task); //get subtask yang sudah selesai
        $this->load->view('detail/detail', $data);
    }
    //add PJ task
    public function ubahPJ($id, $task)
    {
        $ubah = $this->detail_model->ubahPJ($this->input->post("PJbaru"), $task);
        $user = $this->detail_model->getuser($id);
        redirect(base_url('index.php/home/index/') . $user['username']);
    }
    //fungsi ubah status task menjadi selesai
    public function ubahstatustask($id, $task)
    {
        $ubah = $this->detail_model->ubahstatustask($task);
        redirect(base_url('index.php/home/detail/') . $id . "/" . $task . "/Request");
    }
    //add fungsi tambah laporan
    public function insertLaporan($id, $task)
    {
        $config['upload_path'] = './upload/'; //letak folder file yang akan diupload
        $config['allowed_types'] = 'gif|jpg|png|img|jpeg|doc|docx|xls|xlsx|ppt|pptx|pdf'; //jenis file yang dapat diterima

        $this->load->library('upload', $config);
        date_default_timezone_set('Asia/Bangkok');
        $date = date('Y-m-d H:i:s');
        $this->detail_model->taskSelesai($task, $date);

        if ($this->upload->do_upload('file')) {
            $this->upload->data();

            $data['nama_berkas'] =  $this->upload->data('file_name');
            $this->detail_model->Laporan($id, $data['nama_berkas'], $task);
        }
        $user = $this->detail_model->getuser($id);
        redirect(base_url('index.php/home/index/') . $user['username']);
    }
    //menambahkan subtiket
    public function addsubtiket($id_employ, $id_Task, $tabel)
    {
        date_default_timezone_set('Asia/Bangkok');
        $employ = $this->detail_model->getemploy($id_employ);
        $departemen = $this->detail_model->getdept($employ["id_departemen"]);

        $data_sub_task = array(
            "nama_dept_tujuan" => $departemen["nama_departemen"],
            "id_employ_tujuan" => $this->input->post("PJsubtask"),
            "id_parent" => $this->input->post("id_parent"),
            "id_employ_kirim" => $id_employ,
            "nama_dept_kirim" => $departemen["nama_departemen"],
            "title" => $this->input->post("title"),
            "deskripsi" => $this->input->post("deskripsi"),
            "date" => date("Y-m-d H-i-s"),
            "dateline" => $this->input->post("dateline"),
            "status" => "Belum Selesai"
        );
        $this->detail_model->insert_sub_task($data_sub_task, $id_employ, $id_Task);
        redirect(base_url('index.php/detail/detailumum/') . $id_employ . "/" . $id_Task . "/" . $tabel);
    }
    //add fungsi tambah komentar
    public function addkomen($idtask, $nama, $id_employ, $tabel, $dept)
    {
        date_default_timezone_set('Asia/Bangkok');
        $nama = str_replace('%20', ' ', $nama);
        $dept = str_replace('%20', ' ', $dept);
        $data = array(
            "id_komentar" => rand(0001, 1000),
            "komentar" => $this->input->post("komentar"),
            "id_task" => $idtask,
            "nama_kirim_komen" => $nama,
            "nama_dept_komen" => $dept,
            "tanggal_komen" => date("Y-m-d H-i-s")
        );
        $this->detail_model->buatkomen($data);
        redirect(base_url('index.php/detail/detailumum/') . $id_employ . "/" . $idtask . "/" . $tabel);
    }
    //add fungsi delete komentar
    public function deletekomen($idtask, $id_employ, $tabel, $idkomen)
    {
        $this->detail_model->deletekomen($idkomen);
        redirect(base_url('index.php/detail/detailumum/') . $id_employ . "/" . $idtask . "/" . $tabel);
    }
}
