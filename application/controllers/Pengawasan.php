<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengawasan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function check_login()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index()
    {
        $this->check_login();

        // Ambil semua data petugas
        $data['petugas'] = $this->db
            ->order_by('nama', 'ASC')
            ->get('petugas')
            ->result();

        // Load view
        $this->load->view('pengawasan/dashboard', $data);
    }

    // OPTIONAL AJAX
    public function get_petugas()
    {
        header('Content-Type: application/json');

        $data = $this->db
            ->order_by('nama', 'ASC')
            ->get('petugas')
            ->result();

        echo json_encode($data);
    }
}