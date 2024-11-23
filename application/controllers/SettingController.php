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
        $this->load->model('SettingModel');
    }
    public function index()
    {
        $this->load->view('backend/setting');
    }
   
    public function add_setting()
    {
        $this->load->view('backend/setting');
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $settingData = $this->input->post();
            
            $this->form_validation->set_rules('site_name', 'Site Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone_number', 'Contact Number', 'required');
            $this->form_validation->set_rules('about', 'About', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('fb_url', 'Facebook url', 'required');
            $this->form_validation->set_rules('x_url', 'X url', 'required');
            $this->form_validation->set_rules('insta_url', 'Instagram url', 'required');
            $this->form_validation->set_rules('yt_url', 'Youtube url', 'required');
            
            $config['upload_path']   = './uploads/setting/logo';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']      = 1024;
            $config['file_name']     = date('YmdHis') . '_logo';
            
            
            $this->load->library('upload', $config);
            $logo_valid = $this->upload->do_upload('logo');
            
            $config1['upload_path']   = './uploads/setting/favicon';
            $config1['allowed_types'] = 'jpg|png|jpeg';
            $config1['max_size']      = 1024;
            $config1['file_name']     = date('YmdHis') . '_favicon';
            
            
            $this->upload->initialize($config1);
            $fav_icon_valid = $this->upload->do_upload('fav_icon');
            
            if (!$logo_valid) {
                $this->session->set_flashdata('logo_error', $this->upload->display_errors());
            }
            if (!$fav_icon_valid) {
                $this->session->set_flashdata('fav_icon_error', $this->upload->display_errors());
            }
            
            $form_valid = $this->form_validation->run();
            
            if (!$form_valid) {
                $this->session->set_flashdata('site_name', form_error('site_name'));
                $this->session->set_flashdata('email', form_error('email'));
                $this->session->set_flashdata('phone_number', form_error('phone_number'));
                $this->session->set_flashdata('about', form_error('about'));
                $this->session->set_flashdata('address', form_error('address'));
                $this->session->set_flashdata('fb_url', form_error('fb_url'));
                $this->session->set_flashdata('x_url', form_error('x_url'));
                $this->session->set_flashdata('insta_url', form_error('insta_url'));
                $this->session->set_flashdata('yt_url', form_error('yt_url'));
            }
            
            if (!$form_valid || !$logo_valid || !$fav_icon_valid) {
                $this->session->set_flashdata('site_name_data', $this->input->post('site_name'));
                $this->session->set_flashdata('email_data', $this->input->post('email'));
                $this->session->set_flashdata('phone_number_data', $this->input->post('phone_number'));
                $this->session->set_flashdata('about_data', $this->input->post('about'));
                $this->session->set_flashdata('address_data', $this->input->post('address'));
                $this->session->set_flashdata('fb_url_data', $this->input->post('fb_url'));
                $this->session->set_flashdata('x_url_data', $this->input->post('x_url'));
                $this->session->set_flashdata('insta_url_data', $this->input->post('insta_url'));
                $this->session->set_flashdata('yt_url_data', $this->input->post('yt_url'));
                
                
                redirect(base_url('setting/add-setting'));
            } else {
                $productAdd = $this->SettingModel->save_setting($settingData);
                if ($productAdd) {
                    $this->session->set_flashdata('success', 'Setting added successfully.');
                    redirect(base_url('setting/add-setting'));
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong. Please try again later.');
                    redirect(base_url('setting/add-setting'));
                }
            }
        }
    }

}
