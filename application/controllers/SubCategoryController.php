<?php
defined('BASEPATH') or exit('No direct script access allowed');

class subCategoryController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('subCategoryModel');
        if (!$this->session->userdata('admin_id')) {
            redirect(base_url('admin-login'));
        }

        $this->load->model('SubCategoryModel');
        $this->load->model('CategoryModel');
        
    }
    
    public function add_subCategory()
{
    $data['categoryData'] = $this->CategoryModel->category();
    $this->load->view('backend/add_subCategory', $data);

    // Check if the form is submitted
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        // Collect form input
        $subCategoryData = $this->input->post();

        // Set form validation rules
        $this->form_validation->set_rules('subCategory_name', 'SubCategory Name', 'required|regex_match[/^[a-zA-Z0-9\s\&\-\,]+$/]');
        $this->form_validation->set_rules('category_id', 'Category', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required|min_length[10]|max_length[1000]');

        // File upload configuration
        $config['upload_path']   = './uploads/subCategory/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']      = 1024; // 1 MB
        $config['file_name']     = date('YmdHis', time());

        $this->load->library('upload', $config);

        // Run form validation
        if (!$this->form_validation->run()) {
            // Set validation errors in flashdata
            $this->session->set_flashdata('subCategoryName_error', form_error('subCategory_name'));
            $this->session->set_flashdata('category_error', form_error('category_id'));
            $this->session->set_flashdata('description_error', form_error('description'));

            // Set form data in flashdata to repopulate the form
            $this->session->set_flashdata('subCategory_name', $this->input->post('subCategory_name'));
            $this->session->set_flashdata('description', $this->input->post('description'));
            $this->session->set_flashdata('category_id', $this->input->post('category_id'));

            redirect(base_url('subCategory/add-subCategory'));
        } else {
            // Handle file upload
            if (!$this->upload->do_upload('file')) {
                // Set file upload error in flashdata
                $this->session->set_flashdata('file_error', $this->upload->display_errors());

                // Repopulate form data
                $this->session->set_flashdata('subCategory_name', $this->input->post('subCategory_name'));
                $this->session->set_flashdata('description', $this->input->post('description'));
                $this->session->set_flashdata('category_id', $this->input->post('category_id'));

                redirect(base_url('subCategory/add-subCategory'));
            } else {
                // File upload successful
                $uploadData = $this->upload->data();
                $subCategoryData['subcate_image'] = "uploads/subCategory/" . $uploadData['file_name'];

                // Save subcategory to the database
                $subCategoryAdd = $this->SubCategoryModel->add_subCategory($subCategoryData);

                if ($subCategoryAdd) {
                    $this->session->set_flashdata('success', 'Sub Category added successfully.');
                    redirect(base_url('sub-category'));
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong. Please try again later.');
                    redirect(base_url('subCategory/add-subCategory'));
                }
            }
        }
    }
}


    public function subCategory()
    {
        $data['subCategoryData'] = $this->SubCategoryModel->subCategory();
        $this->load->view('backend/subCategory.php', $data);
    }
    public function delete_subCategory($id)
    {
        $data = $this->SubCategoryModel->delete_subCategory($id);
        if ($data) {
            $this->session->set_flashdata('error', 'Sub Category Deleted Sucesssfully');
            redirect(base_url('sub-category'));
        }
    }
    public function get_subCategory($id)
    
    {
        $data['categoryData'] = $this->CategoryModel->category();
        $data['editData'] = $this->SubCategoryModel->get_subCategory($id);
        if ($data['categoryData'] && $data['editData']) {
            $this->load->view('backend/add_subCategory', $data);
        }
    }
    public function edit_subCategory($id)
    {
        $postData = $this->input->post();
        $data['subCategory'] = $this->SubCategoryModel->get_subCategory($id);
        $this->form_validation->set_rules('subCategory_name', 'subCategory Name', 'required|regex_match[/^[a-zA-Z0-9\s\&\-\,]+$/]');
        $this->form_validation->set_rules('category_id', 'Category', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required|min_length[10]|max_length[1000]');
        $this->load->view('backend/add_subCategory.php');
        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('subCategoryName', $this->input->post('subCategory_name'));
            $this->session->set_flashdata('description_value', $this->input->post('description'));
             $this->session->set_flashdata('subCategoryName_error', form_error('subCategory_name'));
            $this->session->set_flashdata('description', form_error('description'));
            redirect('subCategory/get-subCategory/' . $id);
        } else {
            $config['upload_path']   = './uploads/subCategory/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']      = 1024;
            $config['file_name'] = date('His', time());

            $this->load->library('upload', $config);
            if (!empty($_FILES['file']['name'])) {
                if (!$this->upload->do_upload('file')) {
                    $this->session->set_flashdata('file_error', $this->upload->display_errors());
                    $this->session->set_flashdata('subCategoryName', $this->input->post('subCategory_name'));
                    redirect('subCategory/get-subCategory/' . $id);
                } else {
                    $data = $this->upload->data();
                    $data['raw_name'] = date('His', time());
                    $postData['subcate_image']  = "uploads/subCategory/" . $config['file_name'] . $data['file_ext'];
                }
            } else {
                $postData['subcate_image'] = $data['subCategory']->subcate_image;
            }
            $subCategoryUpdate = $this->SubCategoryModel->update_subCategory($id, $postData);
            if ($subCategoryUpdate) {
                $this->session->set_flashdata('success', 'Sub Category updated successfully');
                redirect(base_url('sub-category'));
            } else {
                $this->session->set_flashdata('error', 'Something went wrong. Please try again later.');
                redirect(base_url('subCategory/get-subCategory/' . $id));
            }
        }
        
    }
}
