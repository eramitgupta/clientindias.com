<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Package extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Curd_model');
    }

    public function details($url)
    {

        if(!empty($this->session->userdata('Login_Auth'))){
            $userID = $this->session->userdata('Login_Auth');
            $data['loginArray'] = $this->Curd_model->Select('tbl_login', ['id' => $userID['id']]);
        }
        $data['ArraySettings'] = $this->Curd_model->Select('tbl_settings');
        $data['ArrayCategory'] = $this->Curd_model->Select('tbl_category');
        $data['ArrayCourseData'] = $this->Curd_model->Select('tbl_category', ['url'=> $url]);
        if(empty($data['ArrayCourseData'])){
            $array_msg = array('msg' => 'Access Denied!', 'icon' => 'error');
			$this->session->set_flashdata($array_msg);
            redirect(base_url());
        }
        $data['title'] = $data['ArrayCourseData'][0]['name'];
        $this->load->view('web/course-details', $data);
    }
}
