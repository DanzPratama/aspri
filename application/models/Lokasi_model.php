<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load database in constructor if not autoloaded
    }

    public function get_nama_by_no($no) {
        $this->db->select('nama');
        $this->db->where('no', $no);
        $query = $this->db->get('lokasi');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->nama;
        } else {
            return 'Nama tidak ditemukan';
        }
    }
    
     public function get_total_setoran_hari_ini() {
        $kolektor = $this->session->userdata('nama');
            
        $this->db->select_sum('total_stor');
        $this->db->where('DATE(waktu_setor)', date('Y-m-d'));
        $this->db->where('nama', $kolektor);
        $query = $this->db->get('setoran_aspri');
        return $query->row()->setor;
    }

}
