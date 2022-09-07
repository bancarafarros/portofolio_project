<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CDashboard extends CI_Controller {
	public function index() {
		$data['users'] = $this->musers->tampil_data()->result();

		$this->load->view('VContact', $data);
	}

	public function works() {
		$this->load->view('VWork');
	}

	public function blog() {
		$this->load->view('VBlog');
	}

	public function workdetail() {
		$this->load->view('VWorkDetail');
	}

	public function fungsiTambah() {
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$name = $this->input->post('name');
        $password = $this->input->post('password');

		$ArrInsert = array(
			'id' => $id,
			'username' => $username,
			'name' => $name,
			'password' => $password
		);

		$this->db->insert('users', $ArrInsert);
		redirect(base_url('CDashboard'));
	}
}
