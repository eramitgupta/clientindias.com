<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Transaction extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $admin = $this->session->userdata('Login_Auth');
        $this->load->model('Curd_model');
        $AuthLogin = $this->Curd_model->authLogin($admin['id'], 'manager');
        $Login['loginData'] = $AuthLogin;
        $this->load->view('manager/template/array', $Login);
        if (empty($AuthLogin)) {
            $this->session->unset_userdata('Login_Auth');
            $array_msg = array('msg' => 'Access Denied!', 'icon' => 'error');
            $this->session->set_flashdata($array_msg);
            redirect(base_url());
        }
    }

    public function list()
    {
        $data['title'] = 'Payment History ';
        $data['ArrayPayInfo'] = $this->Curd_model->Payinfo();
        $this->load->view('manager/transaction-history', $data);
    }

    public function Status()
    {
        $id = $this->input->get('id');
        $user_id = $this->input->get('user_id');
        $commission = $this->input->get('commission');
        $referral_code = $this->input->get('referral_code');
        $statusInput = $this->input->get('status');
        $statusInput = $this->input->get('status');
        if ($statusInput == 'Active') {
            $status = 'Active';
            // $status = 'Pending';
        } else {
            $status = 'Active';
        }
        if ($this->Curd_model->update('tbl_payment', ['id' => $id], ['status' => $status]) == true) {
            $ar = $this->Curd_model->Select('tbl_login', ['ref_code' => $referral_code]);
            $this->Curd_model->walletUpdate($ar[0]['id'], $commission);
                $data = [
                    'user_id' => $ar[0]['id'],
                    'price' => $commission,
                    'date' => date('Y-m-d H:i:s'),
                ];
            $this->Curd_model->insert('tbl_transfer_payment', $data);
            $array_msg = array('msg' => 'Successfully Active!', 'icon' => 'success');
            $this->session->set_flashdata($array_msg);
            redirect(base_url('manager/transaction/list'));
        } else {
            $array_msg = array('msg' => 'Server Error!', 'icon' => 'error');
            $this->session->set_flashdata($array_msg);
            redirect(base_url('manager/transaction/list'));
        }
    }

    public function statusUpdate()
    {
        $id = $this->input->get('id');

        $statusInput = $this->input->get('status');
        if ($statusInput == 'Read') {
            $status = 'Pending';
        } else {
            $status = 'Read';
        }

        if ($this->Curd_model->update('tbl_payment', ['id' => $id], ['status_pay' => $status]) == true) {
            $array_msg = array('msg' => 'Successfully Update!', 'icon' => 'success');
            $this->session->set_flashdata($array_msg);
           redirect(base_url('manager/transaction/list'));
        } else {
            $array_msg = array('msg' => 'Server Error!', 'icon' => 'error');
            $this->session->set_flashdata($array_msg);
           redirect(base_url('manager/transaction/list'));
        }
    }

}
