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
        // $data['categories'] = $this->mcategory->tampilData()->result();

        $this->load->view('VHeader');
        $this->load->view('VSidebar');
        // $this->load->view('VCategory', $data);
        $this->load->view('VCategory');
        $this->load->view('VFooter');
    }

    public function dataTable() {
        $search = $this->input->post("search");
        $draw  = intval($this->input->post("draw"));
        $start  = intval($this->input->post("start"));
        $length  = intval($this->input->post("length"));
        $works = $this->mcategory->getdatatable($search, $start, $length);
        $no = $start + 1;
    
        foreach ($works as $i => $work) {
            $work->no = $no++;
        }
        
        $countAll = $this->mcategory->countTotal();
        $countFiltered = $this->mcategory->countFiltered($search, $start, $length);
    
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode([
                    "draw"				=> $draw,
                    "recordsTotal"		=> $countAll,
                    "recordsFiltered"	=> $countFiltered,
                    "data"				=> $works
        ]));
    }

    public function fungsiTambah() {
        $this->form_validation->set_rules('name', 'Name', 'required|alpha',
		array('required' => '<strong>%s harus diisi</strong>', 'alpha' => '<strong>%s harus diisi dengan huruf saja</strong>'));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text">' . form_error('name') . '</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('CCategory'));
        
        } else {
            $id = $this->input->post('id');
            $name = $this->input->post('name');
		
            $ArrInsert = array(
                'id' => $id,
                'name' => $name
            );
            
            $this->db->insert('categories', $ArrInsert);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Data berhasil disimpan</strong></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('CCategory'));
        }
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
        $this->form_validation->set_rules('name', 'Name', 'required|alpha',
		array('required' => '<strong>%s harus diisi</strong>', 'alpha' => '<strong>%s harus diisi dengan huruf saja</strong>'));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text">' . form_error('name') . '</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('CCategory'));
        
        } else {
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            
            $ArrUpdate = array(
                'id' => $id,
                'name' => $name,
            );
            $this->db->where('id', $id);
            $this->db->update('categories', $ArrUpdate);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Data berhasil diubah</strong></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('CCategory'));
        }
	}

    public function fungsiDelete($id) {
        $this->db->where('id', $id);
        $this->db->delete('categories');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong>Data berhasil dihapus</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('CCategory'));
    }
}
?>