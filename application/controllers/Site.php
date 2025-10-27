<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    public function index() {
        $this->load->view('site/header');
        $this->load->view('site/home');
        $this->load->view('site/footer');
    }

    public function about() {
    $this->load->model('Team_model');
    $data['lead_team'] = $this->Team_model->get_by_role('lead team');
    $data['key_workers'] = $this->Team_model->get_by_role('key worker');
    $this->load->view('site/header');
    $this->load->view('site/about', $data);
    $this->load->view('site/footer');
}

public function save_quote() {
    $this->load->model('Lead_model');
    $data = [
        'full_name'        => $this->input->post('full_name', true),
        'whatsapp'         => $this->input->post('whatsapp', true),
        'pincode'          => $this->input->post('pincode', true),
        'avg_monthly_bill' => $this->input->post('avg_monthly_bill', true),
        'status'           => 'new',
        'interest_level'   => 'medium'
    ];
    $this->Lead_model->insert($data);
    $this->session->set_flashdata('success', 'Thank you! Your quote request has been saved.');
    redirect('/');
}


    public function products() {
    $this->load->model('Product_model');
    $data['products'] = $this->Product_model->get_all();
    $this->load->view('site/header');
    $this->load->view('site/products', $data);
    $this->load->view('site/footer');
}


    public function contact() {
        $this->load->view('site/header');
        $this->load->view('site/contact');
        $this->load->view('site/footer');
    }

    public function save_lead()
{
    $data = [
        'name' => $this->input->post('name', TRUE),
        'email' => $this->input->post('email', TRUE),
        'phone' => $this->input->post('phone', TRUE),
        'status' => 'new',
        'interest_level' => 'medium'
    ];
    $this->db->insert('leads', $data);

    // Optional: Redirect back to home page with thank you message
    $this->session->set_flashdata('success', 'Your request has been submitted!');
    redirect('/');
}

}
