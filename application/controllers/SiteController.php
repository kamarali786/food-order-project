<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiteController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SettingModel');
	}
	
	public function index()
	{
		$data['setting'] = $this->SettingModel->get_setting();
		$this->load->view('frontend/index.php',$data);
		
		//$this->load->view('frontend/index.php');
	}
	public function about()
	{
		$this->load->view('frontend/aboutus.php');
	}
	public function contactus()
	{
		$this->load->view('frontend/contact.php');
	}
	public function products()
	{
		$this->load->view('frontend/products.php');
	}
}
