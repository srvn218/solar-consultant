<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Quote_model');
        $this->load->model('Consultation_model');
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'form'));

        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    // List all quotes
    public function index()
    {
        $data['quotes'] = $this->Quote_model->get_all_quotes();

        $this->load->view('layout/header');
        $this->load->view('quotes/list', $data);
        $this->load->view('layout/footer');
    }

    // View quote details
    public function view($id = NULL)
    {
        if (!$id || !($quote = $this->Quote_model->get_quote_by_id($id))) {
            show_404();
        }

        $data['quote'] = $quote;
        $data['consultation'] = $this->Consultation_model->get_consultation_by_id($quote->consultation_id);

        $this->load->view('layout/header');
        $this->load->view('quotes/view', $data);
        $this->load->view('layout/footer');
    }

    // Show form for create/edit quote
    public function form($id = NULL)
    {
        $data = array();
        $data['consultations'] = $this->Consultation_model->get_all_consultations();

        if ($id) {
            $quote = $this->Quote_model->get_quote_by_id($id);
            if (!$quote) {
                show_404();
            }
            $data['quote'] = $quote;
        }

        $this->load->view('layout/header');
        $this->load->view('quotes/form', $data);
        $this->load->view('layout/footer');
    }

    // Save new or update quote
    public function save()
    {
        $id = $this->input->post('id');

        $this->form_validation->set_rules('consultation_id', 'Consultation', 'required|integer');
        $this->form_validation->set_rules('quote_number', 'Quote Number', 'required|trim|callback_quote_number_check['.$id.']');
        $this->form_validation->set_rules('system_capacity', 'System Capacity (kW)', 'required|integer');
        $this->form_validation->set_rules('panel_type', 'Panel Type', 'trim|required');
        $this->form_validation->set_rules('inverter_type', 'Inverter Type', 'trim|required');
        $this->form_validation->set_rules('total_cost', 'Total Cost', 'required|decimal');
        $this->form_validation->set_rules('discount_percent', 'Discount Percentage', 'decimal');
        $this->form_validation->set_rules('final_cost', 'Final Cost', 'required|decimal');
        $this->form_validation->set_rules('warranty_years', 'Warranty (years)', 'integer');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[draft,sent,accepted,rejected]');
    $this->form_validation->set_rules('valid_until', 'Valid Until Date', 'required|callback_validate_date_format');
    
    // 2. Update the message to match the new rule name
    $this->form_validation->set_message('validate_date_format', 'The %s field is not a valid date.');   if ($this->form_validation->run() == FALSE) {
            $this->form($id);
            return;
        }

        $data = array(
            'consultation_id' => $this->input->post('consultation_id'),
            'quote_number' => $this->input->post('quote_number'),
            'system_capacity' => $this->input->post('system_capacity'),
            'panel_type' => $this->input->post('panel_type'),
            'inverter_type' => $this->input->post('inverter_type'),
            'total_cost' => $this->input->post('total_cost'),
            'discount_percent' => $this->input->post('discount_percent') ?: 0,
            'final_cost' => $this->input->post('final_cost'),
            'warranty_years' => $this->input->post('warranty_years') ?: 25,
            'status' => $this->input->post('status'),
            'valid_until' => $this->input->post('valid_until')
        );

        if ($id) {
            $this->Quote_model->update_quote($id, $data);
            $this->session->set_flashdata('success', 'Quote updated successfully.');
        } else {
            $this->Quote_model->insert_quote($data);
            $this->session->set_flashdata('success', 'Quote created successfully.');
        }

        redirect('quotes');
    }

    // Custom callback for unique quote_number check
    public function quote_number_check($quote_number, $id)
    {
        $exists = $this->Quote_model->quote_number_exists($quote_number, $id);
        if ($exists) {
            $this->form_validation->set_message('quote_number_check', 'The Quote Number is already in use.');
            return FALSE;
        }
        return TRUE;
    }
public function validate_date_format($date_string)
{
    if (empty($date_string)) {
        return TRUE; // Let the 'required' rule handle empty fields
    }
    
    // The format from the HTML date picker
    $format = 'Y-m-d'; 
    
    $d = DateTime::createFromFormat($format, $date_string);
    
    // Check if it's a real, valid date in the correct format
    return $d && $d->format($format) === $date_string;
}
    // Delete a quote
    public function delete($id = NULL)
    {
        if (!$id) {
            show_404();
        }

        $this->Quote_model->delete_quote($id);
        $this->session->set_flashdata('success', 'Quote deleted successfully.');
        redirect('quotes');
    }
}
