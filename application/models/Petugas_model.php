<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_petugas($limit, $offset) {
        $query = $this->db->get('petugas_dev', $limit, $offset);
        return $query->result_array();
    }

    public function get_total_petugas() {
        return $this->db->count_all('petugas_dev');
    }

    public function get_all_lokasi() {
        $this->db->select('no, nama');
        $query = $this->db->get('lokasi');
        return $query->result_array();
    }
    public function get_all_jukir() {
        $this->db->select('nama');
        $query = $this->db->get('petugas_dev');
        return $query->result_array();
    }

    public function update_petugas($no, $data) {
        $this->db->where('id', $no);
        $this->db->update('petugas_dev', $data);
    }

    public function delete_petugas($no) {
        $this->db->where('id', $no);
        $this->db->delete('petugas_dev');
    }

    public function get_petugas_by_id($id) {
        return $this->db->get_where('petugas_dev', array('id' => $id))->row_array();
    }
    // Fungsi untuk mengambil data petugas berdasarkan no
    public function get_jukir_by_no($no) {
        $this->db->where('no', $no);
        $query = $this->db->get('petugas_dev');
        
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    // Fungsi untuk mengambil data petugas berdasarkan kode_petugas
 // Metode untuk mendapatkan data jukir berdasarkan kode_petugas dengan join tabel lokasi
 public function get_jukir_by_kode_petugas($kode_petugas) {
    $this->db->select('petugas.*, lokasi.nama as nama_lokasi');
    $this->db->from('petugas_dev');
    $this->db->join('lokasi', 'petugas.lokasi = lokasi.no', 'left');
    $this->db->where('petugas.kode_petugas', $kode_petugas);
    $query = $this->db->get();
    return $query->row();
}

public function simpan_setoran($data) {
    // Gunakan transaksi agar data tidak dobel jika salah satu gagal
    $this->db->trans_start();

    // Simpan ke tabel pertama
    $this->db->insert('setoran_aspri', $data);

    
    $this->db->trans_complete();

    return $this->db->trans_status(); // true jika berhasil, false jika gagal
}


public function get_sisa_setoran($nama_petugas) {
    // Ambil sisa setoran terakhir dari database berdasarkan nama petugas
    $this->db->select('sisa_setoran');
    $this->db->from('setoran_aspri');
    $this->db->where('nama_petugas', $nama_petugas);
    $this->db->order_by('waktu_setor', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        $result = $query->row();
        return $result->sisa_setoran;
    } else {
        // Jika tidak ada data setoran sebelumnya, sisa setoran dihitung dari total setoran sebelumnya
        return 0; // Misalnya 0 jika tidak ada data sebelumnya
    }
}

public function hitungTotalSetoran($kode_petugas) {
    $this->db->select_sum('total_stor'); // Menghitung jumlah total_stor
    $this->db->where('kode_petugas', $kode_petugas); // Sesuaikan dengan kode_petugas yang diberikan
    $this->db->where('YEAR(waktu_setor)', date('Y')); // Hanya hitung setoran tahun ini
    $query = $this->db->get('setoran_aspri'); // Nama tabel 'setoran_aspri'

    if ($query->num_rows() > 0) {
        return $query->row()->total_stor; // Mengembalikan jumlah total_stor
    } else {
        return 0; // Mengembalikan 0 jika tidak ada hasil
    }
}


public function getTanggalTerakhirSetor($kode_petugas) {
    $this->db->select('waktu_setor');
    $this->db->where('kode_petugas', $kode_petugas);
    $this->db->order_by('waktu_setor', 'desc'); // Ambil yang terbaru
    $query = $this->db->get('setoran_aspri', 1); // Ambil hanya 1 baris

    if ($query->num_rows() > 0) {
        $row = $query->row();
        return $row->waktu_setor;
    } else {
        return null; // Atau dapatkan default jika tidak ada data
    }
    
}

 // Fungsi untuk mengecek apakah sudah ada setoran hari ini berdasarkan nomor KTP
 public function isAlreadySetorToday($noKTP, $today) {
    $this->db->where('kode_petugas', $noKTP);
    $this->db->where('DATE(waktu_setor)', $today);
    $query = $this->db->get('setoran_aspri');

    return $query->num_rows() > 0;
}
// Fungsi untuk menghitung total petugas
    public function count_petugas()
    {
        return $this->db->count_all('petugas_dev');
    }
}
?>