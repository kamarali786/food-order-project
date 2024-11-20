<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_Model
{

    public function admin_auth($login_data)
    {
        $email = $login_data['email'];
        $password = $login_data['password'];
        
        $query = $this->db->where(['email' => $email, 'password' => $password,'type' => 'admin'])->get('users');
        if ($query->num_rows() > 0) {
            return $query->row(); 
        } else {
            return false;
        }
    }
}
