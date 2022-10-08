<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Video extends CI_Controller
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

    public function Training()
    {
        $admin = $this->session->userdata('Login_Auth');
        $array  = $this->Curd_model->Select('tbl_payment', ['user_id' => $admin['id'], 'status' => 'Active']);
        for ($i = 0; $i < count($array); $i++) {
            $id = $array[$i]['course_id'];
            $ArrayVideo[] =  $this->Curd_model->Select('tbl_course_data', ['category_id' => $id, 'status' => 'Show']);
        }

        // pre($ArrayVideo);

        $data['arrayVideo'] =  $ArrayVideo;
        $data['title'] = 'Course Video List';
        $this->load->view('user/video-list', $data);
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
