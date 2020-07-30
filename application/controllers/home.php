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
        //data seluruh employee//
        $data["all_employ"] = $this->home_model->getall_employee();
        //ambil designation
        $designation = $this->home_model->getdesignationUser($user);
        $data["designation"] = $designation["designation_id"];

        //ambil data dari tabel employ berdasarkan user yang login ($user)
        $employ = $this->home_model->getemploy($user); //memanggil fungsi getemploy di home_model
        $data["username"] = $user;
        $data["employ_nama"] = $employ["employee_name"];
        $data["employ_id"] = $employ["employee_id"];

        $data["employ_dept"] = $this->home_model->getdepartemen($user);
        $data["user_dept"] = $data["employ_dept"];
        $data["nama_departemen"] = $data["employ_dept"]["position_name"];

        $userdata = $this->home_model->getuser($data["employ_id"]);
        $data["status"] = $userdata["user_status"];
        //akhir ambil data dari tabel employ berdasarkan user yang login ($user)

        $data["pelanggan"] = $pelanggan = $this->home_model->getpelanggan(); //memanggil fungsi getpelanggan di home_model
        $data["layanan"] = $layanan = $this->home_model->getlayanan(); //memanggil fungsi getlayanan di home_model
        $data["product"] = $product = $this->home_model->getproduct(); //memanggil fungsi getlayanan di home_model

        //ambil data tabel task untuk tugas saya
        // $data["taskselesai"] = $this->home_model->gettaskselesai($data["employ_id"], $data["employ_dept"]["department_id"]);
        // $data["taskbelum"] = $this->home_model->gettaskbelum($data["employ_id"], $data["employ_dept"]["department_id"]);
        // $data["tasksaya"] = $this->home_model->gettasksaya($data["employ_id"], $data["employ_dept"]["department_id"]);
        $data["task"] = $this->home_model->gettaskall($data["employ_id"], $data["employ_dept"]["department_id"]);
        // $data["taskparent"] = $this->home_model->gettaskparent($data["employ_dept"]["department_id"]);
        //akhir ambil data tabel task untuk tugas saya

        //ambil data tabel task untuk request tugas
        // $data["taskdihead"] = $this->home_model->gettaskdihead($departemen["nama_departemen"]);
        // $data["taskdiheadkosong"] = $this->home_model->gettaskdiheadkosong($departemen["nama_departemen"]);
        //akhir ambil data tabel task untuk request tugas

        //ambil data tabel task untuk tiket saya
        // $data["tiket"] = $this->home_model->gettiket($data["employ_id"]);
        $data["tiketsaya"] = $this->home_model->gettiketsaya($data["employ_id"]);
        //akhir ambil data tabel task untuk tiket saya

        //ambil data tabel task untuk menghitung report staff
        $data["report"] = $this->home_model->getreport($data["employ_dept"]["department_id"]);
        $data['tugas_belum'] = $this->home_model->gettugaspjbelum($data["employ_dept"]["department_id"]);
        $data['tugas_selesai'] = $this->home_model->gettugaspjselesai($data["employ_dept"]["department_id"]);
        $data['employ_report'] = $this->home_model->getemploydept($data["employ_dept"]["department_id"]);
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
        $data["username"] = $user;
        $data["employ_nama"] = $employ["employee_name"];
        $data["employ_id"] = $employ["employee_id"];
        //akhir ambil data dari tabel employ berdasarkan user yang login ($user)

        //ambil designation
        $designation = $this->home_model->getdesignationUser($user);
        $data["designation"] = $designation["designation_id"];

        //ambil data status 
        $userdata = $this->home_model->getuser($data["employ_id"]);
        $data["status"] = $userdata["user_status"];

        //ambil departemen user
        $data["employ_dept"] = $this->home_model->getdepartemen($user);
        $data["user_dept"] = $data["employ_dept"];
        $data["nama_departemen"] = $data["employ_dept"]["position_name"];

        $data["pelanggan"] = $pelanggan = $this->home_model->getpelanggan(); //memanggil fungsi getpelanggan di home_model
        $data["layanan"] = $layanan = $this->home_model->getlayanan(); //memanggil fungsi getlayanan di home_model
        $data["product"] = $product = $this->home_model->getproduct(); //memanggil fungsi getlayanan di home_model

        //ambil data tabel task untuk tugas saya
        // $data["taskselesai"] = $this->home_model->gettaskselesai($data["employ_id"], $data["employ_dept"]["department_id"]);
        // $data["taskbelum"] = $this->home_model->gettaskbelum($data["employ_id"], $data["employ_dept"]["department_id"]);
        // $data["tasksaya"] = $this->home_model->gettasksaya($data["employ_id"], $data["employ_dept"]["department_id"]);
        $data["task"] = $this->home_model->gettaskall($data["employ_id"], $data["employ_dept"]["department_id"]);
        // $data["taskparent"] = $this->home_model->gettaskparent($data["employ_dept"]["department_id"]);
        //akhir ambil data tabel task untuk tugas saya

        //ambil data tabel task untuk menghitung report staff
        $data["report"] = $this->home_model->getreport($data["employ_dept"]["department_id"]);
        $data['tugas_belum'] = $this->home_model->gettugaspjbelum($data["employ_dept"]["department_id"]);
        $data['tugas_selesai'] = $this->home_model->gettugaspjselesai($data["employ_dept"]["department_id"]);
        $data['employ_report'] = $this->home_model->getemploydept($data["employ_dept"]["department_id"]);
        //akhir ambil data tabel task untuk menghitung report staff

        //ambil data tabel task untuk tiket saya
        // $data["tiket"] = $this->home_model->gettiket($data["employ_id"]);
        $data["tiketsaya"] = $this->home_model->gettiketsaya($data["employ_id"]);
        //akhir ambil data tabel task untuk tiket saya

        $this->load->view('home/home_ceo', $data);
    }

    //fungsi update status task
    public function status($id)
    {
        $user = $this->home_model->updatestatus($id); //memanggil fungsi updatestatus di home_model
        redirect(base_url('index.php/home/index/') . $user);
    }

    public function updatelayanan($user)
    {
        $id_layanan = $this->input->post("id_layanan");
        $status = $this->input->post("status-layanan");
        $this->home_model->updatestatuslayanan($id_layanan, $status);
        $this->session->set_flashdata("sukses_update_status", "berhasil");
        redirect(base_url('index.php/home/ceo/') . $user);
    }
    //fungsi menuju halaman detail
    public function detail($designation, $id, $task, $status, $cekTabel)
    {
        if (!isset($_SESSION["login"])) { //jika belum login
            redirect(base_url());
        } else { //jika sudah login
            $id = $_SESSION["staff_id"];
        }
        redirect(base_url('index.php/detail/detailumum/') . $designation . "/" . $id . "/" . $task . "/" . $status . "/" . $cekTabel);
    }

    //fungsi search report (periode report)
    public function searchreport($employ_id, $tgl_start, $tgl_end)
    {
        $employ = $this->home_model->getemploytiket($employ_id);
        $user = $this->home_model->getuser($employ["employee_id"]);
        $departemen = $this->home_model->getdepartemen($user["user_username"]);
        $data["tgl_start"] = $tgl_start . " 00:00:00"; //concat tanggal dengan jam 00:00:00
        $data["tgl_end"] = $tgl_end . " 00:00:00"; //concat tanggal dengan jam 00:00:00

        //mengambil data report staff dati tabel task
        $data["report"] = $this->home_model->getreport_periode($departemen["department_id"], $data["tgl_start"], $data["tgl_end"]);
        $data['tugas_belum'] = $this->home_model->gettugaspjbelum_periode($departemen["department_id"], $data["tgl_start"], $data["tgl_end"]);
        $data['tugas_selesai'] = $this->home_model->gettugaspjselesai_periode($departemen["department_id"], $data["tgl_start"], $data["tgl_end"]);
        //akhir mengambil data report staff dati tabel task

        $data["employ_id"] = $employ_id;
        $data['employ_report'] = $this->home_model->getemploydept($departemen["department_id"]);
        $this->load->view('home/hasil_search_report', $data);
    }

    //fungsi mendapatkan data tabel pelanggan join layanan
    function get_pelanggan()
    {
        $id_layanan = $this->input->get('id');
        $data = $this->home_model->getlayananbyid($id_layanan);
        echo json_encode($data);
    }

    function get_customer()
    {
        $id_customer = $this->input->get('id');
        $data = $this->home_model->getcustomerbyid($id_customer);
        echo json_encode($data);
    }
    //fungsi untuk menambah data tiket/task
    public function addtiket($id_employ)
    {
        date_default_timezone_set('Asia/Bangkok'); //set timezone waktu

        $employ = $this->home_model->getemploytiket($id_employ);
        $user = $this->home_model->getuser($id_employ);
        $departemen = $this->home_model->getdepartemen($user["user_username"]);



        $masalah = $this->input->post("masalah");
        if ($masalah != null) {
            if ($masalah == "umum") {
                $departemen_tujuan = "umum";
            } else if ($masalah == "hosting" || $masalah == "billing") {
                $departemen_tujuan = "Sales And Marketing";
            } else if ($masalah == "support") {
                $departemen_tujuan = "Research And Development";
            }
            $department_id = $this->home_model->getdepartmentbyid($departemen_tujuan);
            if ($department_id == "") {
                $department_id = NULL;
            } else {
                $department_id = $department_id["department_id"];
            }
            //jika buat tiket dari tabel pelanggan
            $data_task = array(
                "service_id" => $this->input->post("service"),
                "department_destination" => $department_id,
                "employee_sent" => $id_employ,
                "department_sent" => $departemen["department_id"],
                "task_title" => $this->input->post("title"),
                "task_description" => $this->input->post("deskripsi"),
                "task_date" => date("Y-m-d H-i-s"),
                "task_dateline" => $this->input->post("dateline"),
                "task_status" => "Not Finished"
            );
            //akhir jika buat tiket dari tabel pelanggan
        } else {
            $departemen_tujuan = $this->input->post("departemen");
            $department_id = $this->home_model->getdepartmentbyid($departemen_tujuan);
            $id_pengirim = $this->input->post("nama_pengirim");
            if ($id_pengirim == $employ["employee_id"] || $id_pengirim == null) {
                $departemen_sent = $departemen["department_id"];
            } else {
                $id_employ = $id_pengirim;
                $departemen_sent = null;
            }
            //jika staff yang buat tiket untuk staff
            $data_task = array(
                "department_destination" => $department_id["department_id"],
                "employee_sent" => $id_employ,
                "department_sent" => $departemen_sent,
                "task_title" => $this->input->post("title"),
                "task_description" => $this->input->post("deskripsi"),
                "task_date" => date("Y-m-d H-i-s"),
                "task_dateline" => $this->input->post("dateline"),
                "task_status" => "Not Finished"
            );
            //akhir jika staff yang buat tiket untuk staff
        }
        //akhir menentukan departemen tujuan
        $this->home_model->insert_task($data_task);
        $this->session->set_flashdata("sukses_buat", "Berhasil");
        if ($departemen["department_id"] == "1") {
            redirect(base_url('index.php/home/ceo/') . $user["user_username"]);
        } else {
            redirect(base_url('index.php/home/index/') . $user["user_username"]);
        }
    }

    //function-fiunction datatable
    public function view($dept)
    {
        $search = $_POST['search']['value'];
        $limit = $_POST['length'];
        $start = $_POST['start'];
        $status = $this->input->post('searchStatus');
        $order_index = $_POST['order'][0]['column'];
        $order_field = $_POST['columns'][$order_index]['data'];
        $order_ascdesc = $_POST['order'][0]['dir'];
        $sql_total = $this->home_model->count_all($dept, $status);
        $sql_data = $this->home_model->filter($search, $limit, $start, $order_field, $order_ascdesc, $dept, $status);
        $sql_filter = $this->home_model->count_filter($search, $dept, $status);
        $callback = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $sql_total,
            'recordsFiltered' => $sql_filter,
            'data' => $sql_data
        );

        header('Content-Type: application/json');
        echo json_encode($callback);
    }
    //akhir function-fiunction datatable

    public function tambahlayanan($username)
    {
        $produk = $this->input->post("kategori_produk");
        $produk = $this->home_model->getproduk($produk);
        // $id_lay = [];
        // foreach ($layanan as $value) {
        //     $no_id = substr($value["id_layanan"], 4);
        //     $no_id = intval($no_id);
        //     array_push($id_lay, $no_id);
        // }
        // $max_id = max($id_lay);
        // $id_layanan = "LYN-" . ($max_id + 1);
        //akhir membuat id_layanan

        $data_layanan = array(
            "service_name" => $this->input->post("nama-layanan"),
            "service_status" => $this->input->post("status-layanan"),
            "customer_id" => $this->input->post("customer_id"),
            "product_id" => $produk["product_id"],
        );
        $this->home_model->insert_layanan($data_layanan);
        $this->session->set_flashdata("sukses_add_layanan", "Berhasil");
        redirect(base_url('index.php/home/ceo/') . $username);
    }

    //function-fiunction datatable pelanggan
    public function view_pelanggan()
    {
        $search = $_POST['search']['value'];
        $limit = $_POST['length'];
        $start = $_POST['start'];
        $status = $this->input->post('searchStatus');
        $order_index = $_POST['order'][0]['column'];
        $order_field = $_POST['columns'][$order_index]['data'];
        $order_ascdesc = $_POST['order'][0]['dir'];
        $sql_total = $this->home_model->count_all_pelanggan($status);
        $sql_data = $this->home_model->filter_pelanggan($search, $limit, $start, $order_field, $order_ascdesc, $status);
        $sql_filter = $this->home_model->count_filter_pelanggan($search, $status);
        // $layanan = $this->home_model->getlayanan();
        $callback = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $sql_total,
            'recordsFiltered' => $sql_filter,
            'data' => $sql_data,
            // 'data-layanan'=>$layanan
        );

        header('Content-Type: application/json');
        echo json_encode($callback);
    }
    public function viewtabel_dept($dept)
    {
        $search = $_POST['search']['value'];
        $limit = $_POST['length'];
        $start = $_POST['start'];
        $status = $this->input->post('searchStatus');
        $order_index = $_POST['order'][0]['column'];
        $order_field = $_POST['columns'][$order_index]['data'];
        $order_ascdesc = $_POST['order'][0]['dir'];
        $sql_total = $this->home_model->count_all_dept($dept, $status);
        $sql_data = $this->home_model->filter_dept($search, $limit, $start, $order_field, $order_ascdesc, $dept, $status);
        $sql_filter = $this->home_model->count_filter_dept($search, $dept, $status);
        // $layanan = $this->home_model->getlayanan();
        $callback = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $sql_total,
            'recordsFiltered' => $sql_filter,
            'data' => $sql_data,
            // 'data-layanan'=>$layanan
        );

        header('Content-Type: application/json');
        echo json_encode($callback);
    }

    //akhir function-fiunction datatable pelanggan   
    public function addcustomer($user)
    {
        $data_pelanggan = array(
            "customer_name" => $this->input->post("customer"),
        );
        $this->home_model->insert_pelanggan($data_pelanggan);
        redirect(base_url('index.php/home/ceo/') . $user);
    }
}
