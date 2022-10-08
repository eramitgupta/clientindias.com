<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Curd_model');
	}

    public function index(){
        if(empty($this->input->post())){
            redirect(base_url());
        }
        if(!empty($this->session->userdata('Login_Auth'))){
            $userID = $this->session->userdata('Login_Auth');
            $data['loginArray'] = $this->Curd_model->Select('tbl_login', ['id' => $userID['id']]);
        }
        $data['title'] = 'Checkout';
        $data['ArraySettings'] = $this->Curd_model->Select('tbl_settings');
        $data['ArrayCategory'] = $this->Curd_model->Select('tbl_category');
        $data['ArrayPriceCheck'] = $this->Curd_model->Select('tbl_category',['id'=> $this->input->post()['id']]);
        $data['buy'] = $this->input->post();
        $this->load->view('web/checkout', $data);
    }


    public function payment(){
        if (empty($_FILES['file']['name'])) {
            echo json_encode(array("statusCode" => 201, "msg" => 'Screenshot Required'));
        } else {
            $config['upload_path']          = 'uploads/payment/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 50000;
            $config['encrypt_name']         = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file')) {
                echo json_encode(array("statusCode" => 201, "msg" => 'Screenshot Required'));
            } else {
                $photo = array('upload_data' => $this->upload->data());
                $payScreenshot = $photo['upload_data']['file_name'];
            }
        }

        $data = [
            'user_id'=> $this->security->xss_clean($this->session->userdata('Login_Auth')['id']),
            'course_id'=> $this->security->xss_clean($this->input->post('id')),
            'transaction_no'=> $this->security->xss_clean($this->input->post('transaction_no')),
            'screenshot'=> $this->security->xss_clean($payScreenshot),
            'price'=> $this->security->xss_clean($this->input->post('price')),
            'commission'=> $this->security->xss_clean($this->input->post('commission')),
            'status'=> $this->security->xss_clean('Pending'),
            'date'=> date('Y-m-d H:i:s'),
        ];
        if ($this->Curd_model->insert('tbl_payment', $data) == true) {
            echo json_encode(array("statusCode" => 200, "msg" => 'Successfully Submit Request', "url" => base_url('user/index')));
        }else{
            echo json_encode(array("statusCode" => 201, "msg" => 'Server Error!'));
        }


    }

}

?>