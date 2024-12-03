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
			->where(['is_delete' => 0, 'status' => 1])
			->get('banners')
			->result();

		$categories =  $this->db
			->order_by('category_id', 'DESC')
			->where(['is_delete' => 0, 'status' => 1])
			->get('categories')
			->result();

		$products_by_category = $this->db
			->select('*')
			->where(['is_delete' => 0, 'status' => 1])
			->order_by('category_id', 'ASC')
			->get('products')
			->result_array();

		$grouped_data = [];
		foreach ($products_by_category as $product) {
			$grouped_data[$product['category_id']][] = $product;
		}
		$this->load->view('frontend/index.php', array(
			'banners' => $banners,
			'categories' => $categories,
			'grouped_data' => $grouped_data
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
		$products = $this->db
			->select('*')
			->where(['is_delete' => 0, 'status' => 1])
			->order_by('product_id', 'DECS')
			->get('products')
			->result();
			
		$this->load->view('frontend/products.php',array('products' => $products));
	}
}
