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
        $employ = $this->detail_model->getemploy($user);
        $data["employ_nama"] = $employ["nama"];
        $data["employ_id"] = $employ["id_employ"];
        $data["employ_dept"] = $employ["id_departemen"];
        $data["status"] = $employ["status"];
        $data["cekTabel"] = $cekTabel;
        $data["getPJ"] = $this->detail_model->getsemuaPJ($employ["id_departemen"]);
        $data["task"] = $this->detail_model->getdetail($task);
        $data["PJ_task"] = $this->detail_model->getPJ_task($task);
        $data["nama_kirim"] = $this->detail_model->getnama_kirim($task);
        $data["dept_PJtask"] = $this->detail_model->getdeptPJTask($task);

        $data['namaPJ'] = $this->detail_model->getnama_PJ($task);
        $data["nama_kirim"] = $this->detail_model->getemploy($data["task"]["id_employ_kirim"]);
        $data["dep_kirim"] = $this->detail_model->getdept($data["nama_kirim"]["id_departemen"]);
        $data["tugas_employ"] = $this->detail_model->gettugasemploy($data["task"]["id_employ_kirim"]);
        $this->load->view('detail/detail', $data);
    }
    public function ubahPJ($id, $task)
    {
        $ubah = $this->detail_model->ubahPJ($this->input->post("PJbaru"), $task);
        $user = $this->detail_model->getuser($id);
        redirect(base_url('index.php/home/index/') . $user['username']);
    }
    public function insertLaporan($id, $task)
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png|img|jpeg|doc|docx|xls|xlsx|ppt|pptx|pdf';

        $this->load->library('upload', $config);
        $this->detail_model->taskSelesai($task);

        if ($this->upload->do_upload('file')) {
            $this->upload->data();

            $data['nama_berkas'] =  $this->upload->data('file_name');
            $this->detail_model->Laporan($id, $data['nama_berkas'], $task);
        }
        $user = $this->detail_model->getuser($id);
        redirect(base_url('index.php/home/index/') . $user['username']);
    }
}
