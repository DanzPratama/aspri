<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sts extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model jika kamu pakai model (bisa ditambahkan nanti)
        // $this->load->model('Sts_model');
        $this->load->database();
    }
     private function check_login() {
        // Periksa apakah pengguna sudah login
        if (!$this->session->userdata('logged_in')) {
            // Jika belum login, arahkan ke halaman login
            redirect('login');
        }
     }
    
 public function index()
{
    $this->check_login();

    // Ambil SEMUA petugas untuk Select2
    $data['petugas'] = $this->db
        ->order_by('nama', 'ASC')
        ->get('petugas_dev')
        ->result();

    $this->load->view('internal/_head');
    $this->load->view('admin/sts_page', $data);
}
public function get_sts_by_date()
{
    $tanggal = $this->input->get('tanggal');

    if (!$tanggal) {
        $tanggal = date('Y-m-d');
    }

    $this->db->where('DATE(waktu)', $tanggal);
    $this->db->order_by('waktu', 'ASC');
    $query = $this->db->get('aspri_sts');

    echo json_encode($query->result());
}


    
public function get_sts_today()
{
    $today = date('Y-m-d');
    $this->db->where('DATE(waktu)', $today);
    $query = $this->db->get('aspri_sts');

    echo json_encode($query->result());
}

public function get_sts_no_today()
{
    $today = date('Y-m-d');
    $this->db->select('no_transaksi');
    $this->db->where('DATE(waktu)', $today);
    $query = $this->db->get('aspri_sts');

    $result = array_map(function ($row) {
        return $row->no_transaksi;
    }, $query->result());

    echo json_encode($result);
}


public function simpan_sts()
{
    header('Content-Type: application/json');

    try {

        $no_urut = $this->input->post('no_urut');

        // 🔒 VALIDASI PENTING
        if (!$no_urut) {
            echo json_encode([
                'status' => false,
                'message' => 'No urut petugas tidak boleh kosong'
            ]);
            return;
        }

    $waktu_input = $this->input->post('waktu');

$data = [
    'waktu'        => $waktu_input
                      ? date('Y-m-d H:i:s', strtotime($waktu_input))
                      : date('Y-m-d H:i:s'),
    'no_urut'      => $no_urut,
    'no_transaksi' => $no_urut,
    'lokasi'       => $this->input->post('lokasi'),
    'nama_petugas' => $this->input->post('nama_petugas'),
    'jumlah'       => $this->input->post('jumlah'),
];


        $this->db->insert('aspri_sts', $data);

        if ($this->db->affected_rows() > 0) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode([
                'status' => false,
                'message' => 'Gagal menyimpan data'
            ]);
        }

    } catch (Exception $e) {
        echo json_encode([
            'status' => false,
            'message' => 'Exception: ' . $e->getMessage()
        ]);
    }
}


public function hapus_sts()
{
    header('Content-Type: application/json');

    $id = $this->input->post('id');

    if (!$id) {
        echo json_encode([
            'status' => 'error',
            'message' => 'ID tidak ditemukan'
        ]);
        return;
    }

    $this->db->where('id', $id);
    $delete = $this->db->delete('aspri_sts');

    if ($delete && $this->db->affected_rows() > 0) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Data tidak ditemukan / sudah terhapus'
        ]);
    }
}



public function cek_transaksi()
{
    header('Content-Type: application/json');

    $no_transaksi = $this->input->post('no_transaksi');

    $cek = $this->db->get_where('aspri_sts', ['no_transaksi' => $no_transaksi])->num_rows();

    if ($cek > 0) {
        echo json_encode(['status' => 'exists']);
    } else {
        echo json_encode(['status' => 'not_exists']);
    }
}

public function tambah_manual()
{
    // Kembalikan JSON
    $this->output->set_content_type('application/json');

    // Ambil input aman (XSS filtering true)
    $waktu        = $this->input->post('waktu', true);
    $no_transaksi = trim($this->input->post('no_transaksi', true));
    $lokasi       = trim($this->input->post('lokasi', true));
    $nama_petugas = trim($this->input->post('nama_petugas', true));
    $jumlah_raw   = $this->input->post('jumlah', true);

    // Default waktu = sekarang jika kosong
    if (!$waktu) $waktu = date('Y-m-d H:i:s');

    // Normalisasi jumlah -> angka
    $jumlah = preg_replace('/[^\d.-]/', '', (string)$jumlah_raw);
    if ($jumlah === '' || !is_numeric($jumlah)) $jumlah = 0;

    // Validasi sederhana
    if (empty($no_transaksi) || empty($lokasi) || empty($nama_petugas) || $jumlah <= 0) {
        echo json_encode([
            'status'  => 'error',
            'message' => 'Field wajib belum lengkap atau jumlah tidak valid.'
        ]);
        return;
    }

    // Cek duplikat no_transaksi (opsional, bisa dihapus kalau boleh duplikat)
    $exists = $this->db->select('id')
        ->from('aspri_sts')
        ->where('no_transaksi', $no_transaksi)
        ->limit(1)
        ->get()
        ->row();

    if ($exists) {
        echo json_encode([
            'status'  => 'exists',
            'message' => 'No transaksi sudah terdaftar.'
        ]);
        return;
    }

    // Insert
    $data = [
        'waktu'        => $waktu,
        'no_transaksi' => $no_transaksi,
        'lokasi'       => $lokasi,
        'nama_petugas' => $nama_petugas,
        'jumlah'       => (int)$jumlah,
    ];

    $ok = $this->db->insert('aspri_sts', $data);

    if ($ok) {
        $data['id'] = $this->db->insert_id();
        echo json_encode([
            'status'    => 'success',
            'message'   => 'STS manual berhasil disimpan.',
            'data'      => $data
        ]);
    } else {
        echo json_encode([
            'status'  => 'error',
            'message' => 'Gagal menyimpan ke database.'
        ]);
    }
}

    
public function get_setoran_modal()
{
    $this->output->set_content_type('application/json');

    $today = date('Y-m-d');
    $yesterday = date('Y-m-d', strtotime('-1 day'));

    $data = $this->db
        ->select('waktu_setor, kode_petugas, notransaksi, nama_petugas, lokasi, total_stor')
        ->from('setoran_aspri')
        ->where('waktu_setor >=', $yesterday . ' 00:00:00')
        ->where('waktu_setor <=', $today . ' 23:59:59')
        ->order_by('waktu_setor', 'DESC')
        ->get()
        ->result();

    $this->output->set_output(json_encode($data));
}

}
