<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Smtp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $admin = $this->session->userdata('Login_Auth');
        $this->load->model('Curd_model');
        $AuthLogin = $this->Curd_model->authLogin($admin['id'], 'admin');
        $Login['loginData'] = $AuthLogin;
        $this->load->view('admin/template/array', $Login);
        if (empty($AuthLogin)) {
            $this->session->unset_userdata('Login_Auth');
            $array_msg = array('msg' => 'Access Denied!', 'icon' => 'error');
            $this->session->set_flashdata($array_msg);
            redirect(base_url());
        }
    }

    public function list()
    {
        $data['title'] = 'SMTP';
        $data['smtpArray'] = $this->Curd_model->Select('tbl_smtp');

        $this->load->view('admin/smtp', $data);
    }

    public function update()
    {
        $data =  $this->input->post();
        if ($this->Curd_model->update('tbl_smtp', ['id' => $data['id']] , $data) == true) {
            $array_msg = array('msg' => 'Successfully Update!', 'icon' => 'success');
            $this->session->set_flashdata($array_msg);
            redirect(base_url('admin/smtp/list'));
        } else {
            $array_msg = array('msg' => 'Server Error!', 'icon' => 'error');
            $this->session->set_flashdata($array_msg);
            redirect(base_url('admin/smtp/list'));
        }
    }
}
