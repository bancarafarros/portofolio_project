<?php

class MPost extends CI_Model {

    private $_table = "posts";

    public $id;
    public $title;
    public $content;
    public $featured_image;
    public $created_at;
    public $created_by;
    public $updated_at;
    public $updated_by;

    public function tampilData() {
        return $this->db->get($this->_table)->result();
    }

    public function fungsiTambah($data) {
        $this->db->insert($this->_table, $data);
    }

    public function halamanUpdate($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function fungsiUpdate($id, $data) {
        $this->db->where('id', $id);
		$this->db->update($this->_table, $data);
    }

    function fungsiDelete($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->_table);
	}

}

?>