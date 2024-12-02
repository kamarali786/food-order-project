<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiteController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SettingModel');
		$this->load->model('BannerModel');
	}

	public function index()
	{
		$banners =  $this->db
			->order_by('banner_id', 'DESC')
			->where(['is_delete' => 0,'status' => 1 ])
			->get('banners')
			->result();
		
		$categories =  $this->db
			->order_by('category_id', 'DESC')
			->where(['is_delete' => 0,'status' => 1 ])
			->get('categories')
			->result();
		
		$products = $this->db
			->order_by('product_id', 'DESC')
			->where(['is_delete' => 0,'status' => 1 ])
			->get('products')
			->result();

		$this->load->view('frontend/index.php', array(
			'banners' => $banners, 
			'categories' => $categories, 
			'products' => $products
		));
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
