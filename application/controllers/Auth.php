<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'form'));
    }

    // Show login form
    public function login()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }

        $this->load->view('auth/login');
    }

    // Process login form submission
    public function login_post()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->User_model->get_user_by_email($email);

            if ($user && password_verify($password, $user->password)) {
                if ($user->status != 'active') {
                    $data['error'] = 'Your account is inactive. Please contact admin.';
                    $this->load->view('auth/login', $data);
                    return;
                }

                $session_data = array(
                    'user_id' => $user->id,
                    'name'    => $user->name,
                    'email'   => $user->email,
                    'role'    => $user->role,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($session_data);
                redirect('dashboard');
            } else {
                $data['error'] = 'Invalid email or password.';
                $this->load->view('auth/login', $data);
            }
        }
    }

    // Logout user
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    // Optional: Registration (if required)
    public function register()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }
        $this->load->view('auth/register');
    }

    public function register_post()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/register');
        } else {
            $data = array(
                'name'     => $this->input->post('name'),
                'email'    => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'role'     => 'consultant',
                'status'   => 'active',
                'phone'    => $this->input->post('phone')
            );

            $this->User_model->insert_user($data);
            redirect('auth/login');
        }
    }
}
