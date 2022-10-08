<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Courses extends CI_Controller
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
        $data['ArrayCourse'] = $this->Curd_model->Select('tbl_category');
        $data['title'] = 'Courses Upload';
        $this->load->view('admin/courses-upload', $data);
    }

    public function UploadCourse()
    {
        $this->form_validation->set_rules('category', 'Course Name', 'trim|strip_tags|required');
        if ($this->form_validation->run() == false) {
            $string = str_replace('</p>', '', validation_errors());
            $arrError = explode('<p>', $string);
            echo json_encode(array("statusCode" => 201, "msg" => array_filter($arrError)[1]));
        } else {
            if (empty($_FILES['file']['name'])) {
                $video = "";
            } else {
                $config['upload_path']          = 'uploads/video/';
                $config['allowed_types']        = 'mp4|mov|wmv|avi|avchd|mkv';
                $config['max_size']             = 200000;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('file')) {
                    echo json_encode(array("statusCode" => 201, "msg" => 'Upload is larger than the permitted video size!'));
                    exit(0);
                } else {
                    $dataVideo = array('upload_data' => $this->upload->data());
                    $video = $dataVideo['upload_data']['file_name'];
                }
            }

            $data = [
                'category_id' => $this->security->xss_clean($this->input->post('category')),
                'video' => $this->security->xss_clean($video),
                'link' => $this->security->xss_clean($this->input->post('link')),
                'dsc' => $this->security->xss_clean($this->input->post('dsc')),
                'date' => date('Y-m-d H:i:s'),
            ];
            if ($this->Curd_model->insert('tbl_course_data', $data) == true) {
                echo json_encode(array("statusCode" => 200, "msg" => 'Successfully Uploaded !', "url" => base_url('admin/courses/list')));
            } else {
                echo json_encode(array("statusCode" => 201, "msg" => 'Server Error!'));
            }
        }
    }
    public function UploadCourseUpdate()
    {
        $id = $this->security->xss_clean($this->input->post('id'));
        $v = $this->security->xss_clean($this->input->post('video'));
        $this->form_validation->set_rules('category', 'Course Name', 'trim|strip_tags|required');
        if ($this->form_validation->run() == false) {
            $string = str_replace('</p>', '', validation_errors());
            $arrError = explode('<p>', $string);
            echo json_encode(array("statusCode" => 201, "msg" => array_filter($arrError)[1]));
        } else {
            if (empty($_FILES['file']['name'])) {
                $video = $v;
            } else {
                $config['upload_path']          = 'uploads/video/';
                $config['allowed_types']        = 'mp4|mov|wmv|avi|avchd|mkv';
                $config['max_size']             = 200000;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('file')) {
                    echo json_encode(array("statusCode" => 201, "msg" => 'Upload is larger than the permitted video size!'));
                    exit(0);
                } else {
                    if(!empty($v)){
                        unlink("uploads/video/" . $v);
                    }
                    $dataVideo = array('upload_data' => $this->upload->data());
                    $video = $dataVideo['upload_data']['file_name'];
                }
            }

            $data = [
                'category_id' => $this->security->xss_clean($this->input->post('category')),
                'video' => $this->security->xss_clean($video),
                'link' => $this->security->xss_clean($this->input->post('link')),
                'dsc' => $this->security->xss_clean($this->input->post('dsc')),
            ];
            if ($this->Curd_model->update('tbl_course_data',['id'=> $id] , $data) == true) {
                echo json_encode(array("statusCode" => 200, "msg" => 'Successfully Uploaded !', "url" => base_url('admin/courses/list')));
            } else {
                echo json_encode(array("statusCode" => 201, "msg" => 'Server Error!'));
            }
        }
    }

    public function list()
    {
        $qey = [
            'select' => 'tbl_course_data.*,tbl_category.name, tbl_course_data.id as CourseDataID',
            'from' => 'tbl_course_data',
            'join1' => 'tbl_category',
            'join2' => 'tbl_course_data.category_id = tbl_category.id',
        ];
        $data['ArrayCourseData'] = $this->Curd_model->SelectDataJoin($qey);
        $data['title'] = 'Courses Upload List';
        $this->load->view('admin/courses-upload-list', $data);
    }

    public function edit($id)
    {
        $data['ArrayCourse'] = $this->Curd_model->Select('tbl_category');
        $qey = [
            'select' => 'tbl_course_data.*,tbl_category.name, tbl_course_data.id as CourseDataID',
            'from' => 'tbl_course_data',
            'join1' => 'tbl_category',
            'join2' => 'tbl_course_data.category_id = tbl_category.id',
            'where' => 'tbl_course_data.id = ' . $id . '',
        ];
        $data['ArrayCourseData'] = $this->Curd_model->SelectDataJoin($qey, $qey['where']);
        // print_r($data['ArrayCourseData']);
        $data['title'] = 'Courses Upload List';
        $this->load->view('admin/courses-upload-edit', $data);
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

        if ($this->Curd_model->update('tbl_course_data', ['id' => $id], ['status' => $status]) == true) {
            $array_msg = array('msg' => 'Successfully Update!', 'icon' => 'success');
            $this->session->set_flashdata($array_msg);
            redirect(base_url('admin/courses/list'));
        } else {
            $array_msg = array('msg' => 'Server Error!', 'icon' => 'error');
            $this->session->set_flashdata($array_msg);
            redirect(base_url('admin/courses/list'));
        }
    }

    public function delete()
    {
        $id = $this->input->post('delete_id');
        $array = $this->Curd_model->Select('tbl_course_data', ['id' => $id]);
        if (empty($array)) {
            echo json_encode(array("statusCode" => 201, "msg" => 'Data not found'));
        } else {
            if ($this->Curd_model->Delete('tbl_course_data', ['id' => $id]) == false) {
                echo json_encode(array("statusCode" => 201, "msg" => 'Server Error!'));
            } else {
                if (!empty($array[0]['video'])) {
                    unlink("uploads/video/" . $array[0]['video']);
                }
                echo json_encode(array("statusCode" => 200, "msg" => 'Deleted Successfully!'));
            }
        }
    }

    public function GetViewCourses()
    {
        $arr = $this->Curd_model->Select('tbl_course_data', ['id' => $this->input->post('id')]);
        if (!empty($arr[0]['link'])) {
            $i = $arr[0]['link'];
            echo <<<HTML
                        <div class="ratio ratio-16x9">
                            <iframe src="$i" allowfullscreen></iframe>
                    </div>
            HTML;
        } else {
            $v = base_url('uploads/video/' . $arr[0]['video']);
            echo <<<HTML
                <video width="100%" height="100%" controls>
                    <source src="$v" type="video/mp4">
                    <source src="movie.ogg" type="video/ogg">
                 </video>
                HTML;
        }
    }
}
