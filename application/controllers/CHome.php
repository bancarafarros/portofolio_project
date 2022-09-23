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
		$data['educations'] = $this->mhome->tampilEducations()->result();
		$data['languages'] = $this->mhome->tampilLanguages()->result();
		$data['experiences'] = $this->mhome->tampilExperiences()->result();
        $this->load->view('VCV', $data);
	}
	
	public function toPDF() {
        $this->load->library('dompdf_gen');

		$data['hobbies'] = $this->mhome->tampilHobbies()->result();
		$data['scial_medias'] = $this->mhome->tampilSocialMedias()->result();
		$data['cv_data'] = $this->mhome->tampilCVData()->result();
		$data['skills'] = $this->mhome->tampilSkills()->result();
		$data['educations'] = $this->mhome->tampilEducations()->result();
		$data['languages'] = $this->mhome->tampillanguages()->result();
		$data['experiences'] = $this->mhome->tampilExperiences()->result();
        $this->load->view('VCV', $data);
        
		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
		// $this->dompdf->setBasePath(realpath(APPLICATION_PATH . 'assets/css/stylecv.css'));
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("CV.pdf", array('Attachment' => 0));
    }
}
