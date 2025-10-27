<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Installations extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Installation_model');
        $this->load->model('Quote_model');
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'form'));

        // Ensure user authentication
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    // List all installations
    public function index()
    {
        $data['installations'] = $this->Installation_model->get_all_installations();

        $this->load->view('layout/header');
        $this->load->view('installations/list', $data);
        $this->load->view('layout/footer');
    }

    // View detailed installation info
    public function view($id = NULL)
    {
        if (!$id || !($installation = $this->Installation_model->get_installation_by_id($id))) {
            show_404();
        }

        $data['installation'] = $installation;
        $data['quote'] = $this->Quote_model->get_quote_by_id($installation->quote_id);

        $this->load->view('layout/header');
        $this->load->view('installations/view', $data);
        $this->load->view('layout/footer');
    }

    // Show form for creating/editing installation
    public function form($id = NULL)
    {
        $data = array();
        $data['quotes'] = $this->Quote_model->get_all_quotes();

        if ($id) {
            $installation = $this->Installation_model->get_installation_by_id($id);
            if (!$installation) {
                show_404();
            }
            $data['installation'] = $installation;
        }

        $this->load->view('layout/header');
        $this->load->view('installations/form', $data);
        $this->load->view('layout/footer');
    }

    // Handle save (create/update)
    public function save()
    {
        $id = $this->input->post('id');

        $this->form_validation->set_rules('quote_id', 'Quote', 'required|integer');
        $this->form_validation->set_rules('installation_date', 'Installation Date', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[planned,in_progress,completed,on_hold]');
        $this->form_validation->set_rules('system_capacity', 'System Capacity', 'required|integer');
        $this->form_validation->set_rules('installation_cost', 'Installation Cost', 'required|decimal');

        if ($this->form_validation->run() == FALSE) {
            $this->form($id);
            return;
        }

        $data = array(
            'quote_id' => $this->input->post('quote_id'),
            'installation_date' => $this->input->post('installation_date'),
            'completion_date' => $this->input->post('completion_date'),
            'status' => $this->input->post('status'),
            'system_capacity' => $this->input->post('system_capacity'),
            'installation_cost' => $this->input->post('installation_cost'),
            'actual_cost' => $this->input->post('actual_cost'),
            'notes' => $this->input->post('notes')
        );

        if ($id) {
            $this->Installation_model->update_installation($id, $data);
            $this->session->set_flashdata('success', 'Installation updated successfully.');
        } else {
            $this->Installation_model->insert_installation($data);
            $this->session->set_flashdata('success', 'Installation created successfully.');
        }

        redirect('installations');
    }

    // Delete an installation
    public function delete($id = NULL)
    {
        if (!$id) {
            show_404();
        }

        $this->Installation_model->delete_installation($id);
        $this->session->set_flashdata('success', 'Installation deleted successfully.');
        redirect('installations');
    }
}
