<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CEducation extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (empty($this->session->userdata('username'))) {
            redirect(base_url('CAuth'));
        }
    }
    
    public function index() {
        $this->load->view('VHeader');
        $this->load->view('VSidebar');
        $this->load->view('cv/VEducation');
        $this->load->view('VFooter');
    }

    public function dataTable() {
        $search = $this->input->post("search");
        $draw  = intval($this->input->post("draw"));
        $start  = intval($this->input->post("start"));
        $length  = intval($this->input->post("length"));
        $educations = $this->meducation->getdatatable($search, $start, $length);
        $no = $start + 1;
    
        foreach ($educations as $i => $education) {
            $education->no = $no++;
        }
        
        $countAll = $this->meducation->countTotal();
        $countFiltered = $this->meducation->countFiltered($search, $start, $length);
    
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode([
                    "draw"				=> $draw,
                    "recordsTotal"		=> $countAll,
                    "recordsFiltered"	=> $countFiltered,
                    "data"				=> $educations
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
            redirect(base_url('cv/CEducation'));
        }

        $this->db->trans_start();
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $start_date = $this->input->post('start_date');
        $graduated_date = $this->input->post('graduated_date');
        $description = $this->input->post('description');
		
        $ArrInsert = array(
            'id' => $id,
            'name' => $name,
            'start_date' => $start_date,
            'graduated_date' => $graduated_date,
            'description' => $description
        );
        $this->db->insert('educations', $ArrInsert);
        $this->db->trans_complete();

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong>Data berhasil disimpan</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('cv/CEducation'));
	}

    public function halamanUpdate($id) {
        $where = array('id' => $id);
        $data['educations'] = $this->meducation->halamanUpdate($where, 'educations')->result();
        $this->load->view('VHeader');
        $this->load->view('VSidebar');
        $this->load->view('cv/VUpdateEducation', $data);
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
            redirect(base_url('cv/CEducation'));
        }
        
        $this->db->trans_start();
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $start_date = $this->input->post('start_date');
        $graduated_date = $this->input->post('graduated_date');
        $description = $this->input->post('description');

        $ArrUpdate = array(
            'id' => $id,
            'name' => $name,
            'start_date' => $start_date,
            'graduated_date' => $graduated_date,
            'description' => $description
        );
        $this->db->where('id', $id);
        $this->db->update('educations', $ArrUpdate);
        $this->db->trans_complete();

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong>Data berhasil diubah</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('cv/CEducation'));
	}

    public function fungsiDelete($id) {
        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->delete('educations');
        $this->db->trans_complete();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong>Data berhasil dihapus</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('cv/CEducation'));
    }
}
?>