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
        $data['categories'] = $this->mcategory->tampilData()->result();

        $this->load->view('VHeader');
        $this->load->view('VSidebar');
        $this->load->view('VWork', $data);
        $this->load->view('VFooter');
    }

    public function dataTable() {
        $search = $this->input->post("search");
        $draw  = intval($this->input->post("draw"));
        $start  = intval($this->input->post("start"));
        $length  = intval($this->input->post("length"));
        $works = $this->mwork->getdatatable($search, $start, $length);
        $no = $start + 1;
    
        foreach ($works as $i => $work) {
            $work->no = $no++;
        }
        
        $countAll = $this->mwork->countTotal();
        $countFiltered = $this->mwork->countFiltered($search, $start, $length);
    
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode([
                    "draw"				=> $draw,
                    "recordsTotal"		=> $countAll,
                    "recordsFiltered"	=> $countFiltered,
                    "data"				=> $works
        ]));
    }

    public function halamanPreview($id) {
        $data['works'] = $this->mwork->workPreview($id);
        
        $this->load->view('VHeader');
        $this->load->view('VSidebar');
        $this->load->view('VWorkPreview', $data);
        $this->load->view('VFooter');
    }

    public function fungsiTambah() {
        $this->form_validation->set_rules('title', 'Title', 'required|alpha',
		array('required' => '<strong>%s harus diisi</strong>', 'alpha' => '<strong>%s harus diisi dengan huruf saja</strong>'));
        
        $this->form_validation->set_rules('year', 'Year', 'required|max_length[4]|numeric',
		array('required' => '<strong>%s harus diisi</strong>', 'max_length' => '<strong>%s maksimal 4 angka</strong>', 'numeric' => '<strong>%s harus diisi dengan angka saja</strong>'));

        $this->form_validation->set_rules('content', 'Content', 'required',
		array('required' => '<strong>%s harus diisi</strong>'));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('title',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text">' . form_error('title') . '</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            $this->session->set_flashdata('year',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text">' . form_error('year') . '</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            $this->session->set_flashdata('content',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text">' . form_error('content') . '</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('CWork'));
        }
            $this->db->trans_start();

            $id = $this->input->post('id');
            $title = $this->input->post('title');
            $year = $this->input->post('year');
            $category_id = $this->input->post('category_id');
            $content = $this->input->post('content');

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 100000000000000000000000000000000000000000;
            $config['max_width']     = 100000000000000000000000000000000000000000;
            $config['max_height']    = 100000000000000000000000000000000000000000;
            $this->upload->initialize($config);
            $file = $this->upload->do_upload('featured_image');
            $data = $this->upload->data();

            if ($file) {
                $data = $this->upload->data();
                $featured_image = $data['file_name'];
            
            } else {
                $featured_image = $this->input->post('featured_image');
            }

            $arrInsert = array(
                // 'id' => $id,
                'title' => $title,
                'year' => $year,
                'content' => $content,
                'featured_image' => $featured_image,
                'created_by' => $this->session->userdata('id'),
                'updated_by' => $this->session->userdata('id')
            );
            $this->db->insert('works', $arrInsert);
            
            $work_id = $this->db->insert_id();
            
            foreach ($category_id as $category) {
                $arrInsert2 = array(
                    'work_id' => $work_id,
                    'category_id' => $category
                );
                $this->db->insert('work_categories', $arrInsert2);
            }
            
            $this->db->trans_complete();

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Data berhasil disimpan</strong></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('CWork'));
	}

    public function halamanUpdate($id) {
        $where = array('id' => $id);
        $data['works'] = $this->mwork->halamanUpdate($where, 'works')->result();
        $data['categories'] = $this->mcategory->tampilData()->result();
        $this->load->view('VHeader');
        $this->load->view('VSidebar');
        $this->load->view('VUpdateWork', $data);
        $this->load->view('VFooter');
    }

    public function fungsiUpdate() {
        $this->form_validation->set_rules('title', 'Title', 'required|alpha',
		array('required' => '<strong>%s harus diisi</strong>', 'alpha' => '<strong>%s harus diisi dengan huruf saja</strong>'));
        
        $this->form_validation->set_rules('year', 'Year', 'required|max_length[4]|numeric',
		array('required' => '<strong>%s harus diisi</strong>', 'max_length' => '<strong>%s maksimal 4 angka</strong>', 'numeric' => '<strong>%s harus diisi dengan angka saja</strong>'));

        $this->form_validation->set_rules('content', 'Content', 'required',
		array('required' => '<strong>%s harus diisi</strong>'));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('title',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text">' . form_error('title') . '</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            $this->session->set_flashdata('year',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text">' . form_error('year') . '</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            $this->session->set_flashdata('content',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text">' . form_error('content') . '</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('CWork'));
        }
        
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $year = $this->input->post('year');
        $category_id = $this->input->post('category_id');
        $content = $this->input->post('content');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size']             = 100000000000000000000100000000000000000000;
        $config['max_width']            = 100000000000000000000100000000000000000000;
        $config['max_height']           = 100000000000000000000100000000000000000000;
        $this->upload->initialize($config);
        $file = $this->upload->do_upload('featured_image');
        $data = $this->upload->data();

        if ($file) {
        $data = $this->upload->data();
        $featured_image = $data['file_name'];
            
        } else {
            $featured_image = $this->input->post('featured_image');
        }


        $arrUpdate = array(
            'id' => $id,
            'title' => $title,
            'year' => $year,
            'content' => $content,
            'featured_image' => $featured_image,
            'updated_by' => $this->session->userdata('id'),
        );

        $this->db->where('id', $id);
        $this->db->update('works', $arrUpdate);
            
        // foreach ($category_id as $category) {
        //     $arrUpdate2 = array(
        //         'category_id' => $category
        //     );
        //     $this->db->update('work_categories', $arrUpdate2);
        // }

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong>Data berhasil diubah</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('CWork'));
	}

    public function fungsiDelete($id) {
        $this->db->where('id', $id);
        $this->db->delete('works');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong>Data berhasil dihapus</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('CWork'));
    }

}

?>