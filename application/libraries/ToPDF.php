<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class ToPDF extends Dompdf {

	protected function ci() {
		return get_instance();
	}

	public function generatePDF($view, $data = array()) {
		// $dompdf = new Dompdf();
		$options = new Options();
		$options->setIsRemoteEnabled(TRUE);
		$options->setIsPhpEnabled(TRUE);
		$dompdf = new Dompdf($options);

		$html = $this->ci()->load->view($view, $data, TRUE);
		$paper_size = 'A4';
		$orientation = 'potrait';

		$dompdf->loadHtml($html);
		$dompdf->setPaper($paper_size, $orientation);
		$dompdf->render();
		$dompdf->stream("CV.pdf", array('Attachment' => 0));
	}
}
?>