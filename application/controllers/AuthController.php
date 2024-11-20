
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
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
		$login_data = $this->input->post();
		$this->form_validation->set_rules('email', 'Email ID', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

		if ($this->form_validation->run() == FALSE) {
			// Display validation 	errors and
			$this->session->set_flashdata('email', form_error('email'));
			$this->session->set_flashdata('password', form_error('password'));
			redirect(base_url('admin-login'));
		} else {

			$data = $this->AuthModel->admin_auth($login_data);
			if ($data) {
				$this->session->set_userdata('admin_id', $data->user_id);
				$this->session->set_flashdata('success', 'Admin Login Successfully');
				redirect(base_url('dashboard'));
			} else {
				$this->session->set_flashdata('error', 'Invalid email or password.');
				redirect(base_url('admin-login'));
			}
		}
	}
	public function logout()
	{
		// Destroy the session
		$this->session->sess_destroy();

		// Redirect to the login page or home page
		redirect(base_url('admin-login'));
	}
}
