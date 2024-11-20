<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BannerController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BannerModel');
        if (!$this->session->userdata('admin_id')) {
            redirect(base_url('admin-login'));
        }
    }
    public function add_banner()
    {
        $this->load->view('backend/add_banner.php');
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $bannerData = $this->input->post();
            $this->form_validation->set_rules('banner_label', 'Banner Label', 'required|max_length[50]|regex_match[/^[a-zA-Z0-9\s\&\-\?\"\,]+$/]');
            $config['upload_path']   = './uploads/banner/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']      = 1024;
            $config['file_name'] = date('His', time());

            $this->load->library('upload', $config);
            $form_valid = $this->form_validation->run();
            $file_valid = $this->upload->do_upload('file');
            if (!$form_valid) {
                $this->session->set_flashdata('bannerLabel_error', form_error('banner_label'));
            }
            if (!$file_valid) {
                $this->session->set_flashdata('file_error', $this->upload->display_errors());
            }
            if (!$form_valid || !$file_valid) {
                $this->session->set_flashdata('bannerLabel', $this->input->post('banner_label'));
                redirect(base_url('banner/add-banner'));
            } else {
                $data = $this->upload->data();
                $data['raw_name'] = date('His', time());
                $bannerData['bann_image']  = "uploads/banner/" . $config['file_name'] . $data['file_ext'];
                $bannerAdd = $this->BannerModel->add_banner($bannerData);
                if ($bannerAdd) {
                    $this->session->set_flashdata('success', 'Banner Add Sucesssfully');
                    redirect(base_url('banner'));
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong. Please try again later.');
                    redirect(base_url('banner/add-banner'));
                }
            }
        }
    }
    public function banner()
    {
        $data['BannerData'] = $this->BannerModel->banner();
        $this->load->view('backend/banner.php', $data);
    }
    public function delete_banner($id)
    {
        $data = $this->BannerModel->delete_banner($id);
        if ($data) {
            $this->session->set_flashdata('error', 'Banner Deleted Sucesssfully');
            redirect(base_url('banner'));
        }
    }
    public function get_banner($id)
    {
        $data['editData'] = $this->BannerModel->get_banner($id);
        if ($data) {
            $this->load->view('backend/add_banner.php', $data);
        }
    }
    public function edit_banner($id)
    {
        $postData = $this->input->post();
        $data['banner'] = $this->BannerModel->get_banner($id);

        $this->load->view('backend/add_banner.php');
        $this->form_validation->set_rules('banner_label', 'Banner Label', 'required|min_length[10]|max_length[50]|regex_match[/^[a-zA-Z0-9\s\&\-\?\"\,]+$/]');
        $config['upload_path']   = './uploads/banner/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']      = 1024;
        $config['file_name'] = date('His', time());

        $this->load->library('upload', $config);
        $form_valid = $this->form_validation->run();
        if (!$form_valid) {
            $this->session->set_flashdata('bannerLabel_error', form_error('banner_label'));
            $this->session->set_flashdata('bannerLabel', $this->input->post('banner_label'));
            redirect(base_url('banner/get-banner/' . $id));
        }
        if (!empty($_FILES['file']['name'])) {
            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('file_error', $this->upload->display_errors());
                redirect('banner/get-banner/' . $id);
            } else {
                $Data = $this->upload->data();
                $Data['raw_name'] = date('His', time());
                $postData['bann_image']  = "uploads/banner/" . $config['file_name'] . $Data['file_ext'];
            }
            if (file_exists($data['banner']->bann_image)) {
                unlink($data['banner']->bann_image);
            }
        } else {
            $postData['bann_image'] = $data['banner']->bann_image;
        }
        $bannerUpdate = $this->BannerModel->update_banner($id, $postData);
        if ($bannerUpdate) {
            $this->session->set_flashdata('success', 'Banner updated successfully');
            redirect(base_url('banner'));
        } else {
            $this->session->set_flashdata('error', 'Something went wrong. Please try again later.');
            redirect(base_url('banner/get-banner/' . $id));
        }
    }
}
