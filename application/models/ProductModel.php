<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductModel extends CI_Model
{

    public function product()
    {
        $this->db->select('products.* ,categories.category_name,subcategories.subCategory_name');
        $this->db->from('products');
        $this->db->join('subcategories', 'products.subCategory_id = subcategories.subCategory_id ', 'left');
        $this->db->join('categories', 'subcategories.category_id = categories.category_id ', 'left');
        $this->db->order_by('products.product_id', 'DESC');
        $this->db->where('products.is_delete', 0);

        $query = $this->db->get();

        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function add_product($productData)
    {
        if (!empty($productData['status'])) {
            $productData['status'] = 1;
        } else {
            $productData['status'] = 0;
        }
        $productData['created_at'] = (date('Y-m-d h:i:s'));


        $query =  $this->db->insert('products', $productData);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function delete_product($id)
    {

        $query =  $this->db->where('product_id', $id)->update('products', ['is_delete' => 1]);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function get_product($id)
    {

        $query =  $this->db->where('product_id', $id)->get('products');

        if ($query) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function update_product($id, $postdata)
    {
        if (!empty($postdata['status'])) {
            $postdata['status'] = 1;
        } else {
            $postdata['status'] = 0;
        }
        $postdata['updated_at'] = date('Y-m-d h:i:s');
        $query =  $this->db->where('product_id', $id)->update('products', $postdata);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
