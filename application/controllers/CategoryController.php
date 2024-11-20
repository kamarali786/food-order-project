<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoryController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CategoryModel');
        if (!$this->session->userdata('admin_id')) {
            redirect(base_url('admin-login'));
        }
    }
    public function add_category()
    {
        // Check if the form is submitted
        
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $categoryData = $this->input->post();
            $this->form_validation->set_rules('category_name', 'Category Name', 'required|regex_match[/^[a-zA-Z0-9\s\&\-\,]+$/]');
            $config['upload_path']   = './uploads/category/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']      = 1024; // 1 MB
            $config['file_name']     = date('His', time());

            $this->load->library('upload', $config);

            if (!$this->form_validation->run()) {
                $this->session->set_flashdata('categoryName_error', form_error('category_name'));
                redirect(base_url('category/add-category'));
            } else {
                if (!$this->upload->do_upload('file')) {
                    $this->session->set_flashdata('file_error', $this->upload->display_errors());
                    $this->session->set_flashdata('categoryName', $this->input->post('category_name'));

                    //redirect(base_url('category/add-category'));
                } else {
                    $uploadData = $this->upload->data();
                    $categoryData['cate_image'] = "uploads/category/" . $config['file_name'] . $uploadData['file_ext'];
                    $categoryAdd = $this->CategoryModel->add_category($categoryData);

                    if ($categoryAdd) {
                        $this->session->set_flashdata('success', 'Category added successfully.');
                        redirect(base_url('category'));
                    } else {
                        $this->session->set_flashdata('error', 'Something went wrong. Please try again later.');
                        redirect(base_url('category/add-category'));
                    }
                }
            }
        }

        $this->load->view('backend/add_category');
    }

    public function category()
    {
        $data['categoryData'] = $this->CategoryModel->category();
        $this->load->view('backend/category.php', $data);
    }
    public function delete_category($id)
    {
        $data = $this->CategoryModel->delete_category($id);
        if ($data) {
            $this->session->set_flashdata('error', 'category Deleted Sucesssfully');
            redirect(base_url('category'));
        }
    }
    public function get_category($id)
    {
        $data['editData'] = $this->CategoryModel->get_category($id);
        if ($data) {
            $this->load->view('backend/add_category.php', $data);
        }
    }
    public function edit_category($id)
    {

        $postData = $this->input->post();
        $data['category'] = $this->CategoryModel->get_category($id);
        $this->form_validation->set_rules('category_name', 'Category Name', 'required|regex_match[/^[a-zA-Z0-9\s\&\-\,]+$/]');
        $this->load->view('backend/add_category.php');
        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('categoryName_error', form_error('category_name'));
            redirect('category/get-category/' . $id);
        } else {
            $config['upload_path']   = './uploads/category/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']      = 1024;
            $config['file_name'] = date('His', time());

            $this->load->library('upload', $config);
            if (!empty($_FILES['file']['name'])) {
                if (!$this->upload->do_upload('file')) {
                    $this->session->set_flashdata('file_error', $this->upload->display_errors());
                    $this->session->set_flashdata('categoryName', $this->input->post('category_name'));
                    redirect('category/get-category/' . $id);
                } else {
                    $data = $this->upload->data();
                    $data['raw_name'] = date('His', time());
                    $postData['cate_image']  = "uploads/category/" . $config['file_name'] . $data['file_ext'];
                }
            } else {
                $postData['cate_image'] = $data['category']->cate_image;
            }
            $categoryUpdate = $this->CategoryModel->update_category($id, $postData);
            if ($categoryUpdate) {
                $this->session->set_flashdata('success', 'category updated successfully');
                redirect(base_url('category'));
            } else {
                $this->session->set_flashdata('error', 'Something went wrong. Please try again later.');
                redirect(base_url('category/get-category/' . $id));
            }
        }
        
    }
}
