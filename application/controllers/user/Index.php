<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $admin = $this->session->userdata('Login_Auth');
        $this->load->model('Curd_model');
        $AuthLogin = $this->Curd_model->authLogin($admin['id'], 'user');
        $Login['loginData'] = $AuthLogin;
        $this->load->view('user/template/array', $Login);
        if (empty($AuthLogin)) {
            $this->session->unset_userdata('Login_Auth');
            $array_msg = array('msg' => 'Access Denied!', 'icon' => 'error');
            $this->session->set_flashdata($array_msg);
            redirect(base_url());
        }
    }

    public function welcome()
    {
        $h = date('G');
        if ($h >= 5 && $h <= 11) {
            return "Good Morning!";
        } else if ($h >= 12 && $h <= 15) {
            return "Good Afternoon!";
        } else {
            return "Good Evening!";
        }
    }

    public function index()
    {
        $admin = $this->session->userdata('Login_Auth');
        $data['Day1'] = $this->Curd_model->CalculatDataUser('calculator','tbl_transfer_payment','date','1 DAY', "$admin[id]");
        $data['Day7'] = $this->Curd_model->CalculatDataUser('calculator','tbl_transfer_payment','date','7 DAY', "$admin[id]");
        $data['Day30'] = $this->Curd_model->CalculatDataUser('calculator','tbl_transfer_payment','date','30 DAY', "$admin[id]");
        $data['paymentTotal'] = $this->Curd_model->CountsData('tbl_login',['id'=>$admin['id'] ,'role'=>'user']);

        $data['List1'] = $this->Curd_model->PaymentTotal('1 Day');
        $data['List7'] = $this->Curd_model->PaymentTotal('7 Day');
        $data['List30'] = $this->Curd_model->PaymentTotal('30 Day');


        $data['welcome'] = $this->welcome();
        $this->load->view('user/index', $data);
    }
}
