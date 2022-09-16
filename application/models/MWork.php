<?php 

class MWork extends CI_Model {

    public function rules() {
        return [
            [],
        ];
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
        $this->db->join("users u", "u.id = w.created_by","left");
        $this->db->join("users u2", "u2.id = w.updated_by","left");
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