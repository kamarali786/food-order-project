<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiteController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('SettingModel');
		$this->load->model('BannerModel');
		$this->load->model('FrontendAuthModel');
		$this->load->model('CartModel');
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

	// show product Details in AddTOCart Model
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

		if (empty($product)) {
			echo json_encode(['error' => 1, 'message' => 'Product Not Found or unavailable!']);
			exit;
		}

		if ($product->stock < $selectedQuantity) {
			echo json_encode(['error' => 1, 'message' => 'Stock limit exceeded!']);
			exit;
		}

		$user = $this->session->userdata('user');
		if ($user) {
			$userId = $user->user_id;

			$this->db->where('user_id', $userId);
			$this->db->where('product_id', $productId);
			$existingCart = $this->db->get('carts')->row();

			if ($existingCart) {
				$updatedData = [
					'selected_quantity' => $existingCart['selected_quantity'] + $selectedQuantity,
					'total_price' => $product->price * ($existingCart['selected_quantity'] + $selectedQuantity)
				];
				$this->db->where('cart_id', $existingCart['id']);
				$this->db->update('carts', $updatedData);
			} else {
				$data = [
					'user_id' => $userId,
					'product_id' => $product->product_id,
					'price' => $product->price,
					'selected_quantity' => $selectedQuantity,
					'total_price' => $product->price * $selectedQuantity
				];
				$this->CartModel->addToCart($data);
			}
		} else {
			$cart = $this->session->userdata('cart') ?: [];
			$productExistsInSession = false;

			foreach ($cart as &$item) {
				if ($item['product_id'] == $productId) {
					$item['selected_quantity'] += $selectedQuantity;
					$item['total_price'] = $item['price'] * $item['selected_quantity'];
					$productExistsInSession = true;
					break;
				}
			}

			if (!$productExistsInSession) {
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

			$this->session->set_userdata('cart', $cart);
		}
		echo json_encode(['success' => 1, 'message' => 'Product added to cart successfully!']);
		exit;
	}
	public function deleteItemFromCart()
	{
		$product_id = $this->input->post('productId');
		$user = $this->session->userdata('user');

		if ($user) {

			$user_id = $user->user_id;
			$deleted = $this->CartModel->deleteCartItem($user_id, $product_id);

			if ($deleted) {
				$cartItemCount = $this->CartModel->getCartItemCount($user_id);
				echo json_encode(['success' => 1, 'message' => 'Product removed from cart successfully!', 'cartItemCount' => $cartItemCount]);
			} else {
				echo json_encode(['error' => 1, 'message' => 'Product not found in cart!']);
			}
		} else {
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
	}

	public function cart()
	{
		$user = $this->session->userdata('user');
		$cartData = '';
		if (!$user) {
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
		} else {
			$user_id = $user->user_id;
			$cartData = $this->CartModel->getCartData($user_id);
		}
		$this->load->view('frontend/cart.php', array('cartData' => $cartData));
	}

	public function updateProductQuantityCart()
	{
		// Post Param
		$productId = $this->input->post('productId');
		$updatedProductQuantity = $this->input->post('updatedProductQuantity');

		$productData = $this->db->select('*')->where(['product_id' => $productId, 'status' => 1, 'is_delete' => 0,])->get('products')->row();

		$user = $this->session->userdata('user');
		if ($productData) {
			$totalPriceOfProduct = NULL;
			$cartData = $this->session->userdata('cart');
			if (!$user) {
				foreach ($cartData as $key => $cartItem) {
					if ($productData->product_id == $cartItem['product_id']) {
						$cartData[$key]['selected_quantity'] = $updatedProductQuantity;
						$cartData[$key]['total_price'] = $cartItem['price'] * $updatedProductQuantity;
						$totalPriceOfProduct = $cartData[$key]['total_price'];
					}
					$this->session->set_userdata('cart', $cartData);
				}
			} else {

				$userId = $user->user_id;
				$totalPriceOfProduct = $updatedProductQuantity * $productData->price;
				$this->db->where('user_id', $userId);
				$this->db->where('product_id', $productId);
				$this->db->update('carts', [
					'selected_quantity' => $updatedProductQuantity,
					'total_price' => $totalPriceOfProduct
				]);
			}
			echo json_encode(['success' => 1, 'message' => 'Product Quantity Updated Successfully!', 'cartItemData' => number_format($totalPriceOfProduct)]);
		} else {
			echo json_encode(['error' => 1, 'message' => 'Product Not Found!']);
		}
	}


	public function userProfile()
	{
		if ($this->session->userdata('user')) {
			$sessionUserData = $this->session->userdata('user');
		} else {
			redirect('login');
		}

		$this->load->view('frontend/userProfile', array('user' => $sessionUserData));

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$isValid = true;
			$userData = $this->input->post();


			$this->form_validation->set_rules('fname', 'First Name', 'required|regex_match[/^[a-zA-Z]+([\'\,\.\-]?[a-zA-Z ])*$/]');
			$this->form_validation->set_rules('lname', 'Last Name', 'required|regex_match[/^[a-zA-Z]+([\'\,\.\-]?[a-zA-Z ])*$/]');
			$this->form_validation->set_rules('phone', 'Phone Number', 'required|exact_length[10]|numeric');
			$this->form_validation->set_rules('address', 'Address', 'required|min_length[10]');
			$this->form_validation->set_rules('city', 'City', 'required|alpha');
			$this->form_validation->set_rules('state', 'State', 'required|alpha');
			$this->form_validation->set_rules('country', 'Country', 'required|alpha');


			$config['upload_path']   = './uploads/user/';
			$config['allowed_types'] = 'jpg|png|jpeg|gif';
			$config['max_size']      = 2048; // 2 MB
			$config['file_name']     = date('YmdHis', time());

			$this->load->library('upload', $config);
			$form_valid = $this->form_validation->run();


			if (!$form_valid) {
				$isValid = false;
			}

			$file_valid = true;
			if ($_FILES['image']['name'] != '') {
				$file_valid = $this->upload->do_upload('image');
				if (!$file_valid) {
					$isValid = false;
				}
			}

			if (!$isValid) {
				$this->session->set_flashdata('fname', $this->input->post('fname'));
				$this->session->set_flashdata('lname', $this->input->post('lname'));
				$this->session->set_flashdata('phone', $this->input->post('phone'));
				$this->session->set_flashdata('address', $this->input->post('address'));
				$this->session->set_flashdata('city', $this->input->post('city'));
				$this->session->set_flashdata('state', $this->input->post('state'));
				$this->session->set_flashdata('country', $this->input->post('country'));

				redirect(base_url('user-profile'));
			} else {
				if ($_FILES['image']['name'] != '') {
					$uploadData = $this->upload->data();
					$userData['image'] = "uploads/user/" . $uploadData['file_name'];
					if (!empty($sessionUserData->image) && file_exists($sessionUserData->image)) {
						unlink($sessionUserData->image);
					}
				} else {
					$userData['image'] = $sessionUserData->image;
				}


				$userDataSuccess = $this->FrontendAuthModel->saveUserData($userData);

				if ($userDataSuccess) {

					$user = $this->FrontendAuthModel->login($sessionUserData->email);
					$this->session->set_userdata('user', $user);
					$this->session->set_flashdata('success_message', 'User details updated successfully.');
					redirect(base_url('user-profile'));
				} else {
					$this->session->set_flashdata('error', 'Something went wrong. Please try again later.');
					redirect(base_url('user-profile'));
				}
			}
		}
	}

	public function checkout()
	{
		$this->load->view('frontend/checkout');
	}
}
