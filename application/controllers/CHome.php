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

	public function viewCV() {
		$data['hobbies'] = $this->mhome->tampilHobbies()->result();
		$data['social_medias'] = $this->mhome->tampilSocialMedias()->result();
		$data['cv_data'] = $this->mhome->tampilCVData()->result_array();
		$data['skills'] = $this->mhome->tampilSkills()->result();
		$data['educations'] = $this->mhome->tampilEducations()->result_array();
		$data['languages'] = $this->mhome->tampilLanguages()->result();
		$data['experiences'] = $this->mhome->tampilExperiences()->result_array();
        $this->load->view('VCV', $data);
	}
	
	public function toPDF() {
		$data['hobbies'] = $this->mhome->tampilHobbies()->result();
		$data['social_medias'] = $this->mhome->tampilSocialMedias()->result();
		$data['cv_data'] = $this->mhome->tampilCVData()->result_array();
		$data['skills'] = $this->mhome->tampilSkills()->result();
		$data['educations'] = $this->mhome->tampilEducations()->result_array();
		$data['languages'] = $this->mhome->tampilLanguages()->result();
		$data['experiences'] = $this->mhome->tampilExperiences()->result_array();
		$this->topdf->generatePDF('VCV', $data);
    }
}
?>