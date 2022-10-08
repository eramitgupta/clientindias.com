<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sign_up extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Curd_model');
		$this->load->helper('emailsent');
	}

	public function index()
	{
		if (!empty($this->session->userdata('account_verification'))) {
			redirect(base_url('verification'));
		}
		$data['title'] = 'Sign-Up';
		$this->load->view('admin/sign-up', $data);
	}

	public function checkFefer()
	{
		$code = $this->input->post('referral_code');
		if (empty($code)) {
			echo "Empty Field";
		} else {
			$array = $this->Curd_model->Select('tbl_login', ['ref_code' => $code]);
			if (empty($array)) {
				echo "Not Fund Referral";
			} else {
				echo "Referral By " . ucfirst($array[0]['name']);
			}
		}
	}

	public function UserSignUp()
	{
		$this->form_validation->set_rules('referral_code', 'Referral Code', 'trim|strip_tags|required');
		$this->form_validation->set_rules('full_names', 'Full Names', 'trim|strip_tags|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|strip_tags|required|valid_email|is_unique[tbl_login.email]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|strip_tags|required|numeric|min_length[10]|is_unique[tbl_login.mobile]');
		$this->form_validation->set_rules('password', 'Password', 'trim|strip_tags|required');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|strip_tags|required|matches[password]');
		if ($this->form_validation->run() == false) {
			$string = str_replace('</pre>', '', validation_errors());
			$arrError = explode('<p>', $string);
			echo json_encode(array("statusCode" => 201, "msg" => array_filter($arrError)[1]));
		} else {
			if ($this->security->xss_clean($this->input->post('password')) == $this->security->xss_clean($this->input->post('cpassword'))) {

				// auto increment ref code
				$arr  = $this->Curd_model->LastRecord('tbl_login');
				$refCode = $arr[0]['ref_code'];
				list($MemPrefix, $MemNum) = sscanf($refCode, "%[A-Za-z]%[0-9]");
				$NewRefCode	=  $MemPrefix . str_pad($MemNum + 1, 5, '0', STR_PAD_LEFT);

				$info = [
					'upi' => '',
					'aadharcard' => '',
					'pancard' => '',
					'accountholdername' => '',
					'bankname' => '',
					'accountnumber' => '',
					'ifsccode' => '',
					'accounttype' => '',
					'branchdetail' => '',
				];

				$data = [
					'role' => $this->security->xss_clean('user'),
					'name' => $this->security->xss_clean($this->input->post('full_names')),
					'mobile' => $this->security->xss_clean($this->input->post('mobile')),
					'email' => $this->security->xss_clean($this->input->post('email')),
					'password' => $this->security->xss_clean(password_hash($this->input->post('cpassword'), PASSWORD_BCRYPT)),
					'ref_code' => $this->security->xss_clean($NewRefCode),
					'referral_code' => $this->security->xss_clean($this->input->post('referral_code')),
					'user_info' => json_encode($info),
					'status' => 'Deactivate',
					'date' => date('Y-m-d H:i:s'),
				];


				if ($this->Curd_model->insertLastId('tbl_login', $data) == true) {
					$username = $this->security->xss_clean($this->input->post('email'));
					$ArrayData = $this->Curd_model->getByUsername($username);

					$OTP = str_pad(rand(0, pow(10, 4) - 1), 4, '0', STR_PAD_LEFT);
					$data = [
						'otp' => $OTP,
						'sent' => $ArrayData->email,
						'date_time' => date('Y-m-d h:i:s A'),
					];

					$masg = 'Hi,' . ucfirst($ArrayData->name) . '<br> We received a request for email verification. Enter the following verification code to account your active.';

					$this->Curd_model->Delete('tbl_otp', ['sent' => $ArrayData->email]);
					if (emialSent($OTP, $masg, $ArrayData->email, 'Account Verification') == true) {

						$this->Curd_model->insert('tbl_otp', $data);
						$this->session->set_userdata('account_verification', ['id' => $ArrayData->id, 'email' => $ArrayData->email]);
					} else {
						echo json_encode(array("statusCode" => 201, "msg" => 'Server Error!'));
					}

					echo json_encode(array("statusCode" => 200, "msg" => "Sent a verification code, please check your email", "url" => base_url() . 'verification'));
				} else {
					echo json_encode(array("statusCode" => 201, "msg" => "Server Error!"));
				}
			} else {
				echo json_encode(array("statusCode" => 201, "msg" => "Password Not Match"));
			}
		}
	}
}
