<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin_id')) {
            redirect(base_url('admin-login'));
        }
        $this->load->model('ProductModel');
        $this->load->model('SubCategoryModel');
        $this->load->model('CategoryModel');
    }

    public function product()
    {
        $data['productData'] = $this->ProductModel->product();
        $this->load->view('backend/product.php', $data);
    }
    public function add_product()
    {
        $data['CategoryData'] = $this->CategoryModel->Category();
        $this->load->view('backend/add_product', $data);

        //Check if the form is submitted

        // Collect form input
        $productData = $this->input->post();
        // Set form validation rules
        $this->form_validation->set_rules('product_name', 'product Name', 'required|regex_match[/^[a-zA-Z0-9\s\&\-\,]+$/]');
        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|alpha_numeric');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        $this->form_validation->set_rules('mrp', 'MRP', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required|min_length[10]|max_length[1000]');

        $config['upload_path']   = './uploads/product/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']      = 1024; // 1 MB
        $config['file_name']     = date('YmdHis', time());

        $this->load->library('upload', $config);
        $form_valid = $this->form_validation->run();
        $file_valid = $this->upload->do_upload('file');
        if (!$form_valid) {
            $this->session->set_flashdata('productName_error', form_error('product_name'));
            $this->session->set_flashdata('subCategory_error', form_error('subCategory_id'));
            $this->session->set_flashdata('description_error', form_error('description'));
            $this->session->set_flashdata('stock_error', form_error('stock'));
            $this->session->set_flashdata('quantity_error', form_error('quantity'));
            $this->session->set_flashdata('price_error', form_error('price'));
            $this->session->set_flashdata('mrp_error', form_error('mrp'));
        }
        if (!$file_valid) {
            $this->session->set_flashdata('file_error', $this->upload->display_errors());
        }
        if (!$form_valid || !$file_valid) {
            $this->session->set_flashdata('product_name', $this->input->post('product_name'));
            $this->session->set_flashdata('description', $this->input->post('description'));
            $this->session->set_flashdata('category_id', $this->input->post('category_id'));
            $this->session->set_flashdata('stock', $this->input->post('stock'));
            $this->session->set_flashdata('quantity', $this->input->post('quantity'));
            $this->session->set_flashdata('price', $this->input->post('price'));
            $this->session->set_flashdata('mrp', $this->input->post('mrp'));
            redirect(base_url('product/add-product'));
        } else {
            // File upload successful
            $uploadData = $this->upload->data();
            $productData['product_image'] = "uploads/product/" . $uploadData['file_name'];

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
    
    public function delete_product($id)
    {

        $data = $this->ProductModel->delete_product($id);
        if ($data) {
            $this->session->set_flashdata('error', 'Product Deleted Sucesssfully');
            redirect(base_url('product'));
        }
    }
    public function get_product($id)

    {
        $data['CategoryData'] = $this->CategoryModel->Category();
        $data['editData'] = $this->ProductModel->get_product($id);
        if ($data['CategoryData'] && $data['editData']) {
            $this->load->view('backend/add_product', $data);
        }
    }
    public function edit_product($id)
    {
        $postData = $this->input->post();
        $data['product'] = $this->ProductModel->get_product($id);

        $this->form_validation->set_rules('product_name', 'product Name', 'required|regex_match[/^[a-zA-Z0-9\s\&\-\,]+$/]');
        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|alpha_numeric');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        $this->form_validation->set_rules('mrp', 'MRP', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required|min_length[10]|max_length[1000]');
        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('productName_error', form_error('product_name'));
            $this->session->set_flashdata('description_error', form_error('description'));
            $this->session->set_flashdata('stock_error', form_error('stock'));
            $this->session->set_flashdata('quantity_error', form_error('quantity'));
            $this->session->set_flashdata('price_error', form_error('price'));
            $this->session->set_flashdata('mrp_error', form_error('mrp'));

            // Set form data in flashdata to repopulate the form
            $this->session->set_flashdata('product_name', $this->input->post('product_name'));
            $this->session->set_flashdata('description', $this->input->post('description'));
            $this->session->set_flashdata('stock', $this->input->post('stock'));
            $this->session->set_flashdata('quantity', $this->input->post('quantity'));
            $this->session->set_flashdata('price', $this->input->post('price'));
            $this->session->set_flashdata('mrp', $this->input->post('mrp'));

            redirect('product/get-product/' . $id);
        } else {
            $config['upload_path']   = './uploads/product/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']      = 1024;
            $config['file_name'] = date('His', time());
            
            $this->load->library('upload', $config);
            if (!empty($_FILES['file']['name'])) {  
                if (!$this->upload->do_upload('file')) {
                    $this->session->set_flashdata('file_error', $this->upload->display_errors());
                    redirect('product/get-product/' . $id);
                } else {
                    $Data = $this->upload->data();
                    $Data['raw_name'] = date('His', time());
                    $postData['product_image']  = "uploads/product/" . $config['file_name'] . $Data['file_ext'];
                }

                if (file_exists($data['product']->product_image)) {
                    unlink($data['product']->product_image);
                }
            } else {
                $postData['product_image'] = $data['product']->product_image;
            }
            $productUpdate = $this->ProductModel->update_product($id, $postData);
            if ($productUpdate) {
                $this->session->set_flashdata('success', 'Product updated successfully');
                redirect(base_url('product'));
            } else {
                $this->session->set_flashdata('error', 'Something went wrong. Please try again later.');
                redirect('product/get-product/' . $id);
            }
        }
    }
}
