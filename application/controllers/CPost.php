<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CPost extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (empty($this->session->userdata('username'))) {
            redirect(base_url('CAuth'));
        }
    }

    public function index() {
        $this->load->view('VHeader');
        $this->load->view('VSidebar');
        $this->load->view('VPost');
        $this->load->view('VFooter');
    }
    
}

?>