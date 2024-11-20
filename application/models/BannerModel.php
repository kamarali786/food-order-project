<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BannerModel extends CI_Model
{

    public function add_banner($bannerData)
    {
        if (!empty($bannerData['status'])) {
            $bannerData['status'] = 1;
        } else {
            $bannerData['status'] = 0;
        }
        $bannerData['created_at'] = date('Y-m-d h:i:s');
        $query =  $this->db->insert('banners', $bannerData);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }


    public function banner()
    {

        $query =  $this->db->order_by('banner_id', 'DESC')->where('is_delete',0)->get('banners');

        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function delete_banner($id)
    {

        $query =  $this->db->where('banner_id', $id)->update('banners', ['is_delete' => 1]);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function get_banner($id)
    {

        $query =  $this->db->where('banner_id', $id)->get('banners');

        if ($query) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function update_banner($id, $postdata)
    {
        if (!empty($postdata['status'])) {
            $postdata['status'] = 1;
        } else {
            $postdata['status'] = 0;
        }
        $postdata['updated_at'] = date('Y-m-d h:i:s');
        $query =  $this->db->where('banner_id', $id)->update('banners', $postdata);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
