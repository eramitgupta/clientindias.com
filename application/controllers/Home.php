<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Curd_model');
	}

    public function index(){
        $data['title'] = 'Home';
        if(!empty($this->session->userdata('Login_Auth'))){
            $userID = $this->session->userdata('Login_Auth');
            $data['loginArray'] = $this->Curd_model->Select('tbl_login', ['id' => $userID['id']]);
        }

        $data['ArraySettings'] = $this->Curd_model->Select('tbl_settings');
        $data['ArrayCategory'] = $this->Curd_model->Select('tbl_category');
        $data['BannerArray'] = $this->Curd_model->Select('tbl_banner');
        $this->load->view('web/index', $data);
    }
}

?>