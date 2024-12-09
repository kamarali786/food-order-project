<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FrontendAuthModel extends CI_Model
{
    public function register($register)
    {
        $register['status'] = 1;
        $register['created_at'] = (date('Y-m-d h:i:s'));
        $register['type'] = 'user';
        $getData = $this->db->where(['email' => $register['email'], 'type' => 'user', 'is_delete' => 0])->get('users')->row();

        if (empty($getData)) {
            $query =  $this->db->insert('users', $register);
            if ($query) {
                return ['status' => true, 'message' => 'Registration successful'];
            } else {
                return ['status' => false, 'message' => 'An error occurred while registering'];
            }
        } else {
            return ['status' => false, 'message' => 'Email ID already exists'];
        }
    }
    public function login($email)
    {
        $getData = $this->db->where(['email' => $email, 'type' => 'user', 'is_delete' => 0, 'status' => 1])->get('users')->row();
        if($getData)
        {   
            return $getData;    
        }else
        {
            return false;
        }
    }
}
