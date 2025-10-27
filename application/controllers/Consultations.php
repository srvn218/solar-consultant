<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultations extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Consultation_model');
        $this->load->model('Customer_model');
        $this->load->model('User_model');  // For consultants
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'form'));
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    // List all consultations with pagination and filters
    public function index()
    {
        $data['consultations'] = $this->Consultation_model->get_all_consultations();

        $this->load->view('layout/header');
        $this->load->view('consultations/list', $data);
        $this->load->view('layout/footer');
    }

    // View a single consultation details
    public function view($id = NULL)
    {
        if (!$id || !($consultation = $this->Consultation_model->get_consultation_by_id($id))) {
            show_404();
        }

        $data['consultation'] = $consultation;
        $data['customer'] = $this->Customer_model->get_customer_by_id($consultation->customer_id);
        if ($consultation->consultant_id) {
            $data['consultant'] = $this->User_model->get_user_by_id($consultation->consultant_id);
        } else {
            $data['consultant'] = NULL;
        }

        $this->load->view('layout/header');
        $this->load->view('consultations/view', $data);
        $this->load->view('layout/footer');
    }

    // Show the form to create or edit consultation
    public function form($id = NULL)
    {
        $data = array();
        $data['customers'] = $this->Customer_model->get_all_customers();
        $data['consultants'] = $this->User_model->get_consultants();

        if ($id) {
            $consultation = $this->Consultation_model->get_consultation_by_id($id);
            if (!$consultation) {
                show_404();
            }
            $data['consultation'] = $consultation;
        }

        $this->load->view('layout/header');
        $this->load->view('consultations/form', $data);
        $this->load->view('layout/footer');
    }

    // Handle form submission for create or update
    public function save()
    {
        $this->form_validation->set_rules('customer_id', 'Customer', 'required|integer');
        $this->form_validation->set_rules('consultant_id', 'Consultant', 'integer');
        $this->form_validation->set_rules('consultation_date', 'Consultation Date', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[pending,completed,cancelled]');
        $this->form_validation->set_rules('recommended_capacity', 'Recommended Capacity (kW)', 'integer');
        $this->form_validation->set_rules('estimated_cost', 'Estimated Cost', 'decimal');
        $this->form_validation->set_rules('estimated_savings_yearly', 'Estimated Yearly Savings', 'decimal');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload form with errors
            $id = $this->input->post('id');
            $this->form($id);
            return;
        }

        $data = array(
            'customer_id' => $this->input->post('customer_id'),
            'consultant_id' => $this->input->post('consultant_id') ?: NULL,
            'consultation_date' => $this->input->post('consultation_date'),
            'status' => $this->input->post('status'),
            'notes' => $this->input->post('notes'),
            'recommended_capacity' => $this->input->post('recommended_capacity'),
            'estimated_cost' => $this->input->post('estimated_cost'),
            'estimated_savings_yearly' => $this->input->post('estimated_savings_yearly')
        );

        $id = $this->input->post('id');

        if ($id) {
            // Update existing
            $this->Consultation_model->update_consultation($id, $data);
            $this->session->set_flashdata('success', 'Consultation updated successfully.');
        } else {
            // Insert new
            $this->Consultation_model->insert_consultation($data);
            $this->session->set_flashdata('success', 'Consultation created successfully.');
        }

        redirect('consultations');
    }

    // Delete a consultation by id
    public function delete($id = NULL)
    {
        if (!$id) {
            show_404();
        }
        $this->Consultation_model->delete_consultation($id);
        $this->session->set_flashdata('success', 'Consultation deleted successfully.');
        redirect('consultations');
    }
}
