<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Category extends CI_Controller
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
        $data['title'] = 'Course Add';
        $this->load->view('admin/category-add', $data);
    }

    public function add_category()
    {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('category_name', 'Category Name', 'trim|strip_tags|required');
        $this->form_validation->set_rules('dsc', 'Description', 'trim|strip_tags|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|strip_tags|required');
        $this->form_validation->set_rules('sellingPrice', 'Selling Price', 'trim|strip_tags|required');
        $this->form_validation->set_rules('commission', 'Commission', 'trim|strip_tags|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Course Add';
            $this->load->view('admin/category-add', $data);
        } else {
            $this->load->helper('slug_helper');
            $config['upload_path']          = 'uploads/category/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 2000;
            $config['encrypt_name'] = TRUE;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file')) {
                $array_msg = array('msg' => 'Upload is larger than the permitted size', 'icon' => 'error');
                $this->session->set_flashdata($array_msg);
                $data['title'] = 'Course Add';
                $this->load->view('admin/category-add', $data);
            } else {

                $photo = array('upload_data' => $this->upload->data());
                $xphoto = $photo['upload_data']['file_name'];

                $array = [
                    'url' => $this->security->xss_clean(slug($this->input->post('category_name'))),
                    'name' => $this->security->xss_clean($this->input->post('category_name')),
                    'dsc' => $this->security->xss_clean($this->input->post('dsc')),
                    'icon' => $this->security->xss_clean($xphoto),
                    'price' => $this->security->xss_clean($this->input->post('price')),
                    'sellingPrice' => $this->security->xss_clean($this->input->post('sellingPrice')),
                    'commission' => $this->security->xss_clean($this->input->post('commission')),
                    'date' => date('Y-m-d h:i:s A'),
                ];
                if ($this->Curd_model->insert('tbl_category', $array) == true) {
                    $array_msg = array('msg' => 'Successfully Create Category!', 'icon' => 'success');
                    $this->session->set_flashdata($array_msg);
                    redirect(base_url('admin/category/list'));
                } else {
                    $array_msg = array('msg' => 'Server Error!', 'icon' => 'error');
                    $this->session->set_flashdata($array_msg);
                    redirect(base_url('admin/category/add'));
                }
            }
        }
    }

    public function list()
    {
        $data['ArrayCategory'] = $this->Curd_model->Select('tbl_category');
        $data['title'] = 'Course List';
        $this->load->view('admin/category-list', $data);
    }

    public function statusUpdate()
    {
        $id = $this->input->get('id');

        $statusInput = $this->input->get('status');
        if ($statusInput == 'Show') {
            $status = 'Hide';
        } else {
            $status = 'Show';
        }

        if ($this->Curd_model->update('tbl_category', ['id' => $id], ['status' => $status]) == true) {
            $array_msg = array('msg' => 'Successfully Update!', 'icon' => 'success');
            $this->session->set_flashdata($array_msg);
            redirect(base_url('admin/category/list'));
        } else {
            $array_msg = array('msg' => 'Server Error!', 'icon' => 'error');
            $this->session->set_flashdata($array_msg);
            redirect(base_url('admin/category/list'));
        }
    }


    public function edit($id)
    {
        $data['ArrayCategory'] = $this->Curd_model->Select('tbl_category', ['id' => $id]);
        $data['title'] = 'Course Edit';
        $this->load->view('admin/category-edit', $data);
    }

    public function update()
    {
        $this->load->helper('slug_helper');
        $id = $this->security->xss_clean($this->input->post('id'));
        if (empty($_FILES['file']['name'])) {
            $xc = $this->security->xss_clean($this->input->post('oldphoto'));
        } else {
            unlink("uploads/category/" . $this->input->post('oldphoto'));
            $config['upload_path']          = 'uploads/category/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 2000;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file')) {
                $array_msg = array('msg' => 'Upload is larger than the permitted size', 'icon' => 'error');
                $this->session->set_flashdata($array_msg);
                redirect(base_url('admin/category/edit/' . $id));
            } else {
                $photo = array('upload_data' => $this->upload->data());
                $xc = $photo['upload_data']['file_name'];
            }
        }
        $array = [
            'url' => $this->security->xss_clean(slug($this->input->post('category_name'))),
            'name' => $this->security->xss_clean($this->input->post('category_name')),
            'dsc' => $this->security->xss_clean($this->input->post('dsc')),
            'icon' => $this->security->xss_clean($xc),
            'price' => $this->security->xss_clean($this->input->post('price')),
            'sellingPrice' => $this->security->xss_clean($this->input->post('sellingPrice')),
            'commission' => $this->security->xss_clean($this->input->post('commission')),
            'date' => date('Y-m-d h:i:s A'),
        ];
        if ($this->Curd_model->update('tbl_category', ['id' => $id], $array) == false) {
            $array_msg = array('msg' => 'Server Error!', 'icon' => 'error');
            $this->session->set_flashdata($array_msg);
            redirect(base_url('admin/category/list'));
        } else {
            $array_msg = array('msg' => 'Successfully Create!', 'icon' => 'success');
            $this->session->set_flashdata($array_msg);
            redirect(base_url('admin/category/list'));
        }
    }

    public function delete()
    {
        $id = $this->input->post('delete_id');
        $array = $this->Curd_model->Select('tbl_category', ['id' => $id]);
        if (empty($array)) {
            echo json_encode(array("statusCode" => 201, "msg" => 'Data not found'));
        } else {
            if ($this->Curd_model->Delete('tbl_category', ['id' => $id]) == false) {
                echo json_encode(array("statusCode" => 201, "msg" => 'Server Error!'));
            } else {
                unlink("uploads/category/" . $array[0]['icon']);
                echo json_encode(array("statusCode" => 200, "msg" => 'Deleted Successfully!'));
            }
        }
    }
}
