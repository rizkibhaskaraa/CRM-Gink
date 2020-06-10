<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->load->view('login/register');
    }
    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[staff.email]');
        $this->form_validation->set_rules('password', 'pw', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'pw', 'required|trim|matches[password]');
        if ($this->form_validation->run() == false) {
            $this->load->view('login/register');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'departemen' => $this->input->post('departemen'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            ];

            $this->login_model->getstaff($data);
        }
    }
}
