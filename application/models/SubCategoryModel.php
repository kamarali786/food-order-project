<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubCategoryModel extends CI_Model
{

    public function add_subCategory($subCategoryData)
    {
        if (!empty($subCategoryData['status'])) {
            $subCategoryData['status'] = 1;
        } else {
            $subCategoryData['status'] = 0;
        }
        $subCategoryData['created_at'] = (date('Y-m-d h:i:s'));


        $query =  $this->db->insert('subcategories', $subCategoryData);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }


    public function subCategory()
    {

        $this->db->select('subcategories.* , categories.category_name as category_name');
        $this->db->from('subcategories');
        $this->db->join('categories', 'subcategories.category_id = categories.category_id');
        $this->db->order_by('subcategories.subCategory_id', 'DESC'); 
        $this->db->where('subcategories.is_delete',0);
        $query = $this->db->get();

        return $query->result();

        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function delete_subCategory($id)
    {

        $query =  $this->db->where('subCategory_id', $id)->update('subcategories', ['is_delete' => 1]);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function get_subCategory($id)
    {

        $query =  $this->db->where('subCategory_id', $id)->get('subcategories');

        if ($query) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function update_subCategory($id, $postdata)
    {
        if (!empty($postdata['status'])) {
            $postdata['status'] = 1;
        } else {
            $postdata['status'] = 0;
        }
        $postdata['updated_at'] = date('Y-m-d h:i:s');
        $query =  $this->db->where('subCategory_id', $id)->update('subcategories', $postdata);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
