<?php 

class MWork extends CI_Model {

    public function rules() {
        return [
            [],
        ];
    }

    public function tampilData() {
        return $this->db->get('works');
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