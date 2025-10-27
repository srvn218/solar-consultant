<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lead_model');
        $this->load->model('User_model');
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'form'));

        // Check user login status
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    // List all leads
    public function index()
    {
        $data['leads'] = $this->Lead_model->get_all();


        $this->load->view('layout/header');
        $this->load->view('leads/list', $data);
        $this->load->view('layout/footer');
    }

    // View Lead details
 public function view($id = NULL)
{
    if (!$id || !($lead = $this->Lead_model->get($id))) {
        show_404();
    }

    $data['lead'] = $lead;
    
    // FIX: Changed $lead->assigned_to to $lead['assigned_to']
    if (!empty($lead['assigned_to'])) { 
        // Assuming User_model->get also returns an array
        $data['assigned_user'] = $this->User_model->get($lead['assigned_to']);
    } else {
        $data['assigned_user'] = NULL;
    }

    $this->load->view('layout/header');
    $this->load->view('leads/view', $data);
    $this->load->view('layout/footer');
}

    // Show Lead form to create or edit
    public function form($id = NULL)
    {
        $data['users'] = $this->User_model->get_all_users();

        if ($id) {
            $lead = $this->Lead_model->get_lead_by_id($id);
            if (!$lead) {
                show_404();
            }
            $data['lead'] = $lead;
        }

        $this->load->view('layout/header');
        $this->load->view('leads/form', $data);
        $this->load->view('layout/footer');
    }

    // Save new or update existing lead
    public function save()
    {
        $id = $this->input->post('id');

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'trim');
        $this->form_validation->set_rules('interest_level', 'Interest Level', 'required|in_list[low,medium,high]');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[new,contacted,qualified,converted]');
        $this->form_validation->set_rules('assigned_to', 'Assigned To', 'integer');

        if ($this->form_validation->run() == FALSE) {
            $this->form($id);
            return;
        }

        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'message' => $this->input->post('message'),
            'interest_level' => $this->input->post('interest_level'),
            'status' => $this->input->post('status'),
            'assigned_to' => $this->input->post('assigned_to') ?: NULL
        );

        if ($id) {
            $this->Lead_model->update_lead($id, $data);
            $this->session->set_flashdata('success', 'Lead updated successfully.');
        } else {
            $this->Lead_model->insert_lead($data);
            $this->session->set_flashdata('success', 'Lead created successfully.');
        }

        redirect('leads');
    }

    // Delete lead
    public function delete($id) {
    $this->load->model('Lead_model');
    $this->Lead_model->delete($id);
    redirect('leads');
}
public function highlight($id) {
    $this->load->model('Lead_model');
    $lead = $this->Lead_model->get($id);
    $new = ($lead['highlighted'] ? 0 : 1);
    $this->Lead_model->update($id, ['highlighted'=>$new]);
    redirect('leads');
}
public function set_interest($id) {
    $this->load->model('Lead_model');
    $level = $this->input->post('interest_level',true);
    $this->Lead_model->update($id, ['interest_level'=>$level]);
    redirect('leads');
}

}
