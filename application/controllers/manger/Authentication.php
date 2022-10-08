<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Authentication extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $admin = $this->session->userdata('Login_Auth');
        $this->load->model('Curd_model');
        $AuthLogin = $this->Curd_model->authLogin($admin['id'], 'manger');
        $Login['loginData'] = $AuthLogin;
        $this->load->view('manger/template/array', $Login);
        if (empty($AuthLogin)) {
            $this->session->unset_userdata('Login_Auth');
            $array_msg = array('msg' => 'Access Denied!', 'icon' => 'error');
            $this->session->set_flashdata($array_msg);
            redirect(base_url());
        }
    }


    public function password_change($id){
        $data['AccountArray'] = $this->Curd_model->Select('tbl_login', ['id'=> $id]);
        $data['title']  = 'Password Change';
        $this->load->view('manger/password-change', $data);
    }

    public function passwordUpdateCode()
    {
        $id = $this->security->xss_clean($this->input->post('id'));
        $CurrentPassword = $this->security->xss_clean($this->input->post('CurrentPassword'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $Cpassword = $this->security->xss_clean($this->input->post('cpassword'));
        $data = $this->Curd_model->getAccounts($id);
        if (password_verify($CurrentPassword, $data['password']) == true) {
            if ($password == $Cpassword) {
                $cpass    = $this->security->xss_clean(password_hash($Cpassword, PASSWORD_BCRYPT));
                if ($this->Curd_model->update('tbl_login', ['id' => $id], ['password' => $cpass]) == true) {
                    echo json_encode(array("statusCode" => 200, "msg" => 'Successfully Update Password', "url" => base_url('manger/index')));
                } else {
                    echo json_encode(array("statusCode" => 201, "msg" => 'Server Error'));
                }
            } else {
                echo json_encode(array("statusCode" => 201, "msg" => 'Password Not Match'));
            }
        } else {
            echo json_encode(array("statusCode" => 201, "msg" => 'Password is incorrect'));
        }
    }
}
