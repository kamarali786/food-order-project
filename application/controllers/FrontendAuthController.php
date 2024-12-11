
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FrontendAuthController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('FrontendAuthModel');
		$this->load->model('CartModel');
	}

	public function login()
	{
		if ($this->session->userdata('user')) {
			redirect(base_url(''));
		}
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == FALSE) {

				redirect(base_url('login'));
			} else {

				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$user = $this->FrontendAuthModel->login($email);
				if ($user) {
					if (password_verify($password, $user->password)) {
						$this->session->set_userdata('user', $user);
						$cartSuccess = $this->CartModel->cartAddInDatabase();
						redirect(base_url(''));
						$this->session->set_flashdata('success_message', 'Login Succesfully.');
					} else {

						$this->session->set_flashdata('error_message', 'Invalid email or password.');
						redirect(base_url('login'));
					}
				} else {

					$this->session->set_flashdata('error_message', 'User not exist! Please Register.');
					redirect(base_url('login'));
				}
			}
		}
		$this->load->view('frontend/login');
	}


	public function register()
	{
		if ($this->session->userdata('user')) {
			redirect(base_url(''));
		}
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('fname', 'First Name', 'required|alpha');
			$this->form_validation->set_rules('lname', 'Last Name', 'required|regex_match[/^[a-zA-Z ]+$/]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&_]{8,}$/]');
			$this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|matches[password]');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('fname', $this->input->post('fname'));
				$this->session->set_flashdata('lname', $this->input->post('lname'));
				$this->session->set_flashdata('email', $this->input->post('email'));
				$this->session->set_flashdata('password', $this->input->post('password'));
				$this->session->set_flashdata('confirmPassword', $this->input->post('confirmPassword'));
				redirect(base_url('register'));
			} else {
				$registerData = ($this->input->post());
				unset($registerData['confirmPassword']);
				$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				$registerData['password'] = $password;
				$registerSuccess = $this->FrontendAuthModel->register($registerData);
				if ($registerSuccess['status']) {
					// Successful registration
					$this->session->set_flashdata('success_message', $registerSuccess['message']);
					redirect('login');
				} else {
					// Registration failed
					$this->session->set_flashdata('error_message', $registerSuccess['message']);
					redirect('register');
				}
			}
		}
		$this->load->view('register');
	}
	public function logout()
	{
		$this->session->unset_userdata('user');
		redirect(base_url('login'));
	}
}

