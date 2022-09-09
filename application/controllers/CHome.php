<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CHome extends CI_Controller {
	public function index() {
		$this->load->view('VContact');
	}

	public function works() {
		$this->load->view('VWorks');
	}

	public function blog() {
		$this->load->view('VBlog');
	}

	public function workdetail() {
		$this->load->view('VWorkDetail');
	}
}