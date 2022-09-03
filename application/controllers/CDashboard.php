<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CDashboard extends CI_Controller {
	public function index() {
		$this->load->view('VContact');
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
}
