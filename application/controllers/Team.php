<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Team extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Team_model');
        $this->load->helper(['form','url']);
    }
    public function index() {
        $data['team'] = $this->Team_model->get_all();
        $this->load->view('layout/header');
        $this->load->view('team/list', $data);
        $this->load->view('layout/footer');
    }
    public function add() {
        if ($this->input->post()) {
            $config['upload_path'] = './uploads/team/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);
            $img = '';
            if (!empty($_FILES['image']['name'])) {
                if ($this->upload->do_upload('image'))
                    $img = 'uploads/team/' . $this->upload->data('file_name');
            }
            $data = [
                'name' => $this->input->post('name',true),
                'qualification' => $this->input->post('qualification',true),
                'age' => $this->input->post('age',true),
                'role' => $this->input->post('role',true),
                'image' => $img
            ];
            $this->Team_model->insert($data);
            redirect('team');
        }
        $this->load->view('layout/header');
        $this->load->view('team/add');
        $this->load->view('layout/footer');
    }
    public function edit($id) {
        $member = $this->Team_model->get($id);
        if (!$member) show_404();
        if ($this->input->post()) {
            $config['upload_path'] = './uploads/team/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);
            $img = $member['image'];
            if (!empty($_FILES['image']['name'])) {
                if ($this->upload->do_upload('image'))
                    $img = 'uploads/team/' . $this->upload->data('file_name');
            }
            $data = [
                'name' => $this->input->post('name',true),
                'qualification' => $this->input->post('qualification',true),
                'age' => $this->input->post('age',true),
                'role' => $this->input->post('role',true),
                'image' => $img
            ];
            $this->Team_model->update($id, $data);
            redirect('team');
        }
        $data['member'] = $member;
        $this->load->view('layout/header');
        $this->load->view('team/edit', $data);
        $this->load->view('layout/footer');
    }
    public function delete($id) {
        $this->Team_model->delete($id);
        redirect('team');
    }
}
