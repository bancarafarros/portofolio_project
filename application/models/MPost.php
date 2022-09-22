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

    private function queryDataTable($search, $start, $length) {
        $this->db->select([
            "p.id",
            "title",
            "content",
            "featured_image",
            "created_at",
            "u.name as created_by",
            "u2.name as updated_by",
            "updated_at",
        ]);
    
        if ($search["value"] != "") {
            $this->db->or_like([
                "title"		=> $search["value"],
                "content"	=> $search["value"]
            ]);
        }
    
        $this->db->order_by("id asc");
        $this->db->join("users u", "u.id = p.created_by", "left");
        $this->db->join("users u2", "u2.id = p.updated_by", "left");
        $this->db->limit($length, $start);
        $posts = $this->db->get($this->_table . " p");
        return $posts;
    }
    
    public function getDataTable($search, $start, $length) {
        $posts = $this->querydatatable($search, $start, $length)->result();
        return $posts;
    }

    public function countTotal(){
        return $this->db->count_all($this->_table);
    }
    
    public function countFiltered($search, $start, $length){
        $posts = $this->querydatatable($search, $start, $length);
        return $posts->num_rows();
    }

    public function tampilData() {
        $this->db->select([
            "p.id",
            "p.title",
            "p.content",
            "p.featured_image",
            "p.created_at",
            "p.updated_at",
            "u.name as created_by",
            "u2.name as updated_by"
        ]);
        $this->db->join("users u", "u.id = p.created_by","left");
        $this->db->join("users u2", "u2.id = p.updated_by","left");
        $tampilData = $this->db->get("posts p");
        return $tampilData;

        // return $this->db->get($this->_table)->result();
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