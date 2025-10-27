<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    // Get all products (array)
    public function get_all() {
        return $this->db->order_by('id', 'desc')->get('products')->result_array();
    }

    // Get one by ID (row array)
    public function get($id) {
        return $this->db->get_where('products', ['id' => (int)$id])->row_array();
    }

    // Add new product
    public function insert($data) {
        $this->db->insert('products', $data);
        return $this->db->insert_id();
    }

    // Update existing product
    public function update($id, $data) {
        $this->db->where('id', (int)$id);
        $this->db->update('products', $data);
        return $this->db->affected_rows();
    }

    // Delete product by ID
    public function delete($id) {
        $this->db->where('id', (int)$id);
        $this->db->delete('products');
        return $this->db->affected_rows();
    }
}
