<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
	public function __construct() {
        parent::__construct(); 
        if (!$this->session->userdata('admin_id')) {
            redirect(base_url('admin-login'));
        }
    }
	public function index()
	{
		$this->load->view('backend/dashboard');
	}
	
}