<?php

class MCategory extends CI_Model {
    public function tampilData() {
        return $this->db->get('categories');
    }

    public function fungsiTambah($data) {
        $this->db->insert('categories', $data);
    }

    public function halamanUpdate($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function fungsiUpdate($id, $data) {
        $this->db->where('id', $id);
		$this->db->update('categories', $data);
    }

    function fungsiDelete($id) {
		$this->db->where('id', $id);
		$this->db->delete('categories');
	}
}
?>