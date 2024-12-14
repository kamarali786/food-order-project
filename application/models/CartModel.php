<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CartModel extends CI_Model
{
    public function cartAddInDatabase()
    {
        $cartItems = $this->session->userdata('cart');
        $userData = $this->session->userdata('user');
        $current_time = date('Y-m-d H:i:s');

        if ($cartItems) {
            foreach ($cartItems as $key => $item) {
                $cartItems[$key]['user_id'] = $userData->user_id;
                $cartItems[$key]['created_at'] = $current_time;

                // Fetch the product to get stock information
                $product = $this->db->where('product_id', $item['product_id'])->get('products')->row();

                if (!$product) {
                    continue; // Skip if the product does not exist
                }

                $this->db->where('user_id', $userData->user_id);
                $this->db->where('product_id', $item['product_id']);
                $existing_item = $this->db->get('carts')->row();

                if ($existing_item) {
                    $updated_quantity = $existing_item->selected_quantity + $item['selected_quantity'];

                    // Check if the total quantity exceeds the stock
                    if ($updated_quantity > $product->stock) {
                        $updated_quantity = $product->stock; // Set quantity to the available stock
                    }

                    $updated_total_price = $updated_quantity * $item['price'];

                    // Update the cart item
                    $this->db->where('cart_id', $existing_item->cart_id);
                    $this->db->update('carts', [
                        'selected_quantity' => $updated_quantity,
                        'total_price' => $updated_total_price,
                        'updated_at' => $current_time
                    ]);

                    unset($cartItems[$key]);
                } else {
                    // Add new item to insert list, ensuring stock limit is respected
                    $insert_quantity = min($item['selected_quantity'], $product->stock);

                    $insertItems[] = [
                        'user_id' => $userData->user_id,
                        'product_id' => $item['product_id'],
                        'selected_quantity' => $insert_quantity,
                        'price' => $item['price'],
                        'total_price' => $item['price'] * $insert_quantity,
                        'created_at' => $current_time,
                    ];
                }
            }
        }

        if (!empty($insertItems)) {
            $this->db->insert_batch('carts', $insertItems);
        }

        $this->session->unset_userdata('cart');
    }

    public function getCartData($user_id)
    {
        $query = $this->db
            ->select('carts.*, products.product_name,products.product_image,products.quantity,products.stock')
            ->from('carts')
            ->join('products', 'carts.product_id = products.product_id', 'inner')
            ->where(['carts.user_id' => $user_id])
            ->order_by('carts.cart_id', 'DESC')
            ->get()
            ->result_array();

        if ($query) {
            return $query;
        } else {
            return false;
        }
    }
    public function addToCart($data)
    {
        $insert = $this->db->insert('carts', $data);

        if ($insert) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteCartItem($user_id, $product_id)
    {
        $query = $this->db->where(["user_id" => $user_id, "product_id" => $product_id])->delete('carts');

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteCartAllItem($user_id)
    {
        $query = $this->db->where(["user_id" => $user_id])->delete('carts');

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function getCartItemCount($user_id)
    {
        $cartItemCount = $this->db->count_all_results('carts');
        if ($cartItemCount) {
            return $cartItemCount;
        } else {
            $cartItemCount = null;
        }
    }
}
