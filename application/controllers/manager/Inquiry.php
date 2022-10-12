<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Inquiry extends CI_Controller
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
        $data['title'] = 'Inquiry';
        $data['ArrayInquiry'] = $this->Curd_model->Select('tbl_inquiry');
        $this->load->view('manager/inquiry', $data);
    }

    public function Status()
    {
        $id = $this->input->get('id');

        $statusInput = $this->input->get('status');
        if ($statusInput == 'Read') {
            $status = 'Pending';
        } else {
            $status = 'Read';
        }

        if ($this->Curd_model->update('tbl_inquiry', ['id' => $id], ['status' => $status]) == true) {
            $array_msg = array('msg' => 'Successfully Update!', 'icon' => 'success');
            $this->session->set_flashdata($array_msg);
            redirect(base_url('manager/inquiry/list'));
        } else {
            $array_msg = array('msg' => 'Server Error!', 'icon' => 'error');
            $this->session->set_flashdata($array_msg);
            redirect(base_url('manager/inquiry/list'));
        }
    }

    public function delete(){
        $id = $this->input->post('delete_id');
        $array = $this->Curd_model->Select('tbl_inquiry', ['id' => $id]);
        if (empty($array)) {
            echo json_encode(array("statusCode" => 201, "msg" => 'Data not found'));
        } else {
            if ($this->Curd_model->Delete('tbl_inquiry', ['id' => $id]) == false) {
                echo json_encode(array("statusCode" => 201, "msg" => 'Server Error!'));
            } else {
                echo json_encode(array("statusCode" => 200, "msg" => 'Deleted Successfully!'));
            }
        }
    }

}
