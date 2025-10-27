<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quote_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->table = 'quotes';
    }

    // Get all quotes
    public function get_all_quotes()
    {
        $this->db->select('q.*, c.consultation_date')
                 ->from($this->table . ' q')
                 ->join('consultations c', 'q.consultation_id = c.id', 'left')
                 ->order_by('q.created_at', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    // Get quote by id
    public function get_quote_by_id($id)
    {
        $query = $this->db->get_where($this->table, array('id' => $id));
        return $query->row();
    }

    // Insert new quote
    public function insert_quote($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // Update existing quote
    public function update_quote($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // Delete quote
    public function delete_quote($id)
    {
        return $this->db->delete($this->table, array('id' => $id));
    }

    // Check if quote_number exists (for uniqueness validation), excludes current id
    public function quote_number_exists($quote_number, $exclude_id = NULL)
    {
        $this->db->where('quote_number', $quote_number);
        if ($exclude_id) {
            $this->db->where('id !=', $exclude_id);
        }
        $query = $this->db->get($this->table);
        return $query->num_rows() > 0;
    }
}
