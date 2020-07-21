<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model'); //load model
        $this->load->model('detail_model'); //load model
    }

    //fungsi hapus session
    public function hapussession()
    {
        session_destroy(); //menghapus sessions
        redirect(base_url()); //menuju base url (halaman lofgin)
    }

    //fungsi index
    public function index($user)
    {
        if (!isset($_SESSION["login"])) { //jika belum login
            redirect(base_url());
        } else { //jika sudah login
            $user = $_SESSION["staff_user"];
        }

        //ambil data dari tabel employ berdasarkan user yang login ($user)
        $employ = $this->home_model->getemploy($user); //memanggil fungsi getemploy di home_model
        $data["username"] = $user;
        $data["employ_nama"] = $employ["nama"];
        $data["employ_id"] = $employ["id_employ"];
        $data["employ_dept"] = $employ["id_departemen"];
        $data["status"] = $employ["status_employ"];
        //akhir ambil data dari tabel employ berdasarkan user yang login ($user)

        $data["pelanggan"] = $pelanggan = $this->home_model->getpelanggan(); //memanggil fungsi getpelanggan di home_model
        $data["layanan"] = $layanan = $this->home_model->getlayanan(); //memanggil fungsi getlayanan di home_model
        $departemen = $this->home_model->getdepartemen($employ["id_departemen"]); //memanggil fungsi getdepartemen di home_model
        $data["nama_departemen"] = $departemen["nama_departemen"];

        //ambil data tabel task untuk tugas saya
        $data["taskselesai"] = $this->home_model->gettaskselesai($employ["id_employ"], $departemen["nama_departemen"]);
        $data["taskbelum"] = $this->home_model->gettaskbelum($employ["id_employ"], $departemen["nama_departemen"]);
        $data["taskparent"] = $this->home_model->gettaskparent($departemen["nama_departemen"]);
        $data["tasksaya"] = $this->home_model->gettasksaya($data["employ_id"], $departemen["nama_departemen"]);
        //akhir ambil data tabel task untuk tugas saya

        //ambil data tabel task untuk request tugas
        // $data["taskdihead"] = $this->home_model->gettaskdihead($departemen["nama_departemen"]);
        // $data["taskdiheadkosong"] = $this->home_model->gettaskdiheadkosong($departemen["nama_departemen"]);
        //akhir ambil data tabel task untuk request tugas

        //ambil data tabel task untuk tiket saya
        $data["tiket"] = $this->home_model->gettiket($employ["id_employ"]);
        $data["tiketsaya"] = $this->home_model->gettiketsaya($employ["id_employ"]);
        //akhir ambil data tabel task untuk tiket saya

        //ambil data tabel task untuk menghitung report staff
        $data["report"] = $this->home_model->getreport($departemen["nama_departemen"]);
        $data['tugas_belum'] = $this->home_model->gettugaspjbelum($departemen["nama_departemen"]);
        $data['tugas_selesai'] = $this->home_model->gettugaspjselesai($departemen["nama_departemen"]);
        $data['employ_report'] = $this->home_model->getemploydept($data["employ_dept"]);
        //akhir ambil data tabel task untuk menghitung report staff

        $this->load->view('home/home', $data);
    }

    //fungsi ceo untuk dashboard pada CEO
    public function ceo($user)
    {
        if (!isset($_SESSION["login"])) { //jika belum login
            redirect(base_url());
        } else { //jika sudah login
            $user = $_SESSION["staff_user"];
        }

        //ambil data dari tabel employ berdasarkan user yang login ($user)
        $employ = $this->home_model->getemploy($user); //memanggil fungsi getemploy di home_model
        $data["employ_nama"] = $employ["nama"];
        $data["employ_id"] = $employ["id_employ"];
        $data["employ_dept"] = $employ["id_departemen"];
        $data["status"] = $employ["status_employ"];
        //akhir ambil data dari tabel employ berdasarkan user yang login ($user)

        $data["pelanggan"] = $pelanggan = $this->home_model->getpelanggan(); //memanggil fungsi getpelanggan di home_model
        $data["layanan"] = $layanan = $this->home_model->getlayanan(); //memanggil fungsi getlayanan di home_model
        $departemen = $this->home_model->getdepartemen($employ["id_departemen"]); //memanggil fungsi getdepartemen di home_model
        $data["nama_departemen"] = $departemen["nama_departemen"];

        //ambil data tabel task untuk tugas saya
        $data["taskselesai"] = $this->home_model->gettaskselesai($employ["id_employ"], $departemen["nama_departemen"]);
        $data["taskbelum"] = $this->home_model->gettaskbelum($employ["id_employ"], $departemen["nama_departemen"]);
        $data["tasksaya"] = $this->home_model->gettasksaya($data["employ_id"], $departemen["nama_departemen"]);
        $data["taskparent"] = $this->home_model->gettaskparent($departemen["nama_departemen"]);
        //akhir ambil data tabel task untuk tugas saya

        //ambil data tabel task untuk menghitung report staff
        $data["report"] = $this->home_model->getreport($departemen["nama_departemen"]);
        $data['tugas_belum'] = $this->home_model->gettugaspjbelum($departemen["nama_departemen"]);
        $data['tugas_selesai'] = $this->home_model->gettugaspjselesai($departemen["nama_departemen"]);
        $data['employ_report'] = $this->home_model->getemploydept($data["employ_dept"]);
        //akhir ambil data tabel task untuk menghitung report staff

        //ambil data tabel task untuk tiket saya
        $data["tiket"] = $this->home_model->gettiket($employ["id_employ"]);
        $data["tiketsaya"] = $this->home_model->gettiketsaya($employ["id_employ"]);
        //akhir ambil data tabel task untuk tiket saya

        $this->load->view('home/home_ceo', $data);
    }

    //fungsi update status task
    public function status($id)
    {
        $user = $this->home_model->updatestatus($id); //memanggil fungsi updatestatus di home_model
        redirect(base_url('index.php/home/index/') . $user);
    }

    //fungsi edit status pelanggan
    // public function editpelanggan()
    // {
    //     $id = $this->input->post("id_pelanggan");
    //     $status = $this->input->post("status_pelanggan");
    //     $user = $this->home_model->updatestatuspelanggan($id, $status);
    //     redirect(base_url('index.php/home/index/') . $user);
    // }

    //fungsi menuju halaman detail
    public function detail($id, $task, $cekTabel)
    {
        if (!isset($_SESSION["login"])) { //jika belum login
            redirect(base_url());
        } else { //jika sudah login
            $id = $_SESSION["staff_id"];
        }
        redirect(base_url('index.php/detail/detailumum/') . $id . "/" . $task . "/" . $cekTabel);
    }

    //fungsi mencari data pelanggan dan filter data pelanggan
    public function search($employ_id, $search)
    {
        $search_pelanggan = str_replace('%20', ' ', $search); //menggganti %20 dengan spasi
        //$status_pelanggan = str_replace('%20', ' ', $status); //menggganti %20 dengan spasi
        $data["layanan"] = $this->home_model->getlayanan(); //memanggil fungsi getpelanggan di home_model
        $data["employ_id"] = $employ_id;
        $data["pelanggan"] = $pelanggan = $this->home_model->getsearch($search_pelanggan); //memanggil fungsi getsearch di home_model
        $this->load->view('home/hasil_search', $data);
    }

    //fungsi search report (periode report)
    public function searchreport($employ_id, $tgl_start, $tgl_end)
    {
        $employ = $this->home_model->getemploytiket($employ_id);
        $departemen = $this->home_model->getdepartemen($employ["id_departemen"]);
        $data["tgl_start"] = $tgl_start . " 00:00:00"; //concat tanggal dengan jam 00:00:00
        $data["tgl_end"] = $tgl_end . " 00:00:00"; //concat tanggal dengan jam 00:00:00

        //mengambil data report staff dati tabel task
        $data["report"] = $this->home_model->getreport_periode($departemen["nama_departemen"], $data["tgl_start"], $data["tgl_end"]);
        $data['tugas_belum'] = $this->home_model->gettugaspjbelum_periode($departemen["nama_departemen"], $data["tgl_start"], $data["tgl_end"]);
        $data['tugas_selesai'] = $this->home_model->gettugaspjselesai_periode($departemen["nama_departemen"], $data["tgl_start"], $data["tgl_end"]);
        //akhir mengambil data report staff dati tabel task

        $data["employ_id"] = $employ_id;
        $data['employ_report'] = $this->home_model->getemploydept($employ["id_departemen"]);
        $this->load->view('home/hasil_search_report', $data);
    }

    //fungsi mendapatkan data tabel pelanggan join layanan
    function get_pelanggan()
    {
        $id_layanan = $this->input->get('id');
        $data = $this->home_model->getlayananbyid($id_layanan);
        echo json_encode($data);
    }

    //fungsi mendapatkan data tabel pelanggan
    // function get_layanan()
    // {
    //     $id_pelanggan = $this->input->get('id');
    //     $data = $this->home_model->getlayananbyid($id_pelanggan);
    //     echo json_encode($data);
    // }

    //fungsi untuk menambah data tiket/task
    public function addtiket($id_employ)
    {
        date_default_timezone_set('Asia/Bangkok'); //set timezone waktu

        $employ = $this->home_model->getemploytiket($id_employ);
        $departemen = $this->home_model->getdepartemen($employ["id_departemen"]);

        //validasi form
        $this->form_validation->set_rules('title', 'Judul', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        //akhir validasi form

        //membuat id_task
        $task = $this->home_model->gettask();
        $id_task = [];
        foreach ($task as $value){
            $no_id = substr($value["id_task"],5);
            $no_id = intval($no_id);
            array_push($id_task, $no_id);
        }
        $max_id = max($id_task);
        $id_task = "TASK-".($max_id+1);
        //akhir membuat id_task

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
                    $departemen_tujuan = "Marketing";
                } else if ($masalah == "support") {
                    $departemen_tujuan = "Developer";
                }

                //jika buat tiket dari tabel pelanggan
                $data_task = array(
                    "id_task" => $id_task,
                    "id_pelanggan" => $this->input->post("id_pelanggan"),
                    "customer" => $this->input->post("customer"),
                    "nama_layanan" => $this->input->post("layanan"),
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
                //akhir jika buat tiket dari tabel pelanggan
            } else {
                $departemen_tujuan = $this->input->post("departemen");
                //jika staff yang buat tiket untuk staff
                $data_task = array(
                    "id_task" => $id_task,
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
            if ($departemen["id_departemen"] == "ceo") {
                redirect(base_url('index.php/home/ceo/') . $user["username"]);
            } else {
                redirect(base_url('index.php/home/index/') . $user["username"]);
            }
        }
    }

    //fungsi tambah data pelanggan
    // public function addpelanggan()
    // {
    //     $data_pelanggan = array(
    //         "id_pelanggan" => rand(0001, 1000),
    //         "customer" => $this->input->post("customer"),
    //         "layanan" => $this->input->post("layanan"),
    //         "status" => $this->input->post("status_customer")
    //     );
    //     $this->home_model->insert_pelanggan($data_pelanggan);
    //     redirect(base_url('index.php/home/index/') . $user["username"]);
    // }

    //function-fiunction datatable
    public function view($dept){
        $search = $_POST['search']['value']; 
        $limit = $_POST['length']; 
        $start = $_POST['start']; 
        $order_index = $_POST['order'][0]['column']; 
        $order_field = $_POST['columns'][$order_index]['data']; 
        $order_ascdesc = $_POST['order'][0]['dir']; 
        $sql_total = $this->home_model->count_all($dept); 
        $sql_data = $this->home_model->filter($search, $limit, $start, $order_field, $order_ascdesc,$dept,$status); 
        $sql_filter = $this->home_model->count_filter($search,$dept); 
        $callback = array(        
            'draw'=>$_POST['draw'], 
            'recordsTotal'=>$sql_total,        
            'recordsFiltered'=>$sql_filter,        
            'data'=>$sql_data    
        );    
        
        header('Content-Type: application/json');    
        echo json_encode($callback); 
    }
    //akhir function-fiunction datatable
}
