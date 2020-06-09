<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('login/login');
	}

	public function login(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('login/login');
		} else {
			$this->validationLogin();
		}
	}

	public function validationLogin(){
		$email = $this->input->post('username');
		$password = $this->input->post('password');
		$staff = $this->login_model->getstaff($email);
		$data["staff"] = $staff;
		if ($staff) { //jika hasil ada
			$saved_password = password_hash($staff['password'], PASSWORD_DEFAULT);
			if(password_verify($password, $saved_password)){
				$this->load->view('Home/home',$data); //jgnn lupa diubah tujuan
			} else {
				$this->load->view('login/login');
			}
		} else {
			echo "kamu disini";
			$this->load->view('login/login');
		}
	}

	public function email(){
		$this->load->view("login/email");
	}

	public function register(){
		$this->load->view('login/register');
	}

	public function send_email(){
		
		//$email_to = $this->input->post('email');

		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' =>	465,
			'smtp_user' => 'indrawanaldi75@gmail.com',
			'smtp_pass' => 'memangcantik',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1',
			'wordwrap' => TRUE
		];

		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
        $this->email->from('indrawanaldi75@gmail.com');
        $this->email->to("aldi.14117055@student.itera.ac.id");
        $this->email->subject('Contoh Kirim Email Dengan Codeigniter');
		$this->email->message('Contoh pesan yang dikirim dengan codeigniter');
		
        if($this->email->send()) {
            echo 'Email berhasil dikirim';
        }
        else {
            echo 'Email tidak berhasil dikirim';
            echo '<br />';
        	echo $this->email->print_debugger();
        }
	}

}
