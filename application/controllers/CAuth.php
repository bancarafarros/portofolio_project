<?php

class CAuth extends CI_Controller {
    
    public function index() {
        $this->load->view('VLogin');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post(hash('sha256', 'password'));
        
        $auth = $this->MAuth->cekLogin($username, $password );

        if ($auth == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>NGA DULU XOB</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('CAuth'));
        
        } else {
            $this->session->set_userdata('username', $auth->username);
            $this->session->set_userdata('name', $auth->name);
            $this->session->set_userdata('id', $auth->id);
            // var_dump($auth);
            // die;
            redirect(base_url('CDashboard'));
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('CAuth'));
    }

}

?>