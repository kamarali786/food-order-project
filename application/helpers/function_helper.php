<?php
if (!function_exists('modulesCount')) {
    function modulesCount($key)
    {
        $CI = &get_instance();
        $count = 0;
        switch ($key) {
            case 'bannerCount':
                $query = $CI->db->query("SELECT COUNT(banner_id) AS num_of_time FROM banners WHERE is_delete = '0'");

                $count = $query->row()->num_of_time;
                break;
            case 'categoryCount':
                $query = $CI->db->query("SELECT COUNT(category_id) AS num_of_time FROM categories WHERE is_delete = '0'");
                $count = $query->row()->num_of_time;
                break;
            case 'subCategoryCount':
                $query = $CI->db->query("SELECT COUNT(subCategory_id) AS num_of_time FROM subcategories WHERE is_delete = '0'");
                $count = $query->row()->num_of_time;
                break;
            case 'productCount':
                $query = $CI->db->query("SELECT COUNT(product_id) AS num_of_time FROM products WHERE is_delete = '0'");
                $count = $query->row()->num_of_time;
                break;
            default:
                $count = 0;
                break;
        }

        return $count;
    }
}
if (!function_exists('dd')) {
    function dd($data)
    {
        echo "<pre>";
        print_r($data);
        // echo "</pre>";
        exit;
    }
}
if (!function_exists('generateTransactionIDWithTime')) {
    function generateTransactionIDWithTime($prefix = 'TXN')
    {
        $timestamp = time(); // Current UNIX timestamp
        $randomNumber = mt_rand(100000, 999999); // 6-digit random number
        return $prefix . $timestamp . $randomNumber;
    }
}
