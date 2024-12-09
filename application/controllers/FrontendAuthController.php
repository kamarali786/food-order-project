
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FrontendAuthController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
	}

	public function index()
	{
		if ($this->session->userdata('admin_id')) {
			redirect(base_url('dashboard'));
		} else {
			$this->load->view('backend/login');
		}
	}

	public function login()
	{

		// $this->form_validation->set_rules('email', 'Email ID', 'required|valid_email');
		// $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

		// if ($this->form_validation->run() == FALSE) {
		// 	// Display validation 	errors and
		// 	$this->session->set_flashdata('email', form_error('email'));
		// 	$this->session->set_flashdata('password', form_error('password'));
		// 	redirect(base_url('login'));
		// } else {

		// 	$data = $this->AuthModel->admin_auth($login_data);
		// 	if ($data) {
		// 		$this->session->set_userdata('admin_id', $data->user_id);
		// 		$this->session->set_flashdata('success', 'Admin Login Successfully');
		// 		redirect(base_url('dashboard'));
		// 	} else {
		// 		$this->session->set_flashdata('error', 'Invalid email or password.');
		// 		redirect(base_url('admin'));
		// 	}
		// }
		$this->load->view('frontend/login');
	}
	public function register()
	{
		$this->load->view('register');
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('fname', 'First Name', 'required|alpha');
			$this->form_validation->set_rules('lname', 'Last Name', 'required|regex_match[/^[a-zA-Z ]+$/]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&_]{8,}$/]');
			$this->form_validation->set_rules('confrinPassword', 'Confirm Password', 'required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				redirect(base_url('register'));
			} else {
				$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		
			}
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('admin-login'));
	}
}
