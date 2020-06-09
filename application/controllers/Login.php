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

	public function register(){
		$this->load->view('login/register');
	}
}
