<?php

class MAuth extends CI_Model {
    
    public function cekLogin() {
        $username = set_value('username');
        $password = set_value('password');

        $result = $this->db->where('username', $username)
                            ->where('password', hash('sha256', $password))
                            ->limit(1)
                            ->get('users');

        if ($result->num_rows() > 0) {
            return $result->row();
        
        } else {
            return FALSE;
        }
    }    
}

?>