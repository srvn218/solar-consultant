<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->helper(['form', 'url']);
    }

    // List all products
    public function index() {
        $data['products'] = $this->Product_model->get_all();
        $this->load->view('layout/header');
        $this->load->view('product/list', $data);
        $this->load->view('layout/footer');
    }

    // Add product
    public function add() {
        if ($this->input->post()) {
            $config['upload_path'] = './uploads/products/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);

            $img = '';
           if (!empty($_FILES['image']['name'])) {
    if ($this->upload->do_upload('image')) {
        $img = 'uploads/products/'.$this->upload->data('file_name');
    } else {
        // <--- ADD THIS TO SEE THE REAL ERROR
        echo $this->upload->display_errors();
        echo '<pre>'; print_r($_FILES); echo '</pre>';
        exit;
    }
}

            $data = [
                'name' => $this->input->post('name', true),
                'price' => $this->input->post('price', true),
                'description' => $this->input->post('description', true),
                'image' => $img
            ];
            $this->Product_model->insert($data);
            redirect('product');
        }
        $this->load->view('layout/header');
        $this->load->view('product/add');
        $this->load->view('layout/footer');
    }

    // View a single product
  public function view($id) {
    $data['product'] = $this->Product_model->get($id);
    if (!$data['product']) show_404();
    $this->load->view('layout/header');
    $this->load->view('product/view', $data); // <--- This should be 'view', not 'edit'
    $this->load->view('layout/footer');
}


    // Edit product
    public function edit($id) {
        $product = $this->Product_model->get($id);
        if (!$product) show_404();

        if ($this->input->post()) {
            $config['upload_path'] = './uploads/products/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);

            $img = $product['image'];
            if (!empty($_FILES['image']['name'])) {
                if ($this->upload->do_upload('image')) {
                    $img = 'uploads/products/'.$this->upload->data('file_name');
                }
            }
            $data = [
                'name' => $this->input->post('name', true),
                'price' => $this->input->post('price', true),
                'description' => $this->input->post('description', true),
                'image' => $img
            ];
            $this->Product_model->update($id, $data);
            redirect('product');
        }
        $data['product'] = $product;
        $this->load->view('layout/header');
        $this->load->view('product/edit', $data);
        $this->load->view('layout/footer');
    }

    // Delete product
    public function delete($id) {
        $product = $this->Product_model->get($id);
        if ($product) {
            // Optionally: delete image file from disk, e.g. unlink(FCPATH.$product['image']);
            $this->Product_model->delete($id);
        }
        redirect('product');
    }
}
