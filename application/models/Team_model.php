<?php
class Team_model extends CI_Model {
    public function get_all() {
        return $this->db->order_by('id','desc')->get('team_members')->result_array();
    }
    public function get($id) {
        return $this->db->get_where('team_members', ['id'=>$id])->row_array();
    }
    public function insert($data) {
        $this->db->insert('team_members', $data);
        return $this->db->insert_id();
    }
    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('team_members', $data);
        return $this->db->affected_rows();
    }
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('team_members');
        return $this->db->affected_rows();
    }
    public function get_by_role($role) {
    return $this->db->get_where('team_members', ['role'=>$role])->result_array();
}

}
