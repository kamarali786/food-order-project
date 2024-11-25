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
        $data['setting'] = $this->SettingModel->get_setting();
        $this->load->view('backend/setting', $data);
    }
    public function add_setting()
    {
        $this->index();
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $settingData = $this->input->post();
            $exist = $this->SettingModel->get_setting();

            $this->form_validation->set_rules('site_name', 'Site Name', 'regex_match[/^[a-zA-Z0-9 \-\|]+$/]');
            $this->form_validation->set_rules('email', 'Email', 'valid_email');
            $this->form_validation->set_rules('phone_number', 'Contact Number', 'numeric|min_length[10]|max_length[10]');
            $this->form_validation->set_rules('about', 'About', 'min_length[10]|max_length[1000]');
            $this->form_validation->set_rules('address', 'Address', 'min_length[10]|max_length[1000]');
            $this->form_validation->set_rules('fb_url', 'Facebook url', 'valid_url');
            $this->form_validation->set_rules('x_url', 'X url', 'valid_url');
            $this->form_validation->set_rules('insta_url', 'Instagram url', 'valid_url');
            $this->form_validation->set_rules('yt_url', 'Youtube url', 'valid_url');


            $config['upload_path']   = './uploads/setting/logo';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']      = 1024;
            $config['file_name']     = date('YmdHis') . '_logo';

            $this->load->library('upload', $config);
            $logo_valid = $this->upload->do_upload('logo');
            $uploadLogo = $this->upload->data();


            $config1['upload_path']   = './uploads/setting/favicon';
            $config1['allowed_types'] = 'jpg|png|jpeg';
            $config1['max_size']      = 1024;
            $config1['file_name']     = date('YmdHis') . '_favicon';

            $this->upload->initialize($config1);
            $fav_icon_valid = $this->upload->do_upload('fav_icon');
            $uploadFav = $this->upload->data();

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

            if (!$form_valid) {

                foreach ($settingData as $key => $value) {
                    $this->session->set_flashdata($key . '_data', $value);
                }

                redirect(base_url('setting/add-setting'));
            } else {
                if ($logo_valid) {
                    $settingData['logo'] = "uploads/setting/logo/" . $uploadLogo['file_name'];
                    if (file_exists($exist['logo'])) {
                        unlink($exist['logo']);
                    }
                }
                
                if ($fav_icon_valid) {
                    $settingData['fav_icon'] = "uploads/setting/favicon/" . $uploadFav['file_name'];
                    if (file_exists($exist['fav_icon'])) {
                        unlink($exist['fav_icon']);
                    }
                }
                $updateResult = $this->SettingModel->save_setting($settingData);
                if ($updateResult) {
                    $this->session->set_flashdata('success', 'Settings updated successfully.');
                    redirect(base_url('setting/add-setting'));
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong. Please try again later.');
                    redirect(base_url('setting/add-setting'));
                }
            }
        }
    }
}
