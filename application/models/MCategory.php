<?php

class MCategory extends CI_Model {
    private $_table = "categories";

    private function queryDataTable($search, $start, $length) {
        if ($search["value"] != "") {
            $this->db->or_like([
                "name"		=> $search["value"]
            ]);
        }
    
        $this->db->order_by("id asc");
        $this->db->limit($length, $start);
        $categories = $this->db->get($this->_table);
        return $categories;
    }
    
    public function getDataTable($search, $start, $length) {
        $categories = $this->querydatatable($search, $start, $length)->result();
        return $categories;
    }

    public function countTotal(){
        return $this->db->count_all($this->_table);
    }
    
    public function countFiltered($search, $start, $length){
        $categories = $this->querydatatable($search, $start, $length);
        return $categories->num_rows();
    }

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

    public function fungsiDelete($id) {
		$this->db->where('id', $id);
		$this->db->delete('categories');
	}
}
?>