<?php

class MExperience extends CI_Model {
    private $_table = "experiences";

    private function queryDataTable($search, $start, $length) {
        if ($search["value"] != "") {
            $this->db->or_like([
                "name"		=> $search["value"]
            ]);
        }
    
        $this->db->order_by("id asc");
        $this->db->limit($length, $start);
        $experience = $this->db->get($this->_table);
        return $experience;
    }
    
    public function getDataTable($search, $start, $length) {
        $experience = $this->querydatatable($search, $start, $length)->result();
        return $experience;
    }

    public function countTotal(){
        return $this->db->count_all($this->_table);
    }
    
    public function countFiltered($search, $start, $length){
        $experience = $this->querydatatable($search, $start, $length);
        return $experience->num_rows();
    }

    public function tampilData() {
        return $this->db->get('experiences');
    }

    public function fungsiTambah($data) {
        $this->db->insert('experiences', $data);
    }

    public function halamanUpdate($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function fungsiUpdate($id, $data) {
        $this->db->where('id', $id);
		$this->db->update('experiences', $data);
    }

    public function fungsiDelete($id) {
		$this->db->where('id', $id);
		$this->db->delete('experiences');
	}
}
?>