<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SettingModel extends CI_Model
{

    public function save_setting($settingData)
    {
        
        foreach ($settingData as $key => $value) {
            $existing = $this->db->where('key', $key)->get('settings')->row();
            if (!empty($existing)) {
                $updateData = [
                    'value' => $value,
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                $this->db->where('key', $key)->update('settings', $updateData);
            } else {
                if($key == 'fav_icon')
                {
                    exit;
                }
                $insertData = [
                    'key' => $key,
                    'value' => $value,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $this->db->insert('settings', $insertData);
            }
        }
        // Always return true after the loop completes
        return true;
    }

    public function get_setting()
    {
        $query = $this->db->order_by('id')->get('settings');

        $data = [];

        if ($query) {

            $result =  $query->result();

            foreach ($result as $row) {
                $data[$row->key] =  $row->value;
            }
            return $data;
        } else {
            return $data;
        }
    }
}
