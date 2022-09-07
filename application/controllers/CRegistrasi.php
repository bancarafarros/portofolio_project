<?php

class CRegistrasi extends CI_Controller {
    public function index() {
        $this->load->view('VRegistrasi');
    }

    public function registrasi() {
        $data = array (
            'id' => '',
            'username' => $this->input->post('username'),
            'name' => $this->input->post('name'),
            'password' => hash('sha256', $this->input->post('password')),
        );

        $this->db->insert('users', $data);
        redirect('CAuth');
        
    }

}

?>