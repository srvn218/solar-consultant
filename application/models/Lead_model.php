<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead_model extends CI_Model
{
    // Fetch all leads (ordered)
    public function get_all() {
        return $this->db->order_by('id','desc')->get('leads')->result_array();
    }

    // Fetch a single lead by ID
    public function get($id) {
        return $this->db->get_where('leads', ['id' => (int)$id])->row_array();
    }

    // Insert a new lead
    public function insert($data) {
        $this->db->insert('leads', $data);
        return $this->db->insert_id();
    }

    // Update lead by ID
    public function update($id, $data) {
        $this->db->where('id', (int)$id);
        $this->db->update('leads', $data);
        return $this->db->affected_rows();
    }

    // Delete lead by ID
    public function delete($id) {
        $this->db->where('id', (int)$id);
        $this->db->delete('leads');
        return $this->db->affected_rows();
    }

    // Get only new leads count (optional)
    public function count_new() {
        return $this->db->where('status','new')->count_all_results('leads');
    }
    
    public function count_leads_by_status($status) {
    return $this->db->where('status', $status)->count_all_results('leads');
}

}
