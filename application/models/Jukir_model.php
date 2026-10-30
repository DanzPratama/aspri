<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jukir_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Fungsi untuk mendapatkan semua data dari tabel Jukir
public function get_all_jukir()
{
    return $this->db->get('petugas_dev')->result(); // HARUS result()
}


    // Fungsi untuk mendapatkan data berdasarkan kode jukir
    public function get_by_kode($kode) {
        $this->db->where('kode_jukir', $kode);
        $query = $this->db->get('petugas_dev');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    // Fungsi untuk mendapatkan data berdasarkan id jukir
    public function get_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('petugas_dev');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
public function hitung_hari_setor_dari_sts($nama_petugas, $target)
{
    // ===============================
    // RANGE TAHUN INI
    // ===============================
    $tahun = date('Y');
    $awal  = $tahun . '-01-01 00:00:00';
    $akhir = $tahun . '-12-31 23:59:59';

    // ===============================
    // TOTAL SETORAN DARI aspri_sts
    // ===============================
    $this->db->select("SUM(CAST(REPLACE(jumlah,'.','') AS UNSIGNED)) AS total", false);
    $this->db->from('aspri_sts');
    $this->db->where('nama_petugas', trim($nama_petugas));
    $this->db->where('waktu >=', $awal);
    $this->db->where('waktu <=', $akhir);

    $total_setoran = (int) ($this->db->get()->row()->total ?? 0);

    // ===============================
    // TARGET HARIAN
    // ===============================
    $target_tahunan = (int) preg_replace('/[^0-9]/', '', $target);
    if ($target_tahunan <= 0) return 0;

    $target_harian = $target_tahunan / 30;

    // ===============================
    // TOTAL HARI SETOR
    // ===============================
    $hari_setor = floor($total_setoran / $target_harian);

    return min(365, $hari_setor);
}


public function get_jukir_by_id($id) {
    // Memilih kolom yang akan diambil dari tabel petugas dan lokasi
   // $this->db->select('petugas.*, lokasi.nama as nama_lokasi');
    
    // Menentukan tabel utama
    $this->db->from('petugas_dev');
    
    // Melakukan join dengan tabel lokasi
  //  $this->db->join('lokasi', 'petugas.lokasi = lokasi.no', 'left');
    
    // Menambahkan kondisi WHERE untuk ID
    $this->db->where('petugas_dev.id', $id);
    
    // Menjalankan query
    $query = $this->db->get();
    
    // Debug: Tampilkan query yang dihasilkan
    log_message('debug', 'Query get_jukir_by_id: ' . $this->db->last_query());

    // Mengembalikan hasil query sebagai satu baris (object)
    return $query->row();
}

    // Fungsi untuk menambahkan data ke tabel Jukir
    public function insert($data) {
        return $this->db->insert('jukir', $data);
    }

    // Fungsi untuk memperbarui data di tabel Jukir
    public function update($kode, $data) {
        $this->db->where('kode_jukir', $kode);
        return $this->db->update('jukir', $data);
    }

    // Fungsi untuk menghapus data dari tabel Jukir
    public function delete($kode) {
        $this->db->where('kode_jukir', $kode);
        return $this->db->delete('jukir');
    }
public function get_by_name($nama)
{
    $this->db->select('*');
    $this->db->from('petugas_dev');
    $this->db->like('nama', $nama);
    return $this->db->get()->result();
}


    
public function get_all_setoran() {
    $this->db->select('kode_petugas, notransaksi,nama_petugas, kolektor, total_stor, waktu_setor,lokasi');
    $this->db->from('setoran_aspri');
    $this->db->order_by('waktu_setor', 'DESC');  // Urutkan berdasarkan waktu_setor terbaru
    return $this->db->get()->result();
}
public function get_setoran_sts() {
    $this->db->select('kode_petugas, notransaksi,lokasi, nama_petugas, kolektor, total_stor, waktu_setor');
    $this->db->from('setoran_aspri');
    $this->db->order_by('waktu_setor', 'DESC');  // Urut berdasarkan waktu terbaru
    $this->db->limit(10); // Ambil maksimal 20 data
    return $this->db->get()->result();
}

 public function get_setoran_by_date($tanggal) {
        $this->db->select('kode_petugas, notransaksi,nama_petugas, kolektor, total_stor, waktu_setor,lokasi');
        $this->db->from('setoran_aspri');
        $this->db->like('waktu_setor', $tanggal);  // Sesuaikan dengan format penyimpanan tanggal
         $this->db->order_by('waktu_setor', 'DESC');
        return $this->db->get()->result();
    }
    
public function get_setoran_by_penagih($keyword)
{
    $this->db->select('kode_petugas, notransaksi, nama_petugas, kolektor, total_stor, waktu_setor, lokasi');
    $this->db->from('setoran_aspri');

    // Bisa cari berdasarkan nama_petugas ATAU kolektor
    $this->db->group_start();
        $this->db->like('kolektor', $keyword);
        $this->db->or_like('nama_petugas', $keyword);
    $this->db->group_end();

    $this->db->order_by('waktu_setor', 'DESC');
    return $this->db->get()->result();
}


    
    public function get_setoran_by_date_range($start_date, $end_date) {
    $this->db->select('kode_petugas, notransaksi,nama_petugas, kolektor, total_stor, waktu_setor,lokasi');
    $this->db->from('setoran_aspri');
    $this->db->where('waktu_setor >=', $start_date);
    $this->db->where('waktu_setor <=', $end_date);
    $this->db->order_by('waktu_setor', 'DESC'); // Mengurutkan berdasarkan waktu terbaru
    return $this->db->get()->result();
}

public function count_all_setoran_by_kolektor($kolektor) {
    $this->db->where('kolektor', $kolektor);
    return $this->db->count_all_results('setoran_aspri'); // Menghitung total data
}

    public function get_setoran_per_tanggal($id_jukir, $bulan)
{
    $jukir = $this->db->where('id', $id_jukir)->get('petugas_dev')->row();
    if (!$jukir) return [];

    $start = $bulan . '-01 00:00:00';
    $end   = date('Y-m-t 23:59:59', strtotime($start));

    $this->db->select("
        DATE(waktu) as tanggal,
        SUM(CAST(REPLACE(jumlah, '.', '') AS UNSIGNED)) as total
    ", false);

    $this->db->from('aspri_sts');
    $this->db->like('nama_petugas', trim($jukir->nama));
    $this->db->where('waktu >=', $start);
    $this->db->where('waktu <=', $end);
    $this->db->group_by('DATE(waktu)');
    $this->db->order_by('tanggal', 'ASC');

    return $this->db->get()->result_array();
}


public function get_setoran_harian_by_jukir($id_jukir)
{
    // Ambil data jukir dulu
    $jukir = $this->db
        ->where('id', $id_jukir)
        ->get('petugas_dev')
        ->row();

    if (!$jukir) {
        return false;
    }

    // Ambil setoran berdasarkan nama jukir
    $this->db->select('*');
    $this->db->from('aspri_sts');
    $this->db->where('nama_petugas', $jukir->nama);
    $this->db->order_by('waktu', 'DESC');

    return [
        'jukir'   => $jukir,
        'setoran' => $this->db->get()->result()
    ];
}

public function get_setoran_by_jukir_bulan($id_jukir, $bulan)
{
    $jukir = $this->db->where('id', $id_jukir)->get('petugas_dev')->row();
    if (!$jukir) return [];

    $start = $bulan . '-01 00:00:00';
    $end   = date('Y-m-t 23:59:59', strtotime($start));

    $this->db->from('aspri_sts');
    $this->db->like('nama_petugas', trim($jukir->nama));
    $this->db->where('waktu >=', $start);
    $this->db->where('waktu <=', $end);
    $this->db->order_by('waktu', 'ASC');

    return $this->db->get()->result();
}


public function get_kalender_setoran($id_jukir, $bulan)
{
    $jukir = $this->db->where('id', $id_jukir)->get('petugas_dev')->row();
    if (!$jukir) return [];

    $this->db->select("
        DATE(waktu) as tanggal,
        SUM(CAST(REPLACE(jumlah, '.', '') AS UNSIGNED)) as total
    ", false);

    $this->db->from('aspri_sts');
    $this->db->like('nama_petugas', trim($jukir->nama));
    $this->db->like('waktu', $bulan);
    $this->db->group_by('DATE(waktu)');

    return $this->db->get()->result_array();
}

public function get_tanggal_setoran($id_jukir, $bulan)
{
    $jukir = $this->db->where('id', $id_jukir)->get('petugas_dev')->row();
    if (!$jukir) return [];

    // batas tanggal bulan
    $start = $bulan . '-01 00:00:00';
    $end   = date('Y-m-t 23:59:59', strtotime($start));

    $this->db->select('DATE(waktu) as tanggal');
    $this->db->from('aspri_sts');
    $this->db->like('nama_petugas', trim($jukir->nama));
    $this->db->where('waktu >=', $start);
    $this->db->where('waktu <=', $end);
    $this->db->group_by('DATE(waktu)');

    return $this->db->get()->result_array();
}



public function get_setoran_by_kolektor($kolektor, $limit, $start) {
    $this->db->select('kode_petugas, nama_petugas,notransaksi, kolektor, total_stor,lokasi, waktu_setor');
    $this->db->from('setoran_aspri');
    $this->db->where('kolektor', $kolektor);
    $this->db->limit($limit, $start); // Ambil data sesuai limit dan start
    $this->db->order_by('waktu_setor', 'DESC');
    return $this->db->get()->result();
}



}
?>