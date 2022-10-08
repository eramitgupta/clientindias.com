<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$admin = $this->session->userdata('Login_Auth');
		$this->load->model('Curd_model');
		$AuthLogin = $this->Curd_model->authLogin($admin['id'], 'manger');
		$Login['loginData'] = $AuthLogin;
		$this->load->view('manger/template/array', $Login);
		if (empty($AuthLogin)) {
			$this->session->unset_userdata('Login_Auth');
			$array_msg = array('msg' => 'Access Denied!', 'icon' => 'error');
			$this->session->set_flashdata($array_msg);
			redirect(base_url());
		}
	}

	public function user_income()
	{
		$data['userArray'] = $this->Curd_model->Select('tbl_login', ['role' => 'user']);
		$this->load->view('manger/user-income', $data);
	}

	public function UserIncomeView()
	{
		$user_id = $this->security->xss_clean($this->input->post('id'));
		if (!empty($user_id)) {
			$arrayUser = $this->Curd_model->Select('tbl_login', ['id' => $user_id]);
			$arrayUserReferral = $this->Curd_model->Select('tbl_login', ['referral_code' => $arrayUser[0]['ref_code']]);
			$y = 0;
			$x = 1;
			foreach ($arrayUserReferral as $ReferralRow) {
				$arrayUserPayment = $this->Curd_model->Select('tbl_payment', ['user_id' => $arrayUserReferral[$y]['id'], 'status' => 'Active']);
				for ($i = 0; $i < count($arrayUserPayment); $i++) {
					echo $arrayUserPayment[$i]['course_id'];
					$arrayUserPackages = $this->Curd_model->Select('tbl_category', ['id' => $arrayUserPayment[$i]['course_id']]);
					echo '
							<tr>
								<th scope="row">' . $x . '</th>
								<td>' . $ReferralRow['name'] . '</td>
								<td>' . $arrayUserPayment[$i]['type'] . '</td>
								<td>' . $arrayUserPackages[0]['name'] . '</td>
								<td>₹ ' . $arrayUserPayment[$i]['commission'] . '</td>
								<td>' . $arrayUserPayment[$i]['date'] . '</td>
							</tr>
					';
				}
				$y++;
				$x++;
			}
		}
	}

	public function UserIncomeViewSummary()
	{
		$user_id = $this->security->xss_clean($this->input->post('id'));
		$value = $this->security->xss_clean($this->input->post('value'));
		if (!empty($user_id)) {
			$arrayUser = $this->Curd_model->Select('tbl_login', ['id' => $user_id]);
			$arrayUserReferral = $this->Curd_model->Select('tbl_login', ['referral_code' => $arrayUser[0]['ref_code']]);

			$y = 0;
			$x = 1;
			foreach ($arrayUserReferral as $ReferralRow) {
				$arrayUserPayment = $this->Curd_model->CalculatData("day", "tbl_payment", "date", "$value AND user_id = '" . $arrayUserReferral[$y]['id'] . "'");
				for ($i = 0; $i < count($arrayUserPayment); $i++) {
					$arrayUserPackages = $this->Curd_model->Select('tbl_category', ['id' => $arrayUserPayment[$i]['course_id']]);
					echo '
							<tr>
								<th scope="row">' . $x . '</th>
								<td>' . $ReferralRow['name'] . '</td>
								<td>' . $arrayUserPayment[$i]['type'] . '</td>
								<td>' . $arrayUserPackages[0]['name'] . '</td>
								<td>₹ ' . $arrayUserPayment[$i]['commission'] . '</td>
								<td>' . $arrayUserPayment[$i]['date'] . '</td>
							</tr>
					     ';
				}
				$y++;
				$x++;
			}
		}
	}

	public function list()
	{
		$data['userArray'] = $this->Curd_model->Select('tbl_login', ['role' => 'user']);
		$this->load->view('manger/user', $data);
	}


	public function user_edit($id)
	{
		$data['AccountArray'] = $this->Curd_model->getAccounts($id);
		$this->load->view('manger/user-edit', $data);
	}

	public function AccountEditCode()
	{
		$array = $this->security->xss_clean($this->input->post());
		if ($this->Curd_model->update('tbl_login', ['id' => $array['id']], $array) == true) {
			$array_msg = array('msg' => 'Successfully Update!', 'icon' => 'success');
			$this->session->set_flashdata($array_msg);
			redirect(base_url('manger/user/list'));
		} else {
			$array_msg = array('msg' => 'Server Error!', 'icon' => 'error');
			$this->session->set_flashdata($array_msg);
			redirect(base_url('manger/user/list'));
		}
	}


	public function UserloginStatus()
	{
		$id = $this->input->get('id');

		$statusInput = $this->input->get('status');
		if ($statusInput == 'Active') {
			$status = 'Deactivate';
		} else {
			$status = 'Active';
		}
		$admin = $this->session->userdata('Login_Auth');
		if ($admin['id'] == $id) {
			$array_msg = array('msg' => 'Can`t update myself !', 'icon' => 'error');
			$this->session->set_flashdata($array_msg);
			redirect(base_url('manger/user/list'));
		} else {
			if ($this->Curd_model->update('tbl_login', ['id' => $id], ['status' => $status]) == true) {
				$array_msg = array('msg' => 'Successfully Update!', 'icon' => 'success');
				$this->session->set_flashdata($array_msg);
				redirect(base_url('manger/user/list'));
			} else {
				$array_msg = array('msg' => 'Server Error!', 'icon' => 'error');
				$this->session->set_flashdata($array_msg);
				redirect(base_url('manger/user/list'));
			}
		}
	}
	public function deleteLogin()
	{
		$id = $this->input->post('delete_id');
		$admin = $this->Curd_model->getAccounts($id);
		if (empty($admin)) {
			echo json_encode(array("statusCode" => 201, "msg" => 'Admin not found'));
		}
		$admin = $this->session->userdata('Login_Auth');
		if ($admin['id'] == $id) {
			echo json_encode(array("statusCode" => 201, "msg" => 'Can`t delete myself !'));
		} else {
			$this->Curd_model->Delete('tbl_login', ['id' => $id]);
			echo json_encode(array("statusCode" => 200, "msg" => 'Deleted Successfully!'));
		}
	}


	public function user_password_change($id)
	{
		$data['AccountArray'] = $this->Curd_model->getAccounts($id);
		$this->load->view('manger/user-password-change', $data);
	}

	public function passwordUpdateCode()
	{
		$id = $this->security->xss_clean($this->input->post('id'));
		$CurrentPassword = $this->security->xss_clean($this->input->post('CurrentPassword'));
		$password = $this->security->xss_clean($this->input->post('password'));
		$Cpassword = $this->security->xss_clean($this->input->post('cpassword'));
		$data = $this->Curd_model->getAccounts($id);
		if (password_verify($CurrentPassword, $data['password']) == true) {
			if ($password == $Cpassword) {
				$cpass    = $this->security->xss_clean(password_hash($Cpassword, PASSWORD_BCRYPT));
				if ($this->Curd_model->update('tbl_login', ['id' => $id], ['password' => $cpass]) == true) {
					echo json_encode(array("statusCode" => 200, "msg" => 'Successfully Update Password', "url" => base_url('manger/user/list')));
				} else {
					echo json_encode(array("statusCode" => 201, "msg" => 'Server Error'));
				}
			} else {
				echo json_encode(array("statusCode" => 201, "msg" => 'Password Not Match'));
			}
		} else {
			echo json_encode(array("statusCode" => 201, "msg" => 'Password is incorrect'));
		}
	}

	public function friend($id)
	{
		$data['friendArray'] = $this->Curd_model->UserFriendList($id);
		$this->load->view('manger/friend', $data);
	}

	public function SendUserPay()
	{
		$arr =	$this->Curd_model->Select('tbl_login', ['id' => $this->input->post('id')]);
		if ($arr[0]['wallet_money'] >= $this->input->post('amount')) {
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
				'user_id' => $this->security->xss_clean($this->input->post('id')),
				'amount' => $this->security->xss_clean($this->input->post('amount')),
				'transaction_no' => $this->security->xss_clean($this->input->post('transaction_no')),
				'screenshot' => $this->security->xss_clean($payScreenshot),
				'date' => date('Y-m-d H:i:s'),
			];
			if ($this->Curd_model->insert('tbl_payment_send_user', $data) == true) {
				$this->Curd_model->walletUpdate($this->input->post('id'), $this->input->post('amount'), '-');
				echo json_encode(array("statusCode" => 200, "msg" => 'Successfully Send Paymanet', "url" => base_url('manger/user/user_payment')));
			} else {
				echo json_encode(array("statusCode" => 201, "msg" => 'Server Error!'));
			}
		} else {
			echo json_encode(array("statusCode" => 201, "msg" => 'Wallet Balance Low'));
		}
	}

	public function user_payment()
	{
		$data['title'] = 'User Send Payment Admin History';
		$qey = [
			'select' => 'tbl_payment_send_user.*,tbl_login.name, tbl_payment_send_user.id as Pay_ID, tbl_payment_send_user.date as Pay_Date',
			'from' => 'tbl_payment_send_user',
			'join1' => 'tbl_login',
			'join2' => 'tbl_payment_send_user.user_id = tbl_login.id',
		];
		$data['ArrayPay'] = $this->Curd_model->SelectDataJoin($qey);
		// pre($data['ArrayPay']);
		$this->load->view('manger/user-send-payment-admin-history', $data);
	}
}
