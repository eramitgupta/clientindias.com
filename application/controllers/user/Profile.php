<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profile extends CI_Controller
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


    public function index()
    {
        $data['title'] = 'My Profile';
        $this->load->view('user/profile', $data);
    }

    public function update()
    {
        $id = $this->security->xss_clean($this->input->post('id'));
        $this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'trim|strip_tags|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|strip_tags|required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|strip_tags|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'My Profile';
            $this->load->view('user/profile', $data);
        } else {
            if (empty($_FILES['file']['name'])) {
                $oldphoto = $this->security->xss_clean($this->input->post('oldphoto'));
            } else {
                if (!empty($this->input->post('oldphoto'))) {
                    unlink("uploads/user/" . $this->input->post('oldphoto'));
                }
                $config['upload_path']          = 'uploads/user/';
                $config['allowed_types']        = 'jpeg|jpg|png';
                $config['max_size']             = 5000;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('file')) {
                    $array_msg = array('msg' => 'Upload is larger than the permitted size', 'icon' => 'error');
                    $this->session->set_flashdata($array_msg);
                    redirect(base_url('user/profile'));
                } else {
                    $photo = array('upload_data' => $this->upload->data());
                    $oldphoto = $photo['upload_data']['file_name'];
                }
            }

            $info = [
                'upi' => $this->security->xss_clean($this->input->post('upi')),
                'aadharcard' => $this->security->xss_clean($this->input->post('aadharcard')),
                'pancard' => $this->security->xss_clean($this->input->post('pancard')),
                'accountholdername' => $this->security->xss_clean($this->input->post('accountholdername')),
                'bankname' => $this->security->xss_clean($this->input->post('bankname')),
                'accountnumber' => $this->security->xss_clean($this->input->post('accountnumber')),
                'ifsccode' => $this->security->xss_clean($this->input->post('ifsccode')),
                'accounttype' => $this->security->xss_clean($this->input->post('accounttype')),
                'branchdetail' => $this->security->xss_clean($this->input->post('branchdetail')),
            ];

            $data = [
                'name' => $this->security->xss_clean($this->input->post('name')),
                'mobile' => $this->security->xss_clean($this->input->post('mobile')),
                'email' => $this->security->xss_clean($this->input->post('email')),
                'photo' => $this->security->xss_clean($oldphoto),
                'user_info' => json_encode($info),
            ];

            if ($this->Curd_model->update('tbl_login', ['id' => $id], $data) == false) {
                $array_msg = array('msg' => 'Server Error!', 'icon' => 'error');
                $this->session->set_flashdata($array_msg);
                redirect(base_url('user/profile'));
            } else {
                $array_msg = array('msg' => 'Successfully Update!', 'icon' => 'success');
                $this->session->set_flashdata($array_msg);
                redirect(base_url('user/profile'));
            }
        }
    }
}
