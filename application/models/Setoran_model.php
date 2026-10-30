<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Setoran_model extends CI_Model {

     public function get_total_setoran_today() {
        // Konversi kolom `total_stor` menjadi integer agar bisa dijumlahkan
        $this->db->select_sum('CAST(REPLACE(total_stor, ",", "") AS DECIMAL(15,2))', 'total_setoran');
        $this->db->where('DATE(waktu_setor)', date('Y-m-d'));  // Filter berdasarkan tanggal hari ini
        $query = $this->db->get('setoran_aspri');
        return $query->row()->total_setoran;
    }


// Method untuk menghitung total setoran kemarin
    public function get_total_setoran_yesterday() {
        $this->db->select_sum('CAST(REPLACE(total_stor, ",", "") AS DECIMAL(15,2))', 'total_setoran');
        $this->db->where('DATE(waktu_setor)', date('Y-m-d', strtotime('-1 day')));
        $query = $this->db->get('setoran_aspri');
        return $query->row()->total_setoran;
    }
    
// Method untuk menghitung total setoran minggu ini
   public function get_total_setoran_week() {
    // Mendapatkan tanggal awal minggu ini (Senin) dan tanggal akhir minggu ini (hari ini)
    $start_of_week = date('Y-m-d', strtotime('monday this week'));
    $end_of_week = date('Y-m-d');

    // Menentukan total setoran antara tanggal awal minggu dan tanggal akhir minggu
    $this->db->select_sum('CAST(REPLACE(total_stor, ",", "") AS DECIMAL(15,2))', 'total_setoran');
    $this->db->where('DATE(waktu_setor) >=', $start_of_week);
    $this->db->where('DATE(waktu_setor) <=', $end_of_week);
    $query = $this->db->get('setoran_aspri');

    return $query->row()->total_setoran;
}

public function get_total_setoran_last_week() {
    // Mendapatkan tanggal awal minggu lalu (Senin) dan tanggal akhir minggu lalu (Minggu)
    $start_of_last_week = date('Y-m-d', strtotime('monday last week'));
    $end_of_last_week = date('Y-m-d', strtotime('sunday last week'));

    // Menentukan total setoran antara tanggal awal minggu lalu dan tanggal akhir minggu lalu
    $this->db->select_sum('CAST(REPLACE(total_stor, ",", "") AS DECIMAL(15,2))', 'total_setoran');
    $this->db->where('DATE(waktu_setor) >=', $start_of_last_week);
    $this->db->where('DATE(waktu_setor) <=', $end_of_last_week);
    $query = $this->db->get('setoran_aspri');

    return $query->row()->total_setoran;
}


    
     public function get_total_setoran_this_month() {
        $this->db->select_sum('total_stor', 'total_setoran');
        $this->db->where('MONTH(waktu_setor)', date('m'));
        $this->db->where('YEAR(waktu_setor)', date('Y'));
        $query = $this->db->get('setoran_aspri');
        
        if ($query->num_rows() > 0) {
            return $query->row()->total_setoran;
        } else {
            return 0;
        }
    }
    
public function get_total_setoran_last_month() {
    $last_month = date('m', strtotime("-1 month")); // Bulan sebelumnya
    $last_year = date('Y', strtotime("-1 month")); // Tahun bulan sebelumnya

    $this->db->select_sum('total_stor', 'total_setoran');
    $this->db->where('MONTH(waktu_setor)', $last_month);
    $this->db->where('YEAR(waktu_setor)', $last_year);
    $query = $this->db->get('setoran_aspri');
    
    if ($query->num_rows() > 0) {
        return $query->row()->total_setoran;
    } else {
        return 0;
    }
}




public function get_target_tahun_ini() {
   $this->db->select_sum('target_aspri');
    $query = $this->db->get('petugas');
    return $query->row()->target_aspri;
}

// Hitung JUMLAH TRANSAKSI hari ini (banyaknya baris) per petugas
public function get_total_transaksi_hari_ini($nama_petugas = null)
{
    $this->db->from('setoran_aspri');

    if ($nama_petugas) {
        $this->db->where('kolektor', $nama_petugas);
    }

    $this->db->where('DATE(waktu_setor)', date('Y-m-d'));
    return $this->db->count_all_results();
}

// Hitung TOTAL PENDAPATAN hari ini (SUM total_stor) per petugas
public function get_total_pendapatan_hari_ini($nama_petugas = null)
{
    // total_stor kamu string pakai koma, kita cast dulu ke DECIMAL
    $this->db->select_sum('CAST(REPLACE(total_stor, ",", "") AS DECIMAL(15,2))', 'total_setoran');
    $this->db->from('setoran_aspri');

    if ($nama_petugas) {
        $this->db->where('kolektor', $nama_petugas);
    }

    $this->db->where('DATE(waktu_setor)', date('Y-m-d'));
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row()->total_setoran ?? 0;
    } else {
        return 0;
    }
}


public function get_total_setoran_this_year() {
    // Query untuk menjumlahkan total_stor dari tabel setoran_aspri
    $this->db->select_sum('total_stor');
    $this->db->where('YEAR(waktu_setor)', date('Y'));
    $query1 = $this->db->get('setoran_aspri');
    $total_stor = $query1->row()->total_stor;

    // Menggabungkan hasil dari kedua tabel
    $total_tahun_ini = $total_stor;

    return $total_tahun_ini;
}


public function get_target_bulan_ini() {
    // Ambil total setoran tahun ini
    $total_tahun_ini = $this->get_total_setoran_this_year();

    // Bagi 12 untuk mendapatkan target bulanan
    $target_bulan_ini = $total_tahun_ini / 12;

    return $target_bulan_ini;
}

public function get_setoran_kalender()
{
  $this->db->select('waktu_setor, total_stor'); // Ambil juga jumlah_setor
    $this->db->from('setoran_aspri');
    $query = $this->db->get();
    return $query->result();
}

public function get_setoran_bulanan_petugas($tahun = null)
{
    if ($tahun === null) {
        $tahun = date('Y');
    }

    $sql = "
        SELECT
            p.kode_petugas,
            p.nama,
            l.nama AS lokasi,

            SUM(CASE WHEN s.bulan = 1  THEN CAST(REPLACE(s.total_stor, ',', '') AS DECIMAL(15,2)) ELSE 0 END) AS jan,
            SUM(CASE WHEN s.bulan = 2  THEN CAST(REPLACE(s.total_stor, ',', '') AS DECIMAL(15,2)) ELSE 0 END) AS feb,
            SUM(CASE WHEN s.bulan = 3  THEN CAST(REPLACE(s.total_stor, ',', '') AS DECIMAL(15,2)) ELSE 0 END) AS mar,
            SUM(CASE WHEN s.bulan = 4  THEN CAST(REPLACE(s.total_stor, ',', '') AS DECIMAL(15,2)) ELSE 0 END) AS apr,
            SUM(CASE WHEN s.bulan = 5  THEN CAST(REPLACE(s.total_stor, ',', '') AS DECIMAL(15,2)) ELSE 0 END) AS mei,
            SUM(CASE WHEN s.bulan = 6  THEN CAST(REPLACE(s.total_stor, ',', '') AS DECIMAL(15,2)) ELSE 0 END) AS jun,
            SUM(CASE WHEN s.bulan = 7  THEN CAST(REPLACE(s.total_stor, ',', '') AS DECIMAL(15,2)) ELSE 0 END) AS jul,
            SUM(CASE WHEN s.bulan = 8  THEN CAST(REPLACE(s.total_stor, ',', '') AS DECIMAL(15,2)) ELSE 0 END) AS ags,
            SUM(CASE WHEN s.bulan = 9  THEN CAST(REPLACE(s.total_stor, ',', '') AS DECIMAL(15,2)) ELSE 0 END) AS sep,
            SUM(CASE WHEN s.bulan = 10 THEN CAST(REPLACE(s.total_stor, ',', '') AS DECIMAL(15,2)) ELSE 0 END) AS okt,
            SUM(CASE WHEN s.bulan = 11 THEN CAST(REPLACE(s.total_stor, ',', '') AS DECIMAL(15,2)) ELSE 0 END) AS nov,
            SUM(CASE WHEN s.bulan = 12 THEN CAST(REPLACE(s.total_stor, ',', '') AS DECIMAL(15,2)) ELSE 0 END) AS des

        FROM petugas p
        LEFT JOIN lokasi l 
            ON p.lokasi = l.no
        LEFT JOIN setoran_aspri s 
            ON s.kode_petugas = p.noktp
            AND YEAR(s.waktu_setor) = ?

        WHERE p.aktif = 1   -- 🔥 hanya petugas aktif

        GROUP BY
            p.kode_petugas,
            p.nama,
            l.nama

        ORDER BY p.nama
    ";

    $query = $this->db->query($sql, array($tahun));
    return $query->result();
}


public function get_pendapatan_per_ruas_jalan()
{
    $this->db->select('lokasi.nama, SUM(setoran_aspri.total_stor) as total_stor');
    $this->db->from('setoran_aspri');
    $this->db->join('lokasi', 'setoran_aspri.lokasi = lokasi.nama');

    // FILTER data tahun ini
    $this->db->where('YEAR(setoran_aspri.waktu_setor)', date('Y'));

    $this->db->group_by('lokasi.nama');
    $this->db->order_by('total_stor', 'DESC');

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return null;
    }
}
}




?>