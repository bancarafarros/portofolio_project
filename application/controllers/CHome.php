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
	
	public function toPDF() {
		$data['hobbies'] = $this->MHome->tampilHobbies()->result();
		$data['social_medias'] = $this->MHome->tampilSocialMedias()->result();
		$data['cv_data'] = $this->MHome->tampilCVData()->result_array();
		$data['skills'] = $this->MHome->tampilSkills()->result();
		$data['educations'] = $this->MHome->tampilEducations()->result_array();
		$data['languages'] = $this->MHome->tampilLanguages()->result();
		$data['experiences'] = $this->MHome->tampilExperiences()->result_array();
		$this->topdf->generatePDF('cv/VCV', $data);
    }
}
?>