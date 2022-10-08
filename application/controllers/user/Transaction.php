<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Transaction extends CI_Controller
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

    public function list()
    {
        $admin = $this->session->userdata('Login_Auth');
        $data['title'] = 'Payment History';
        $data['ArrayPayInfo'] = $this->Curd_model->PayinfoUser("tbl_login.id = $admin[id]");
        $this->load->view('user/transaction-history', $data);
    }


    public function user_payment_received()
	{
        $admin = $this->session->userdata('Login_Auth');
		$data['title'] = 'User Send Payment Admin History';
		$qey = [
			'select' => 'tbl_payment_send_user.*,tbl_login.name, tbl_payment_send_user.id as Pay_ID, tbl_payment_send_user.date as Pay_Date',
			'from' => 'tbl_payment_send_user',
			'join1' => 'tbl_login',
			'join2' => 'tbl_payment_send_user.user_id = tbl_login.id',
            'where' => 'tbl_payment_send_user.user_id = ' . $admin['id'] . '',

		];
		$data['ArrayPay'] = $this->Curd_model->SelectDataJoin($qey, $qey['where']);
		$this->load->view('user/user-send-payment-admin-history', $data);
	}
}
