<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSocialMedia extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (empty($this->session->userdata('username'))) {
            redirect(base_url('CAuth'));
        }
    }
    
    public function index() {
        $this->load->view('VHeader');
        $this->load->view('VSidebar');
        $this->load->view('cv/VSocialMedia');
        $this->load->view('VFooter');
    }

    public function dataTable() {
        $search = $this->input->post("search");
        $draw  = intval($this->input->post("draw"));
        $start  = intval($this->input->post("start"));
        $length  = intval($this->input->post("length"));
        $socialMedias = $this->msocialmedia->getdatatable($search, $start, $length);
        $no = $start + 1;
    
        foreach ($socialMedias as $i => $socialMedia) {
            $socialMedia->no = $no++;
        }
        
        $countAll = $this->msocialmedia->countTotal();
        $countFiltered = $this->msocialmedia->countFiltered($search, $start, $length);
    
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode([
                    "draw"				=> $draw,
                    "recordsTotal"		=> $countAll,
                    "recordsFiltered"	=> $countFiltered,
                    "data"				=> $socialMedias
        ]));
    }

    public function fungsiTambah() {
        $this->form_validation->set_rules('name', 'Name', 'required|alpha',
		array('required' => '<strong>%s harus diisi</strong>', 'alpha' => '<strong>%s harus diisi dengan huruf saja</strong>'));

        $this->form_validation->set_rules('url', 'URL', 'required',
		array('required' => '<strong>%s harus diisi</strong>'));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text">' . form_error('name') . '</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            $this->session->set_flashdata('message',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text">' . form_error('url') . '</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('cv/CSocialMedia'));
        }
        
        $this->db->trans_start();
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $url = $this->input->post('url');
        
        $config['upload_path'] = './assets/img/icons';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size']             = 100000000000000000000100000000000000000000;
        $config['max_width']            = 100000000000000000000100000000000000000000;
        $config['max_height']           = 100000000000000000000100000000000000000000;
        $this->upload->initialize($config);
        $file = $this->upload->do_upload('icon');
        $data = $this->upload->data();

        if ($file) {
            $data = $this->upload->data();
            $icon = $data['file_name'];
        } else {
            $icon = $this->input->post('icon');
        }
		
        $ArrInsert = array(
            'id' => $id,
            'name' => $name,
            'url' => $url,
            'icon' => $icon
        );
        $this->db->trans_complete();
            
        $this->db->insert('social_medias', $ArrInsert);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong>Data berhasil disimpan</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('cv/CSocialMedia'));
	}

    public function halamanUpdate($id) {
        $where = array('id' => $id);
        $data['social_medias'] = $this->msocialmedia->halamanUpdate($where, 'social_medias')->result();
        $this->load->view('VHeader');
        $this->load->view('VSidebar');
        $this->load->view('cv/VUpdateSocialMedia', $data);
        $this->load->view('VFooter');
    }

    public function fungsiUpdate() {
        $this->form_validation->set_rules('name', 'Name', 'required|alpha',
		array('required' => '<strong>%s harus diisi</strong>', 'alpha' => '<strong>%s harus diisi dengan huruf saja</strong>'));

        $this->form_validation->set_rules('url', 'URL', 'required',
		array('required' => '<strong>%s harus diisi</strong>'));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text">' . form_error('name') . '</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            $this->session->set_flashdata('message',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text">' . form_error('url') . '</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('cv/CSocialMedia'));
        }
        
        $this->db->trans_start();
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $url = $this->input->post('url');
        
        $config['upload_path'] = './assets/img/icons';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size']             = 100000000000000000000100000000000000000000;
        $config['max_width']            = 100000000000000000000100000000000000000000;
        $config['max_height']           = 100000000000000000000100000000000000000000;
        $this->upload->initialize($config);
        $file = $this->upload->do_upload('icon');
        $data = $this->upload->data();

        if ($file) {
            $data = $this->upload->data();
            $icon = $data['file_name'];
        } else {
            $icon = $this->input->post('icon');
        }

        $ArrUpdate = array(
            'id' => $id,
            'name' => $name,
            'url' => $url,
            'icon' => $icon
        );
        $this->db->trans_complete();
        $this->db->where('id', $id);
        $this->db->update('social_medias', $ArrUpdate);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong>Data berhasil diubah</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('cv/CSocialMedia'));
	}

    public function fungsiDelete($id) {
        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->delete('social_medias');
        $this->db->trans_complete();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong>Data berhasil dihapus</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('cv/CSocialMedia'));
    }
}
?>