<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CCategory extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (empty($this->session->userdata('username'))) {
            redirect(base_url('CAuth'));
        }
    }

    public function index() {
        $data['categories'] = $this->mcategory->tampilData()->result();

        $this->load->view('VHeader');
        $this->load->view('VSidebar');
        $this->load->view('VCategory', $data);
        $this->load->view('VFooter');
    }

    public function fungsiTambah() {
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		
        $ArrInsert = array(
			'id' => $id,
			'name' => $name
		);

		$this->db->insert('categories', $ArrInsert);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Data berhasil disimpan</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>');
		redirect(base_url('CCategory'));
	}

    public function halamanUpdate($id) {
        $where = array('id' => $id);
        $data['categories'] = $this->mcategory->halamanUpdate($where, 'categories')->result();
        $this->load->view('VHeader');
        $this->load->view('VSidebar');
        $this->load->view('VUpdateCategory', $data);
        $this->load->view('VFooter');
    }

    public function fungsiUpdate() {
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		
		$ArrUpdate = array(
			'id' => $id,
			'name' => $name,
		);

		$this->db->where('id', $id);
		$this->db->update('categories', $ArrUpdate);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Data berhasil diubah</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>');
		redirect(base_url('CCategory'));
	}

    public function fungsiDelete($id) {
        $this->db->where('id', $id);
        $this->db->delete('categories');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('CCategory'));
    }
    
}

?>