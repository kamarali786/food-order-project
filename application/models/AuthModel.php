<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_Model
{

    public function register($register)
    {
        $register['status'] = 0;
        $register['created_at'] = (date('Y-m-d h:i:s'));


        $query =  $this->db->insert('users', $register);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}


