<?php 

class MWork extends CI_Model {
    public function tampilData() {
        return $this->db->get('works');
    }

    public function detailKategori($id) {
        $result = $this->db->where('id', $id)->get('works');

        if ($result->num_rows() > 0) {
            return $result->result();
        
        } else {
            return false;
        }
    }

    function fungsiDelete($id) {
		$this->db->where('id', $id);
		$this->db->delete('works');
	}

}


?>