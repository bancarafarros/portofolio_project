<?php 

class MWork extends CI_Model {

    private $_table = "works";


    public function rules() {
        return [
            [],
        ];
    }

    private function queryDataTable($search, $start, $length, $filter) {
        $this->db->select([
            "w.id",
            "title",
            "year",
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
                "content"	=> $search["value"],
                "year"      => $search["value"]
            ]);
        }

        if ($filter["year"] != "") {
            $this->db->or_like([
                "year" => $filter["year"]
            ]);
        }

        if ($filter["category"] != "") {
            $this->db->or_where_in("category_id", $filter["category"]);
        }
    
        $this->db->order_by("id asc");
        $this->db->join("users u", "u.id = w.created_by", "left");
        $this->db->join("users u2", "u2.id = w.updated_by", "left");
        $this->db->join("work_categories wc", "wc.work_id = w.id", "left");
        $this->db->group_by("w.id");
        $this->db->limit($length, $start);
        $works = $this->db->get($this->_table . " w");
        return $works;
    }
    
    public function getDataTable($search, $start, $length, $filter) {
        $works = $this->querydatatable($search, $start, $length, $filter)->result();
        return $works;
    }

    public function countTotal(){
        return $this->db->count_all($this->_table);
    }
    
    public function countFiltered($search, $start, $length, $filter){
        $works = $this->querydatatable($search, $start, $length, $filter);
        return $works->num_rows();
    }

    public function tampilData() {
        $this->db->select([
            "w.id",
            "w.title",
            "w.year",
            "w.content",
            "w.featured_image",
            "w.created_at",
            "w.updated_at",
            "u.name as created_by",
            "u2.name as updated_by"
        ]);
        $this->db->join("users u", "u.id = w.created_by", "left");
        $this->db->join("users u2", "u2.id = w.updated_by", "left");
        $tampilData = $this->db->get("works w");
        return $tampilData;
    }

    public function workPreview($id) {
        $result = $this->db->where('id', $id)->get('works');

        if ($result->num_rows() > 0) {
            return $result->result();
        
        } else {
            return false;
        }
    }

    public function fungsiTambah($data) {
        $this->db->insert('works', $data);
    }

    public function halamanUpdate($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function fungsiUpdate($id, $data) {
        $this->db->where('id', $id);
		$this->db->update('works', $data);
    }

    function fungsiDelete($id) {
		$this->db->where('id', $id);
		$this->db->delete('works');
	}

}

?>