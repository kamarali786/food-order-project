<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiteController extends CI_Controller
{

	public function index()
	{
		$this->load->view('frontend/index.php');
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