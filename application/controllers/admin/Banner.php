<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Banner extends CI_Controller
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

    public function add()
    {
        if (empty($_FILES['file']['name'])) {
            $data['title'] = 'Banner Add';
            $this->load->view('admin/banner-add', $data);
        } else {
            $config['upload_path']          = 'uploads/banner/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 2000;
            $config['encrypt_name'] = TRUE;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file')) {
                $array_msg = array('msg' => 'Upload is larger than the permitted size', 'icon' => 'error');
                $this->session->set_flashdata($array_msg);
                $data['title'] = 'Banner Add';
                $this->load->view('admin/banner-add', $data);
            } else {
                $photo = array('upload_data' => $this->upload->data());
                $data['banner'] = $photo['upload_data']['file_name'];
                $data['link'] =     $this->security->xss_clean($this->input->post('affiliatelink'));

                if ($this->Curd_model->insert('tbl_banner', $data) == false) {
                    $array_msg = array('msg' => 'Server Error!', 'icon' => 'error');
                    $this->session->set_flashdata($array_msg);
                    redirect(base_url('admin/banner/add'));
                } else {
                    $array_msg = array('msg' => 'Successfully Insert!', 'icon' => 'success');
                    $this->session->set_flashdata($array_msg);
                    redirect(base_url('admin/banner/list'));
                }
            }
        }
    }

    public function list()
    {
        $data['ArrayBanner'] = $this->Curd_model->Select('tbl_banner');
        $data['title'] = 'Banner List';
        $this->load->view('admin/banner-list', $data);
    }

    public function Status()
    {
        $id = $this->input->get('id');

        $statusInput = $this->input->get('status');
        if ($statusInput == 'Show') {
            $status = 'Hide';
        } else {
            $status = 'Show';
        }

        if ($this->Curd_model->update('tbl_banner', ['id' => $id], ['status' => $status]) == true) {
            $array_msg = array('msg' => 'Successfully Update!', 'icon' => 'success');
            $this->session->set_flashdata($array_msg);
            redirect(base_url('admin/banner/list'));
        } else {
            $array_msg = array('msg' => 'Server Error!', 'icon' => 'error');
            $this->session->set_flashdata($array_msg);
            redirect(base_url('admin/banner/list'));
        }
    }

    public function edit($id)
    {
        $data['BannerArray'] = $this->Curd_model->Select('tbl_banner', ['id' => $id]);
        $data['title'] = 'Banner Add';
        $this->load->view('admin/banner-edit', $data);
    }
    public function banner_edit()
    {
        $id = $this->security->xss_clean($this->input->post('id'));
        if (empty($_FILES['file']['name'])) {
            $data['banner'] =     $this->security->xss_clean($this->input->post('oldphoto'));
        } else {
            unlink("uploads/banner/" . $this->input->post('oldphoto'));
            $config['upload_path']          = 'uploads/banner/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 2000;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file')) {
                $array_msg = array('msg' => 'Upload is larger than the permitted size', 'icon' => 'error');
                $this->session->set_flashdata($array_msg);
                redirect(base_url('admin/banner/edit/' . $id));
            } else {
                $photo = array('upload_data' => $this->upload->data());
                $data['banner'] = $photo['upload_data']['file_name'];
            }
        }
        $data['link'] =  $this->security->xss_clean($this->input->post('affiliatelink'));
        if ($this->Curd_model->update('tbl_banner', ['id' => $id], $data) == false) {
            $array_msg = array('msg' => 'Server Error!', 'icon' => 'error');
            $this->session->set_flashdata($array_msg);
            redirect(base_url('admin/banner/list'));
        } else {
            $array_msg = array('msg' => 'Successfully Update!', 'icon' => 'success');
            $this->session->set_flashdata($array_msg);
            redirect(base_url('admin/banner/list'));
        }
    }
    public function delete()
    {
        $id = $this->input->post('delete_id');
        $array = $this->Curd_model->Select('tbl_banner', ['id' => $id]);

        if (empty($array)) {
            echo json_encode(array("statusCode" => 201, "msg" => 'Data not found'));
        } else {
            if ($this->Curd_model->Delete('tbl_banner', ['id' => $id]) == false) {
                echo json_encode(array("statusCode" => 201, "msg" => 'Server Error!'));
            } else {
                unlink("uploads/banner/" . $array[0]['banner']);
                echo json_encode(array("statusCode" => 200, "msg" => 'Deleted Successfully!'));
            }
        }
    }
}
