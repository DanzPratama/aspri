<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf {
    public $dompdf;

    public function __construct() {
        require_once APPPATH . 'third_party/dompdf/autoload.inc.php';

        // Atur opsi Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        // Inisialisasi Dompdf
        $this->dompdf = new Dompdf($options);
    }

    public function load_view($view, $data = []) {
        $CI =& get_instance();
        $html = $CI->load->view($view, $data, TRUE);
        $this->dompdf->loadHtml($html);
    }

    public function render() {
        $this->dompdf->render();
    }

    public function stream($filename = "document.pdf", $options = []) {
        $this->dompdf->stream($filename, $options);
    }
}
