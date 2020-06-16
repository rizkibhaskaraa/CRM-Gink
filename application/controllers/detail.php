<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('detail_model');
    }

    public function detailhead($user, $task)
    {
        $employ = $this->detail_model->getemploy($user);
        $data["employ_nama"] = $employ["nama"];
        $data["employ_id"] = $employ["id_employ"];
        $data["employ_dept"] = $employ["id_departemen"];
        $data["status"] = $employ["status"];

        $data["getPJ"] = $this->detail_model->getsemuaPJ($employ["id_departemen"]);
        $data["task"] = $this->detail_model->getdetail($task);
        $data["PJ_task"] = $this->detail_model->getPJ_task($task);
        $this->load->view('detail/detailhead', $data);
    }
    public function detail($user, $task)
    {
        $employ = $this->detail_model->getemploy($user);
        $data["employ_nama"] = $employ["nama"];
        $data["employ_id"] = $employ["id_employ"];
        $data["employ_dept"] = $employ["id_departemen"];
        $data["status"] = $employ["status"];

        $data["getPJ"] = $this->detail_model->getsemuaPJ($employ["id_departemen"]);
        $data["task"] = $this->detail_model->getdetail($task);
        $data["PJ_task"] = $this->detail_model->getPJ_task($task);
        $this->load->view('detail/detail', $data);
    }
    public function ubahPJ($id, $task)
    {
        $ubah = $this->detail_model->ubahPJ($this->input->post("PJbaru"), $task);
<<<<<<< HEAD
        redirect(base_url());
=======
        redirect(base_url('index.php/detail/detailhead/') . $id . "/" . $task);
>>>>>>> muttaqin
    }
    public function do_upload()
    {
<<<<<<< HEAD
        // setting konfigurasi upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            $result = $this->upload->data();
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        }
=======
        $file = $this->input->post('file');

        $this->detail_model->Laporan($id, $file, $task);
        redirect(base_url('index.php/detail/detail/') . $id . "/" . $task);
>>>>>>> muttaqin
    }
}
