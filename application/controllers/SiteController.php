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
		$get_product = $this->db->where('product_id', $id)->get('products')->row();

		$category_id = $get_product->category_id;

		$related_products = $this->db->where('category_id', $category_id)->limit(3)->order_by('product_id', 'desc')->get('products')->result();
		$this->load->view('frontend/product_detail', array(

			'product' => $get_product,
			'related_products' => $related_products
		));
	}

	public function addToCart()
	{
		$productId = $this->input->post('product_id');
		$product = $this->db->where(['product_id' => $productId, 'is_delete' => 0, 'status' => 1])->get('products')->row();
		if (!empty($product)) {
			$productData = $this->load->view('frontend/includes/addToCartModelBody', array(
				'product' => $product,
			));
			$productAddToCartData = $productData->output->final_output;

			echo json_encode(['success' => 1, 'productAddToCartData' => $productAddToCartData, 'product_id' => $product->product_id]);
			exit;
		} else {
			echo json_encode(['error' => 1, 'message' => 'Product Not Found!']);
			exit;
		}
	}

	public function addToCartProduct()
	{
		$productId = $this->input->post('productId');
		$selectedQuantity = $this->input->post('selectedProductQuantity');
		$product = $this->db->where(['product_id' => $productId, 'is_delete' => 0, 'status' => 1])
			->get('products')
			->row();

		if (!empty($product)) {
			if ($product->stock < $selectedQuantity) {
				echo json_encode(['error' => 1, 'message' => 'Stock limit exceeded!']);
				exit;
			}

			$cart = $this->session->userdata('cart') ?: [];
			$productExists = false;

			// Use reference to modify the cart item directly
			foreach ($cart as &$item) {
				if ($item['product_id'] == $productId) {
					$item['selected_quantity'] += $selectedQuantity;
					$item['total_price'] = $item['price'] * $item['selected_quantity'];
					$productExists = true;
					break;
				}
			}

			// If product does not exist in cart, add it
			if (!$productExists) {
				$cart[] = [
					'product_id' => $product->product_id,
					'product_name' => $product->product_name,
					'description' => $product->description,
					'category_id' => $product->category_id,
					'subCategory_id' => $product->subCategory_id,
					'product_image' => $product->product_image,
					'price' => $product->price,
					'stock' => $product->stock,
					'quantity' => $product->quantity,
					'mrp' => $product->mrp,
					'status' => $product->status,
					'selected_quantity' => $selectedQuantity,
					'total_price' => $product->price * $selectedQuantity,
				];
			}

			// Update the session with the modified cart
			$this->session->set_userdata('cart', $cart);

			echo json_encode(['success' => 1, 'message' => 'Product added to cart successfully!']);
			exit;
		} else {
			echo json_encode(['error' => 1, 'message' => 'Product Not Found!']);
			exit;
		}
	}

	public function deleteItemFromCart()
	{
		$product_id = $this->input->post('productId');
		$cart = $this->session->userdata('cart') ?? [];
		if (!empty($cart)) {
			$itemFound = false;

			foreach ($cart as $key => $item) {
				if ($item['product_id'] == $product_id) {
					unset($cart[$key]);
					$itemFound = true;
					break;
				}
			}

			$this->session->set_userdata('cart', $cart);
			if ($itemFound) {
				$cartItemCount = count($cart);
				echo json_encode(['success' => 1, 'message' => 'Product removed from cart successfully!', 'cartItemCount' => $cartItemCount]);
			} else {
				echo json_encode(['error' => 1, 'message' => 'Product not found in cart!']);
			}
		} else {
			echo json_encode(['error' => 1, 'message' => 'Cart is empty!']);
		}
	}

	public function cart()
	{
		$cartData = '';
		if (!empty($this->session->userdata('cart'))) {
			$cartData = $this->session->userdata('cart');
			foreach ($cartData as $key => $item) {
				$product_data = $this->db->where('product_id', $item['product_id'])->get('products')->row_array();
				if ($product_data) {
					if ($product_data['status'] != 1 || $product_data['is_delete'] != 0) {
						unset($item[$key]);
					}
				}
			}
			$this->session->set_userdata('cart', $cartData);
		}
		$this->load->view('frontend/cart.php', array('cartData' => $cartData));
	}

	public function updateProductQuantityCart()
	{
		// Post Param
		$productId = $this->input->post('productId');
		$updatedProductQuantity = $this->input->post('updatedProductQuantity');

		$productData = $this->db->where(['product_id' => $productId, 'status' => 1, 'is_delete' => 0])->get('products')->row();
		if ($productData) {
			$totalPriceOfProdcut = NULL;
			$cartData = $this->session->userdata('cart');
			foreach ($cartData as $key => $cartItem) {
				if ($productData->product_id == $cartItem['product_id']) {
					$cartData[$key]['selected_quantity'] = $updatedProductQuantity;
					$cartData[$key]['total_price'] = $cartItem['price'] * $updatedProductQuantity;
					$totalPriceOfProdcut = $cartData[$key]['total_price'];
				}
			}
			// Update Session Data
			$this->session->set_userdata('cart', $cartData);
			echo json_encode(['success' => 1, 'message' => 'Product Quantity Updated Successfully!', 'cartItemData' => number_format($totalPriceOfProdcut)]);
		} else {
			echo json_encode(['error' => 1, 'message' => 'Product Not Found!']);
		}
	}
}
