<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class ToPDF {
    
    // public function generate($view, $data = array()) {
        public function generate($view, $data = array()) {
        // $html = $this->load>view($view, $data, TRUE);
        
        $paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		
		$dompdf = new Dompdf();
		$dompdf->set_paper($paper_size, $orientation);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream($filename . ".pdf", array('Attachment' => 0)); 
    }
}
?>