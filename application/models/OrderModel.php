<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrderModel extends CI_Model
{
    public function orders($orderData, $orderDetails)
    {
        $order = $this->db->insert('orders', $orderData);
        $order_id = $this->db->insert_id();
        if ($order) {
            foreach ($orderDetails as $orderProductDetails) {
                $orderProductDetails['order_id'] = $order_id;
                $orderProductDetails['created_at'] = date('Y-m-d H:i:s');

                $order_details = $this->db->insert('order_products', $orderProductDetails);
            }
            if ($order_details) {
                return $order_id;
            } else {
                return false;
            }
        }
    }


    public function getOrdersData($user_id)
    {
        $query = $this->db->where('user_id', $user_id)->get('orders');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function getOrderDetails($order_id)
    {
        $query = $this->db->where('user_id', $user_id)->get('orders');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getOrderProductsData($user_id, $order_id)
    {
        $this->db->select('
        orders.order_id,
        orders.order_date,
        orders.order_status,
        orders.order_number,
        orders.total_amount,
        orders.billing_data,
        orders.payment_method,
        orders.payment_status,
        orders.delivery_date,
        orders.shipping_address,
        orders.transaction_id,
        order_products.product_id,
        order_products.selected_quantity,
        order_products.total_price,
        products.product_name,
        products.price AS product_price,
        products.product_image
    ');
        $this->db->from('orders');
        $this->db->join('order_products', 'orders.order_id = order_products.order_id', 'inner');
        $this->db->join('products', 'order_products.product_id = products.product_id', 'inner');
        $this->db->where('orders.user_id', $user_id);
        $this->db->where('orders.order_id', $order_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            $orderData = [];
            $orderItems = [];

            foreach ($query->result_array() as $row) {
                if (empty($orderData)) {
                    $orderData = [
                        'order_id'        => $row['order_id'],
                        'order_number'    => $row['order_number'],
                        'order_date'      => $row['order_date'],
                        'order_status'    => $row['order_status'],
                        'total_amount'    => $row['total_amount'],
                        'payment_method'  => $row['payment_method'],
                        'payment_status'  => $row['payment_status'],
                        'delivery_date'   => $row['delivery_date'],
                        'shipping_address'=> $row['shipping_address'],
                        'billing_data'    => $row['billing_data'],
                        'transaction_id'  => $row['transaction_id']
                    ];
                }
                $orderItems[] = [
                    'product_id'       => $row['product_id'],
                    'product_name'     => $row['product_name'],
                    'product_image'    => $row['product_image'],
                    'selected_quantity' => $row['selected_quantity'],
                    'product_price'    => $row['product_price'],
                    'total_price' => $row['total_price'],
                ];
            }
            
            $orderData['order_items'] = $orderItems;

            return $orderData;
        }
    }
}
