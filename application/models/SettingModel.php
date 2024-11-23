<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SettingModel extends CI_Model
{

    public function save_setting($settingData)
    {   
        foreach ($settingData as $key => $value) {
            $saveSetting = [
                'key' => $key,
                'value' => $value,
                'created_at' => date('Y-m-d h:i:s')
            ];
            $query = $this->db->insert("settings", $saveSetting);
        }
        if ($query) {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function get_setting()
    {
        $query = $this->db->order_by('id')->get('settings');

        if ($query) {

            return $query->result();
           
        }
    }
}
