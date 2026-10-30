<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratKeluar extends CI_Controller {
      public function __construct() {
        parent::__construct();
                $this->load->library('session'); // Load session library
        $this->load->library('form_validation');
        $this->load->database(); // Load database in constructor if not autoloaded
              $this->load->helper('device_helper'); // Load custom helper
        $this->load->model('Lokasi_model'); // Load Lokasi_model
        $this->load->model('Petugas_model'); // Load Lokasi_model
        $this->load->model('User_model'); // Load Lokasi_model
      
       $this->load->helper('terbilang'); 
    }

    public function index() {
        $data['title'] = "Generator Surat Perintah Tugas";
        $data['lokasi'] = $this->Petugas_model->get_all_lokasi(); 
        $data['jukir'] = $this->Petugas_model->get_all_jukir(); 
        $this->load->view('internal/_head', $data);
        $this->load->view('admin/surat_keluar', $data);
    }

    public function save() {
        $data['title'] = "Hasil Surat Perintah Tugas";

        $data['content'] = [
            'nomor_surat' => $this->input->post('nomor_surat'),
            'nama' => $this->input->post('nama'),
            'ttl' => $this->input->post('ttl'),
            'alamat' => $this->input->post('alamat'),
            'lokasi' => $this->input->post('lokasi'),
            'area' => $this->input->post('area'),
        ];

        // Load view untuk preview
        $this->load->view('admin/surat_keluar_preview', $data);
    }

    public function download_pdf() {
        // Load library PDF
        $this->load->library('pdf');

        // Ambil data dari form
        $data['title'] = "Surat Perintah Tugas PDF";
        $data['content'] = [
            'nomor_surat' => $this->input->post('nomor_surat'),
            'nama_jukir' => $this->input->post('nama_jukir'),
            'ttl' => $this->input->post('ttl'),
            'alamat' => $this->input->post('alamat'),
        ];

        // Render view untuk PDF
        $html = $this->load->view('admin/surat_keluar_preview', $data, TRUE);
   $this->pdf->createPDF($html, "surat_perintah_tugas.pdf");

    }
}
