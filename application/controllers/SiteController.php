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
			->order_by('category_id', 'DECS')
			->get('products')
			->result_array();
		$grouped_data = [];
		foreach ($products_by_category as $product) {
			$grouped_data[$product['category_id']][] = $product;
		}
		$sorted_data = array_slice($grouped_data, 0, 4, true);
		$this->load->view('frontend/index.php', array(
			'banners' => $banners,
			'categories' => $categories,
			'grouped_data' => $sorted_data,
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
			->result_array();

		$categories =  $this->db
			->order_by('category_id', 'DESC')
			->where(['is_delete' => 0, 'status' => 1])
			->get('categories')
			->result();

		$products_data = [];
		foreach ($products as $product) {
			$products_data[$product['category_id']][] = $product;
		}


		$this->load->view('frontend/products.php', array(
			'products' => $products,
			'products_data' => $products_data,
			'categories' => $categories,
		));
	}
	public function product_detail($id = null)
	{
		$get_product = $this->db->where('product_id',$id)->get('products')->row();

		$category_id = $get_product->category_id;

		$related_products = $this->db->where('category_id',$category_id)->limit(3)->order_by('product_id','desc')->get('products')->result();
		$this->load->view('frontend/product_detail',array(

			'product' => $get_product,
			'related_products' => $related_products
		));
	}
	public function addToCart()
	{
		$productId = $this->input->post('product_id');
		$product = $this->db->where('product_id',$productId)->get('products')->row();
        if (!empty($product)) {
			$productData = $this->load->view('frontend/includes/addToCartModelBody', array(
				'product' => $product,
			));
			$productAddToCartData = $productData->output->final_output;

			echo json_encode(['success' => 1, 'message' => 'Post Details Fetched Successfully', 'productAddToCartData' => $productAddToCartData]);
            exit;
        } else {
			echo json_encode(['error' => 1, 'message' => 'Product Not Found!']);
            exit;
		}
	}
}
