<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoryModel extends CI_Model
{

    public function add_Category($categoryData)
    {
       

        if (!empty($categoryData['status'])) {
            $categoryData['status'] = 1;
        } else {
            $categoryData['status'] = 0;
        }
        $categoryData['created_at'] = (date('Y-m-d h:i:s'));
        

        $query =  $this->db->insert('categories', $categoryData);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }


    public function category()
    {

        $query = $this->db
            ->select('*')
            ->order_by('category_id', 'DESC')
            ->where('is_delete',0)
            ->get('categories');


        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function delete_category($id)
    {

        $query =  $this->db->where('category_id', $id)->update('categories', ['is_delete' => 1]);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function get_category($id)
    {

        $query =  $this->db->where('category_id', $id)->get('categories');

        if ($query) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function update_category($id, $postdata)
    {
        if (!empty($postdata['status'])) {
            $postdata['status'] = 1;
        } else {
            $postdata['status'] = 0;
        }
        $postdata['updated_at'] = date('Y-m-d h:i:s');
        $query =  $this->db->where('category_id', $id)->update('categories', $postdata);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
