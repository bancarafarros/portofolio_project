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
        $data['posts'] = $this->mpost->tampilData();

        $this->load->view('VHeader');
        $this->load->view('VSidebar');
        $this->load->view('VPost', $data);
        $this->load->view('VFooter');
    }

    public function fungsiTambah() {
        $this->form_validation->set_rules('title', 'Title', 'required|alpha',
		array('required' => '<strong>%s harus diisi</strong>', 'alpha' => '<strong>%s harus diisi dengan huruf saja</strong>'));

        $this->form_validation->set_rules('content', 'Content', 'required|alpha',
		array('required' => '<strong>%s harus diisi</strong>', 'alpha' => '<strong>%s harus diisi dengan huruf saja</strong>'));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('title',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text">' . form_error('title') . '</span>
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
            
            redirect(base_url('CPost'));

        } else {
            $id = $this->input->post('id');
            $title = $this->input->post('title');
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


            $ArrInsert = array(
                'id' => $id,
                'title' => $title,
                'content' => $content,
                'featured_image' => $featured_image,
                'created_by' => $this->session->userdata('id'),

            );

            $this->db->insert('posts', $ArrInsert);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Data berhasil disimpan</strong></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('CPost'));
        }

	}

    public function halamanUpdate($id) {
        $where = array('id' => $id);
        $data['posts'] = $this->mwork->halamanUpdate($where, 'posts')->result();
        $this->load->view('VHeader');
        $this->load->view('VSidebar');
        $this->load->view('VUpdatePost', $data);
        $this->load->view('VFooter');
    }

    public function fungsiUpdate() {
        $this->form_validation->set_rules('title', 'Title', 'required|alpha',
		array('required' => '<strong>%s harus diisi</strong>', 'alpha' => '<strong>%s harus diisi dengan huruf saja</strong>'));

        $this->form_validation->set_rules('content', 'Content', 'required|alpha',
		array('required' => '<strong>%s harus diisi</strong>', 'alpha' => '<strong>%s harus diisi dengan huruf saja</strong>'));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('title',  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text">' . form_error('title') . '</span>
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
            
            redirect(base_url('CPost'));

        } else {
            $id = $this->input->post('id');
            $title = $this->input->post('title');
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


            $ArrUpdate = array(
                'id' => $id,
                'title' => $title,
                'content' => $content,
                'featured_image' => $featured_image,
                'updated_by' => $this->session->userdata('id'),

            );

            $this->db->where('id', $id);
            $this->db->update('posts', $ArrUpdate);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Data berhasil diubah</strong></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('CPost'));
        }
	}

    public function fungsiDelete($id) {
        $this->db->where('id', $id);
        $this->db->delete('posts');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong>Data berhasil dihapus</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('CPost'));
    }

}

?>