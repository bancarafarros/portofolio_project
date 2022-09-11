<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CWork extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (empty($this->session->userdata('username'))) {
            redirect(base_url('CAuth'));
        }
    }

    public function index() {
        $data['works'] = $this->mwork->tampilData()->result();

        $this->load->view('VHeader');
        $this->load->view('VSidebar');
        $this->load->view('VWork', $data);
        $this->load->view('VFooter');
    }
    
    public function halamanDetail($id) {
        $data['works'] = $this->mcategory->detailKategori($id);
        
        $this->load->view('/admin/VHeader');
        $this->load->view('/admin/VSidebar');
        $this->load->view('/admin/VDetailKategori', $data);
        $this->load->view('/admin/VFooter');
    }

    public function fungsiDelete($id) {
        $this->db->where('id', $id);
        $this->db->delete('works');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('CWork'));
    }

}

?>