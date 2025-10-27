<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    protected $table = 'users';

    public function __construct()
    {
        parent::__construct();
    }

    // Get user by email (used for login)
    public function get_user_by_email($email)
    {
        $query = $this->db->get_where($this->table, ['email' => $email]);
        return $query->row();
    }

    // Get user by ID
    public function get_user_by_id($id)
    {
        $query = $this->db->get_where($this->table, ['id' => $id]);
        return $query->row();
    }

    // Insert new user
    public function insert_user($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // Update user by ID
    public function update_user($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // Delete user by ID
    public function delete_user($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    // Get all users
    public function get_all_users()
    {
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    // Get all consultants (role = consultant)
    public function get_consultants()
    {
        $this->db->where('role', 'consultant');
        $this->db->where('status', 'active');
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get($this->table);
        return $query->result();
    }
}
