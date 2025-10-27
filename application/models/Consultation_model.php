<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultation_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->table = 'consultations';
    }

    // Retrieve all consultations with optional filters (for basic demo returns all)
    public function get_all_consultations()
    {
        $this->db->order_by('consultation_date', 'DESC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    // Get consultation by ID
    public function get_consultation_by_id($id)
    {
        $query = $this->db->get_where($this->table, array('id' => $id));
        return $query->row();
    }

    // Insert new consultation
    public function insert_consultation($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // Update existing consultation
    public function update_consultation($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // Delete consultation by ID
    public function delete_consultation($id)
    {
        return $this->db->delete($this->table, array('id' => $id));
    }

    // Count consultations by status (used in dashboard)
    public function count_consultations_by_status($status)
    {
        $this->db->where('status', $status);
        return $this->db->count_all_results($this->table);
    }

    // Count all consultations (used in dashboard)
    public function count_all_consultations()
    {
        return $this->db->count_all($this->table);
    }
}
