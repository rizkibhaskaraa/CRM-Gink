<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('home_model');
    }

    public function index($user){
        $data["user"] = $user;
        $data["taskselesai"] = $this->home_model->gettaskselesai($user);
        $data["taskbelum"] = $this->home_model->gettaskbelum($user);
        $this->load->view('home/home',$data);
    }
    
    public function status($id){
        $user = $this->home_model->updatestatus($id);
        redirect(base_url('index.php/home/index/').$user);
    }


}