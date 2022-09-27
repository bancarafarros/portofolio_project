<?php

class MEducation extends CI_Model {
    private $_table = "educations";

    private function queryDataTable($search, $start, $length) {
        if ($search["value"] != "") {
            $this->db->or_like([
                "name"		=> $search["value"]
            ]);
        }
    
        $this->db->order_by("id asc");
        $this->db->limit($length, $start);
        $education = $this->db->get($this->_table);
        return $education;
    }
    
    public function getDataTable($search, $start, $length) {
        $education = $this->querydatatable($search, $start, $length)->result();
        return $education;
    }

    public function countTotal(){
        return $this->db->count_all($this->_table);
    }
    
    public function countFiltered($search, $start, $length){
        $education = $this->querydatatable($search, $start, $length);
        return $education->num_rows();
    }

    public function tampilData() {
        return $this->db->get('educations');
    }

    public function fungsiTambah($data) {
        $this->db->insert('educations', $data);
    }

    public function halamanUpdate($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function fungsiUpdate($id, $data) {
        $this->db->where('id', $id);
		$this->db->update('educations', $data);
    }

    public function fungsiDelete($id) {
		$this->db->where('id', $id);
		$this->db->delete('educations');
	}
}
?>