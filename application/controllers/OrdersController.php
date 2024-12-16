<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrdersController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin_id')) {
            redirect(base_url('admin-login'));
        }

        $this->load->model('OrderModel');
    }

    public function getOrdersData()
    {

        $orders = $this->OrderModel->getAllOrders();
        if ($orders) {
            $this->load->view('backend/orders', ['orders' => $orders]);
        } else {
            $this->session->set_flashdata('error_message', 'No Order Data Found');
            $this->load->view('backend/orders');
        }
    }
    public function getOrdersDataItems($order_id)
    {
        $orderItems = $this->OrderModel->getOrderProductsData(null, $order_id);
        if ($orderItems) {
            $this->load->view('backend/order_details', ['orderItems' => $orderItems]);
        }
    }
    public function changeOrderStatus()
    {
        $order_id = $_POST['order_id'];
        $orderStatus = $_POST['orderStatus'];
        $statusChange = $this->OrderModel->changeOrderStatus($order_id, $orderStatus);
        if ($statusChange) {
            echo json_encode(['success' => 1, 'message' => 'Status Changed SuccessFully.!']);
            exit;
        }
    }
}
