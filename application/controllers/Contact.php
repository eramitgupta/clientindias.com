<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Curd_model');
	}

    public function index(){
        $data['title'] = 'Contact';

        if(!empty($this->session->userdata('Login_Auth'))){
            $userID = $this->session->userdata('Login_Auth');
            $data['loginArray'] = $this->Curd_model->Select('tbl_login', ['id' => $userID['id']]);
        }
        $data['ArraySettings'] = $this->Curd_model->Select('tbl_settings');
        $data['ArrayCategory'] = $this->Curd_model->Select('tbl_category');
        $this->load->view('web/contact-us', $data);
    }
}

?>