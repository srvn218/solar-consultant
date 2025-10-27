<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Installation_model extends CI_Model {

    protected $table = 'installations';

    public function __construct() {
        parent::__construct();
    }

    // Get all installations
    public function get_all_installations() {
        $this->db->order_by('installation_date', 'DESC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    // Get installation by id
    public function get_installation_by_id($id) {
        $query = $this->db->get_where($this->table, ['id' => $id]);
        return $query->row();
    }

    // Insert installation
    public function insert_installation($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // Update installation
    public function update_installation($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // Delete installation
    public function delete_installation($id) {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    // Count all installations
    public function count_all_installations() {
        return $this->db->count_all($this->table);
    }

    // Count installations by status
    public function count_installations_by_status($status) {
        $this->db->where('status', $status);
        return $this->db->count_all_results($this->table);
    }
}
