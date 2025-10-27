<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // Load required models
        $this->load->model('Consultation_model');
        $this->load->model('Customer_model');
        $this->load->model('Lead_model');
        $this->load->model('Installation_model');
        $this->load->library('session');
        $this->load->helper('url');

        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    // Dashboard landing page
    public function index()
    {
        // Fetch summary statistics or recent data
        $data = array();

        $data['total_customers'] = $this->Customer_model->count_all_customers();
        $data['total_consultations'] = $this->Consultation_model->count_all_consultations();
        $data['pending_consultations'] = $this->Consultation_model->count_consultations_by_status('pending');
        $data['completed_consultations'] = $this->Consultation_model->count_consultations_by_status('completed');
        $data['total_leads'] = $this->db->count_all('leads');
        $data['new_leads'] = $this->Lead_model->count_leads_by_status('new');
        $data['installations_in_progress'] = $this->Installation_model->count_installations_by_status('in_progress');

        // Add additional dashboard data as needed

        $this->load->view('layout/header');
        $this->load->view('dashboard/index', $data);
        $this->load->view('layout/footer');
    }

    public function profile()
{
    // Assuming user data is stored in session after login
    $user_id = $this->session->userdata('user_id');
    // Load your User_model (or whatever model holds user data)
    $this->load->model('User_model');
    $user = $this->User_model->get_user_by_id($user_id);

    $data['user'] = $user;
    $data['title'] = 'Profile';

    // Loads the profile view
    $this->load->view('layout/header', $data);
    $this->load->view('dashboard/profile', $data);
    $this->load->view('layout/footer', $data);
}

}
