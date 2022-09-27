<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CExperience extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (empty($this->session->userdata('username'))) {
            redirect(base_url('CAuth'));
        }
    }
    
    public function index() {
        $this->load->view('VHeader');
        $this->load->view('VSidebar');
        $this->load->view('cv/VExperience');
        $this->load->view('VFooter');
    }

    public function dataTable() {
        $search = $this->input->post("search");
        $draw  = intval($this->input->post("draw"));
        $start  = intval($this->input->post("start"));
        $length  = intval($this->input->post("length"));
        $experiences = $this->mexperience->getdatatable($search, $start, $length);
        $no = $start + 1;
    
        foreach ($experiences as $i => $experience) {
            $experience->no = $no++;
        }
        
        $countAll = $this->mexperience->countTotal();
        $countFiltered = $this->mexperience->countFiltered($search, $start, $length);
    
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode([
                    "draw"				=> $draw,
                    "recordsTotal"		=> $countAll,
                    "recordsFiltered"	=> $countFiltered,
                    "data"				=> $experiences
        ]));
    }

    public function fungsiTambah() {
        $this->form_validation->set_rules('name', 'Name', 'required|alpha',
		array('required' => '<strong>%s harus diisi</strong>', 'alpha' => '<strong>%s harus diisi dengan huruf saja</strong>'));

        $this->form_validation->set_rules('start_date', 'Start Date', 'required',
		array('required' => '<strong>%s harus diisi</strong>'));

        $this->form_validation->set_rules('description', 'Description', 'required',
		array('required' => '<strong>%s harus diisi</strong>'));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text">' . form_error('name') . '</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            $this->session->set_flashdata('message',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text">' . form_error('start_date') . '</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            $this->session->set_flashdata('message',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text">' . form_error('description') . '</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('cv/CExperience'));
        }

        $this->db->trans_start();
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $start_date = $this->input->post('start_date');
        $resignated_date = $this->input->post('resignated_date');
        $description = $this->input->post('description');
		
        $ArrInsert = array(
            'id' => $id,
            'name' => $name,
            'start_date' => $start_date,
            'resignated_date' => $resignated_date,
            'description' => $description
        );
        $this->db->insert('experiences', $ArrInsert);
        $this->db->trans_complete();

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong>Data berhasil disimpan</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('cv/CExperience'));
	}

    public function halamanUpdate($id) {
        $where = array('id' => $id);
        $data['experiences'] = $this->mexperience->halamanUpdate($where, 'experiences')->result();
        $this->load->view('VHeader');
        $this->load->view('VSidebar');
        $this->load->view('cv/VUpdateExperience', $data);
        $this->load->view('VFooter');
    }

    public function fungsiUpdate() {
        $this->form_validation->set_rules('name', 'Name', 'required|alpha',
		array('required' => '<strong>%s harus diisi</strong>', 'alpha' => '<strong>%s harus diisi dengan huruf saja</strong>'));

        $this->form_validation->set_rules('start_date', 'Start Date', 'required',
		array('required' => '<strong>%s harus diisi</strong>'));

        $this->form_validation->set_rules('description', 'Description', 'required',
		array('required' => '<strong>%s harus diisi</strong>'));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text">' . form_error('name') . '</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            $this->session->set_flashdata('message',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text">' . form_error('start_date') . '</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            $this->session->set_flashdata('message',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text">' . form_error('description') . '</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('cv/CExperience'));
        }
        
        $this->db->trans_start();
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $start_date = $this->input->post('start_date');
        $resignated_date = $this->input->post('resignated_date');
        $description = $this->input->post('description');

        $ArrUpdate = array(
            'id' => $id,
            'name' => $name,
            'start_date' => $start_date,
            'resignated_date' => $resignated_date,
            'description' => $description
        );
        $this->db->where('id', $id);
        $this->db->update('experiences', $ArrUpdate);
        $this->db->trans_complete();

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong>Data berhasil diubah</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('cv/CExperience'));
	}

    public function fungsiDelete($id) {
        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->delete('experiences');
        $this->db->trans_complete();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong>Data berhasil dihapus</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('cv/CExperience'));
    }
}
?>