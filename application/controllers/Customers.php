<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'form'));

        // Ensure user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    // List all customers
    public function index()
    {
        $data['customers'] = $this->Customer_model->get_all_customers();

        $this->load->view('layout/header');
        $this->load->view('customers/list', $data);
        $this->load->view('layout/footer');
    }

    // View single customer details
    public function view($id = NULL)
    {
        if (!$id || !($customer = $this->Customer_model->get_customer_by_id($id))) {
            show_404();
        }

        $data['customer'] = $customer;

        $this->load->view('layout/header');
        $this->load->view('customers/view', $data);
        $this->load->view('layout/footer');
    }

    // Show form to create or edit a customer
    public function form($id = NULL)
    {
        $data = array();

        if ($id) {
            $customer = $this->Customer_model->get_customer_by_id($id);
            if (!$customer) {
                show_404();
            }
            $data['customer'] = $customer;
        }

        $this->load->view('layout/header');
        $this->load->view('customers/form', $data);
        $this->load->view('layout/footer');
    }

    // Save new or updated customer (form submission)
    public function save()
    {
        $id = $this->input->post('id');

        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|callback_email_check['.$id.']');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('property_type', 'Property Type', 'required|in_list[residential,commercial,industrial]');

        if ($this->form_validation->run() == FALSE) {
            $this->form($id);
            return;
        }

        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name'  => $this->input->post('last_name'),
            'email'      => $this->input->post('email'),
            'phone'      => $this->input->post('phone'),
            'address'    => $this->input->post('address'),
            'city'       => $this->input->post('city'),
            'state'      => $this->input->post('state'),
            'postal_code'=> $this->input->post('postal_code'),
            'property_type' => $this->input->post('property_type'),
            'roof_type'  => $this->input->post('roof_type')
        );

        if ($id) {
            // Update
            $this->Customer_model->update_customer($id, $data);
            $this->session->set_flashdata('success', 'Customer updated successfully.');
        } else {
            // Insert new
            $this->Customer_model->insert_customer($data);
            $this->session->set_flashdata('success', 'Customer added successfully.');
        }

        redirect('customers');
    }

    // Custom callback to validate unique email on update or insert
    public function email_check($email, $id)
    {
        $exists = $this->Customer_model->email_exists($email, $id);
        if ($exists) {
            $this->form_validation->set_message('email_check', 'The Email is already in use.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    // Delete customer by id
    public function delete($id = NULL)
    {
        if (!$id) {
            show_404();
        }

        $this->Customer_model->delete_customer($id);
        $this->session->set_flashdata('success', 'Customer deleted successfully.');
        redirect('customers');
    }
}
