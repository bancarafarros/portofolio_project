<?php

class MUsers extends CI_Model {
    public function tampil_data() {
        return $this->db->get('users');
    }
}

?>