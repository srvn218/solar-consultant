<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

    protected $table = 'customers';

    public function __construct()
    {
        parent::__construct();
    }

    // Get all customers
    public function get_all_customers()
    {
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    // Get customer by id
    public function get_customer_by_id($id)
    {
        $query = $this->db->get_where($this->table, ['id' => $id]);
        return $query->row();
    }

    // Insert new customer
    public function insert_customer($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // Update existing customer
    public function update_customer($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // Delete customer
    public function delete_customer($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    // Check if email exists excluding optional customer id (for unique email validation)
    public function email_exists($email, $exclude_id = NULL)
    {
        $this->db->where('email', $email);
        if ($exclude_id) {
            $this->db->where('id !=', $exclude_id);
        }
        $query = $this->db->get($this->table);
        return $query->num_rows() > 0;
    }

    // Count all customers (used in dashboard)
    public function count_all_customers()
    {
        return $this->db->count_all($this->table);
    }
}
