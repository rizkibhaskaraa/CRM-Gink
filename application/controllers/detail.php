<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('detail_model');
    }

    public function detailumum($designation, $user, $task, $status, $cekTabel)
    {
        if (!isset($_SESSION["login"])) {
            redirect(base_url());
        } else {
            $user = $_SESSION["staff_id"];
        }
        $data["designation"] = $designation;
        //data employ yang akses
        $user1 = $this->detail_model->getuser($user);
        $data["username"] = $user1["user_username"];
        $employ = $this->detail_model->getemploy($user);
        $data["employ_nama"] = $employ["employee_name"];
        $data["employ_id"] = $employ["employee_id"];
        $data["status"] = $status;

        //get nama posisi
        $posisi = $this->detail_model->getdeptposisi($designation);
        $data["position"] = $posisi["position_name"];

        //akhir data employ yang akses

        $data["department_destination"] = $this->detail_model->getdeptbyid($data["task"]["department_destination"]);
        $data["customer"] = $this->detail_model->getcustomer($data["task"]["service_id"]);
        $data["nama_layanan"] = $this->detail_model->getservice($data["task"]["service_id"]);

        $data["cekTabel"] = $cekTabel; //cek table asal
        $data["getPJ"] = $this->detail_model->getsemuaPJ($posisi["position_id"]); //data employ di departemen
        $data["task"] = $this->detail_model->getdetail($task); //data task dengan id $task
        $data["PJ_task"] = $this->detail_model->getPJ_task($task); //data task dengan id $task
        $data["nama_kirim"] = $this->detail_model->getnama_kirim($task); //nama pengirim
        $data["dept_PJtask"] = $this->detail_model->getdeptPJTask($task); //data departemen PJ task
        $data["komentar"] = $this->detail_model->getkomentar($task); //ambil data komentar, untuk task parent
        $data["komentarsub"] = $this->detail_model->getkomentarsub($task); //ambil data komentar, untuk subtask
        $data["nama_dept"] = $this->detail_model->getdeptcalonpj($posisi["position_id"]); //data departemen calon PJ task
        $data['namaPJ'] = $this->detail_model->getnama_PJ($task); //data nama PJ task
        $data['tugas_employ'] = $this->detail_model->gettugaspj($data["task"]["department_destination"]); //data tugas milik calon PJ
        $data["semua_employ"] = $this->detail_model->getsemuaemploy($posisi["position_id"]); //data employ pada suatu departemen
        $data["subtask"] = $this->detail_model->getsubtask($task); //ambil subtask berdasarkan parent task
        $data["subtaskselesai"] = $this->detail_model->getsubtaskselesai($task); //get subtask yang sudah selesai
        $this->load->view('detail/detail', $data);
    }
    //add PJ task
    public function ubahPJ($id, $task)
    {
        $ubah = $this->detail_model->ubahPJ($this->input->post("PJbaru"), $task);
        $user = $this->detail_model->getuser($id);
        redirect(base_url('index.php/home/index/') . $user['user_username']);
    }
    //fungsi ubah status task menjadi selesai
    public function ubahstatustask($designation, $id, $task, $status)
    {
        $config['upload_path'] = './upload/'; //letak folder file yang akan diupload
        $config['allowed_types'] = 'gif|jpg|png|img|jpeg|doc|docx|xls|xlsx|ppt|pptx|pdf'; //jenis file yang dapat diterima
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $data['nama_berkas'] =  $this->upload->data('file_name');
        }
        $ubah = $this->detail_model->ubahstatustask($task, $data['nama_berkas']);
        redirect(base_url('index.php/home/detail/') . $designation . "/" . $id . "/" . $task . "/" . $status . "/Request");
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
        redirect(base_url('index.php/home/index/') . $user['user_username']);
    }
    //menambahkan subtiket
    public function addsubtiket($designation, $id_employ, $id_Task, $status, $tabel)
    {
        date_default_timezone_set('Asia/Bangkok');
        $employ = $this->detail_model->getemploy($id_employ);
        $posisi = $this->detail_model->getdeptposisi($designation);
        $departemen = $this->detail_model->getdept($posisi["department_id"]);

        //membuat id_task
        // $task = $this->detail_model->gettask();
        // $id_task = [];
        // foreach ($task as $value) {
        //     $no_id = substr($value["id_task"], 5);
        //     $no_id = intval($no_id);
        //     array_push($id_task, $no_id);
        // }
        // $max_id = max($id_task);
        // $id_task = "TASK-" . ($max_id + 1);
        //akhir membuat id_task
        if ($this->input->post("id_service") == NULL) {
            $data_sub_task = array(
                // "id_task" => $id_task,
                "department_destination" => $departemen["department_id"],
                "employee_destination" => $this->input->post("PJsubtask"),
                "task_parent" => $this->input->post("id_parent"),
                "employee_sent" => $id_employ,
                "department_sent" => $departemen["department_id"],
                "task_title" => $this->input->post("title"),
                "task_description" => $this->input->post("deskripsi"),
                "task_date" => date("Y-m-d H-i-s"),
                "task_dateline" => $this->input->post("dateline"),
                "task_status" => "Not Finished"
            );
        } else {
            $data_sub_task = array(
                // "id_task" => $id_task,
                "service_id" => $this->input->post("id_service"),
                // "customer" => $this->input->post("customer"),
                // "nama_layanan" => $this->input->post("nama_layanan"),
                "department_destination" => $departemen["department_id"],
                "employee_destination" => $this->input->post("PJsubtask"),
                "task_parent" => $this->input->post("id_parent"),
                "employee_sent" => $id_employ,
                "department_sent" => $departemen["department_id"],
                "task_title" => $this->input->post("title"),
                "task_description" => $this->input->post("deskripsi"),
                "task_date" => date("Y-m-d H-i-s"),
                "task_dateline" => $this->input->post("dateline"),
                "task_status" => "Not Finished"
            );
        }
        $this->detail_model->insert_sub_task($data_sub_task, $id_employ, $id_Task);
        redirect(base_url('index.php/detail/detailumum/') . $designation . "/" . $id_employ . "/" . $id_Task . "/" . $status . "/" . $tabel);
    }
    //add fungsi tambah komentar
    public function addkomen($designation, $id_employ, $id_task, $status, $tabel)
    {
        date_default_timezone_set('Asia/Bangkok');
        $position = $this->detail_model->getdeptposisi($designation);

        $data = array(
            "comment_description" => $this->input->post("komentar"),
            "task_id" => $id_task,
            "employee_id" => $id_employ,
            "position_id" => $position["position_id"],
            "comment_date" => date("Y-m-d H-i-s")
        );
        $this->detail_model->buatkomen($data);
        redirect(base_url('index.php/detail/detailumum/') . $designation . "/" . $id_employ . "/" . $id_task . "/" . $status . "/" . $tabel);
    }
    //add fungsi delete komentar
    public function deletekomen($idtask, $id_employ, $tabel, $idkomen)
    {
        $this->detail_model->deletekomen($idkomen);
        redirect(base_url('index.php/detail/detailumum/') . $id_employ . "/" . $idtask . "/" . $tabel);
    }
}
