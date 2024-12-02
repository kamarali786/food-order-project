<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'SiteController';
$route['admin-login'] = 'AuthController';
$route['admin-login/login'] = 'AuthController/login';

$route['about-us'] = 'SiteController/about';
$route['contact-us'] = 'SiteController/contactus';
$route['products'] = 'SiteController/products';

$route['dashboard'] = 'DashboardController';
$route['logout'] = 'AuthController/logout';

$route['banner'] = 'BannerController/banner';
$route['banner/add-banner'] = 'BannerController/add_banner';
$route['banner/delete-banner/(:any)'] = 'BannerController/delete_banner/$1';
$route['banner/get-banner/(:any)'] = 'BannerController/get_banner/$1';
$route['banner/edit-banner/(:any)'] = 'BannerController/edit_banner/$1';

$route['category'] = 'CategoryController/category';
$route['category/add-category'] = 'CategoryController/add_Category';
$route['category/delete-category/(:any)'] = 'CategoryController/delete_Category/$1';
$route['category/get-category/(:any)'] = 'CategoryController/get_Category/$1';
$route['category/edit-category/(:any)'] = 'CategoryController/edit_Category/$1';

$route['sub-category'] = 'SubCategoryController/subCategory';
$route['subCategory/add-subCategory'] = 'subCategoryController/add_subCategory';
$route['subCategory/delete-subCategory/(:any)'] = 'SubCategoryController/delete_subCategory/$1';
$route['subCategory/get-subCategory/(:any)'] = 'SubCategoryController/get_subCategory/$1';
$route['subCategory/edit-subCategory/(:any)'] = 'subCategoryController/edit_subCategory/$1';
$route['sub-category-id'] = 'subCategoryController/subcategory_data';

$route['product'] = 'ProductController/product';
$route['product/add-product'] = 'ProductController/add_product';
$route['product/delete-product/(:any)'] = 'ProductController/delete_product/$1';
$route['product/get-product/(:any)'] = 'ProductController/get_product/$1';
$route['product/edit-product/(:any)'] = 'ProductController/edit_product/$1';

$route['setting'] = 'SettingController';
$route['setting/add-setting'] = 'SettingController/add_Setting';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
