<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SettingController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin_id')) {
            redirect(base_url('admin-login'));
        }
    }
    public function index()
    {
        $this->load->view('backend/setting');
    }
    public function add_setting()
    {
        $this->load->view('backend/setting');
        // print_r($_POST);
        // exit;

        //Check if the form is submitted
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Collect form input
            $settingData = $this->input->post();

            // Set form validation rules
            $this->form_validation->set_rules('key[site_name]', 'Site Name', 'required');
            $this->form_validation->set_rules('key[email]', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('key[phone_number]', 'Contact Number', 'required');
            $this->form_validation->set_rules('key[about]', 'About', 'required');
            $this->form_validation->set_rules('key[address]', 'Address', 'required');
            $this->form_validation->set_rules('key[fb_url]', 'Facebook url', 'required');
            $this->form_validation->set_rules('key[x_url]', 'X url', 'required');
            $this->form_validation->set_rules('key[insta_url]', 'Instagram url', 'required');
            $this->form_validation->set_rules('key[yt_url]', 'Youtube url', 'required');

            $filesToUpload = $_FILES;
            // Set upload configuration
            $config['upload_path']   = './uploads/setting/logo';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']      = 1024;
            $config['file_name']     = date('YmdHis', time());
            
            $_FILES['logo']['name'] = $filesToUpload['key']['name']['logo'];
            $_FILES['logo']['tmp_name'] = $filesToUpload['key']['tmp_name']['logo'];
            $_FILES['logo']['type'] = $filesToUpload['key']['type']['logo'];
            $_FILES['logo']['error'] = $filesToUpload['key']['error']['logo'];
            $_FILES['logo']['size'] = $filesToUpload['key']['size']['logo'];
            $this->load->library('upload', $config);
            $logo_valid = $this->upload->do_upload('logo'); 
    
            $config['upload_path']   = './uploads/setting/favicon';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']      = 1024;
            $config['file_name']     = date('YmdHis', time());
            
            $_FILES['logo']['name'] = $filesToUpload['key']['name']['fav'];
            $_FILES['logo']['tmp_name'] = $filesToUpload['key']['tmp_name']['fav'];
            $_FILES['logo']['type'] = $filesToUpload['key']['type']['fav'];
            $_FILES['logo']['error'] = $filesToUpload['key']['error']['fav'];
            $_FILES['logo']['size'] = $filesToUpload['key']['size']['fav'];
            $this->load->library('upload', $config);
            $fav_valid = $this->upload->do_upload('fav'); 
            
            
            $form_valid = $this->form_validation->run();
            if (!$form_valid) {
                $this->session->set_flashdata('key[site_name]', form_error('key[site_name]'));
                $this->session->set_flashdata('key[email]', form_error('key[email]'));
                $this->session->set_flashdata('key[phone_number]', form_error('key[phone_number]'));
                $this->session->set_flashdata('key[about]', form_error('key[about]'));
                $this->session->set_flashdata('key[address]', form_error('key[address]'));
                $this->session->set_flashdata('key[fb_url]', form_error('key[fb_url]'));
                $this->session->set_flashdata('key[x_url]', form_error('key[x_url]'));
                $this->session->set_flashdata('key[insta_url]', form_error('key[insta_url]'));
                $this->session->set_flashdata('key[yt_url]', form_error('key[yt_url]'));
            }
            if(!$logo_valid)
            {
                $this->session->set_flashdata('logo_error', $this->upload->display_errors());
            }
            if(!$fav_valid)
            {
                $this->session->set_flashdata('fav_error', $this->upload->display_errors());
            }

            
            if (!$form_valid || !$logo_valid) {
                $this->session->set_flashdata('product_name', $this->input->post('product_name'));
                $this->session->set_flashdata('description', $this->input->post('description'));
                $this->session->set_flashdata('category_id', $this->input->post('category_id'));
                $this->session->set_flashdata('stock', $this->input->post('stock'));
                $this->session->set_flashdata('quantity', $this->input->post('quantity'));
                $this->session->set_flashdata('price', $this->input->post('price'));
                $this->session->set_flashdata('mrp', $this->input->post('mrp'));

                redirect(base_url('setting/add-setting'));
            } else {
                // File upload successful

                $settingData['product_image'] = "uploads/product/" . $uploadData['file_name'];

                // Save subcategory to the database
                $productAdd = $this->ProductModel->add_product($productData);

                if ($productAdd) {
                    $this->session->set_flashdata('success', 'Product added successfully.');
                    redirect(base_url('product'));
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong. Please try again later.');
                    redirect(base_url('product/add-product'));
                }
            }
        }
    }
}
            
            
            
            
