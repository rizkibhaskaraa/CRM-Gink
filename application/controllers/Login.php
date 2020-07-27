<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	//fungsi index
	public function index()
	{
		$this->load->view('login/login');
	}

	//fungsi login 
	public function login()
	{
		//validasi form
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		//akhir validasi form

		if ($this->form_validation->run() == false) { //jika validasi tidak gagal
			redirect(base_url());
		} else {
			$this->validationLogin();
		}
	}

	//fungsi untuk validasi login
	public function validationLogin()
	{
		$email = $this->input->post('username'); //ambil value dari form
		$password = $this->input->post('password'); //ambil value dari form
		$user = $this->login_model->getuser($email); //ambil data user
		$employ = $this->login_model->getemploy($user["employee_id"]); //ambil data employe
		$data["user"] = $user;
		if ($user) { //jika hasil ada
			$saved_password = password_hash($user['user_password'], PASSWORD_DEFAULT);
			if (password_verify($password, $saved_password)) { //cek kecocokan password
				//set session
				$_SESSION["login"] = true;
				$_SESSION["staff_user"] = $email;
				$_SESSION["staff_id"] = $user["employee_id"];
				//akhir set session
				
				$this->session->set_flashdata('status-login', 'Berhasil');

				if ($user["user_status"] == "C-Level") {
					redirect(base_url('index.php/home/ceo/') . $email);
				} else {
					redirect(base_url('index.php/home/index/') . $email);
				}
			} else {
				redirect(base_url());
			}
		} else {
			echo "kamu disini";
			redirect(base_url());
		}
	}

	// public function email(){
	// 	$this->load->view("login/email");
	// }

	// public function register(){
	// 	$this->load->view('login/register');
	// }

	// public function send_email(){

	// 	//$email_to = $this->input->post('email');

	// 	$config = [
	// 		'protocol' => 'smtp',
	// 		'smtp_host' => 'ssl://smtp.googlemail.com',
	// 		'smtp_port' =>	465,
	// 		'smtp_user' => 'technologygink@gmail.com',
	// 		'smtp_pass' => 'kpgink1234',
	// 		'mailtype'  => 'html', 
	// 		'charset'   => 'utf-8',
	// 		'wordwrap' => TRUE
	// 	];

	// 	$this->load->library('email',$config);
	// 	$this->email->set_newline("\r\n");
	//     $this->email->from('technologygink@gmail.com','gink technology');
	//     $this->email->to("aldi.14117055@student.itera.ac.id");
	//     $this->email->subject('Contoh Kirim Email Dengan Codeigniter');
	// 	$this->email->message('Contoh pesan yang dikirim dengan codeigniter');

	//     if($this->email->send()) {
	//         echo 'Email berhasil dikirim';
	//     }
	//     else {
	//         echo 'Email tidak berhasil dikirim';
	//         echo '<br />';
	//     	echo $this->email->print_debugger();
	//     }
	// }

}
