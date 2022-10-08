<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inquiry extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Curd_model');
	}

    public function save(){
        $this->form_validation->set_rules('name', 'Name', 'trim|strip_tags|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|strip_tags|required|valid_email');
        $this->form_validation->set_rules('number', 'Phone Number', 'trim|strip_tags|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|strip_tags|required');
        $this->form_validation->set_rules('massages', 'Massages', 'trim|strip_tags|required');
		if ($this->form_validation->run() == false) {
			$string = str_replace('</p>', '', validation_errors());
			$arrError = explode('<p>', $string);
			echo json_encode(array("statusCode" => 201, "msg" => array_filter($arrError)[1]));
		} else {
            $data = $this->security->xss_clean($this->input->post());
            if($this->Curd_model->insertLastId('tbl_inquiry', $data) == true) {
                echo json_encode(array("statusCode" => 200, "msg" => "Thank you for your enquiry. we will respond as soon as possible!"));
            }else{
                echo json_encode(array("statusCode" => 201, "msg" => "Server Error!"));
            }
        }
    }
}
