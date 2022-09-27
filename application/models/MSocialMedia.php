<?php

class MSocialMedia extends CI_Model {
    private $_table = "social_medias";

    private function queryDataTable($search, $start, $length) {
        if ($search["value"] != "") {
            $this->db->or_like([
                "name"		=> $search["value"]
            ]);
        }
    
        $this->db->order_by("id asc");
        $this->db->limit($length, $start);
        $socialMedia = $this->db->get($this->_table);
        return $socialMedia;
    }
    
    public function getDataTable($search, $start, $length) {
        $socialMedia = $this->querydatatable($search, $start, $length)->result();
        return $socialMedia;
    }

    public function countTotal(){
        return $this->db->count_all($this->_table);
    }
    
    public function countFiltered($search, $start, $length){
        $socialMedia = $this->querydatatable($search, $start, $length);
        return $socialMedia->num_rows();
    }

    public function tampilData() {
        return $this->db->get('social_medias');
    }

    public function fungsiTambah($data) {
        $this->db->insert('social_medias', $data);
    }

    public function halamanUpdate($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function fungsiUpdate($id, $data) {
        $this->db->where('id', $id);
		$this->db->update('social_medias', $data);
    }

    public function fungsiDelete($id) {
		$this->db->where('id', $id);
		$this->db->delete('social_medias');
	}
}
?>