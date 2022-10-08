<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verification extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Curd_model');
        $this->load->helper('emailsent');
    }

    public function index()
    {
        $data['title'] = 'Account Verification';
        $this->load->view('admin/front-end/account-verification', $data);
    }
}
