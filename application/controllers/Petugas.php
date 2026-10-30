<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

    public function __construct() {
        parent::__construct();
                $this->load->library('session'); // Load session library
        $this->load->library('form_validation');
        $this->load->database(); // Load database in constructor if not autoloaded
              $this->load->helper('device_helper'); // Load custom helper
        $this->load->model('Lokasi_model'); // Load Lokasi_model
        $this->load->model('Petugas_model'); // Load Lokasi_model
        $this->load->model('User_model'); // Load Lokasi_model
        $this->load->model('Setoran_model'); // Load Lokasi_model
        $this->load->model('Jukir_model'); // Load Lokasi_model
      
       $this->load->helper('terbilang'); 
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
    $this->load->view('internal/_head');

    // ===============================
    // AMBIL DATA JUKIR (WAJIB ADA)
    // ===============================
    $jukir = $this->db
        ->where('id', $this->session->userdata('id'))
        ->get('petugas_dev')
        ->row();

    // proteksi kalau data jukir kosong
    if (!$jukir) {
        $jukir = (object)[
            'nama'   => '',
            'target' => 0
        ];
    }

    // ===============================
    // TARGET TAHUNAN → HARIAN
    // ===============================
    $target_tahunan = (int) str_replace('.', '', preg_replace('/[^0-9.]/', '', $jukir->target));
    $target_harian  = floor($target_tahunan / 30);

    // ===============================
    // TOTAL SETORAN TAHUN INI
    // ===============================
    $this->db->select("SUM(CAST(REPLACE(jumlah,'.','') AS UNSIGNED)) as total", false);
    $this->db->from('aspri_sts');
    $this->db->like('nama_petugas', trim($jukir->nama));
    $this->db->where('YEAR(waktu)', date('Y'));

    $total_setoran_tahun = (int) ($this->db->get()->row()->total ?? 0);

    // ===============================
    // TOTAL HARI SETOR
    // ===============================
    $total_hari_setor = $target_harian > 0
        ? floor($total_setoran_tahun / $target_harian)
        : 0;

    // ===============================
    // PERSENTASE
    // ===============================
    $persentase = min(100, round(($total_hari_setor / 30) * 100));

    // ===============================
    // DATA KE VIEW
    // ===============================
    $data['jukir']             = $jukir;
    $data['total_hari_setor']  = $total_hari_setor;
    $data['persentase']        = $persentase;
    $data['total_petugas']     = $this->Petugas_model->count_petugas();
    $data['lokasi']            = $this->Petugas_model->get_all_lokasi();

    $this->load->view('admin/petugas', $data);
}

public function non_admin()
{
    $this->check_login();

  

    $this->load->view('internal/_head');

    $this->load->view('internal/petugas');
}

public function hapus_transaksi()
{
    $this->output->set_content_type('application/json');

    if ($this->input->method(TRUE) !== 'POST') {
        return $this->output
            ->set_status_header(405)
            ->set_output(json_encode([
                'success' => false,
                'message' => 'Metode permintaan tidak diizinkan.'
            ]));
    }

    // Pastikan controller ini sudah menggunakan pemeriksaan
    // login dan hak akses yang sama dengan halaman riwayat transaksi.

    $noTransaksi = trim((string) $this->input->post('notransaksi', TRUE));

    if ($noTransaksi === '') {
        return $this->output
            ->set_status_header(400)
            ->set_output(json_encode([
                'success' => false,
                'message' => 'Nomor transaksi wajib diisi.'
            ]));
    }

    $this->db->trans_begin();

    // Pastikan transaksi memang ada.
    $transaksi = $this->db
        ->where('notransaksi', $noTransaksi)
        ->get('setoran_aspri')
        ->row();

    if (!$transaksi) {
        $this->db->trans_rollback();

        return $this->output
            ->set_status_header(404)
            ->set_output(json_encode([
                'success' => false,
                'message' => 'Transaksi tidak ditemukan.'
            ]));
    }

    // Hapus rincian jika tabel tersebut digunakan.
    // Hapus blok ini jika tabel setoran_aspri_detail tidak ada.
    $this->db
        ->where('notransaksi', $noTransaksi)
        ->delete('setoran_aspri_detail');

    // Hapus transaksi utama.
    $this->db
        ->where('notransaksi', $noTransaksi)
        ->delete('setoran_aspri');

    if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();

        return $this->output
            ->set_status_header(500)
            ->set_output(json_encode([
                'success' => false,
                'message' => 'Gagal menghapus transaksi dari database.'
            ]));
    }

    $this->db->trans_commit();

    return $this->output->set_output(json_encode([
        'success' => true,
        'message' => 'Transaksi ' . $noTransaksi . ' berhasil dihapus.'
    ]));
}

    public function setoran() {
         $this->check_login(); 
           $this->load->view('internal/_head'); // Load header
            // Panggil fungsi dari model untuk menghitung total petugas
        $total_petugas = $this->Petugas_model->count_petugas();
            // Kirim data total petugas ke view
        $data['total_petugas'] = $total_petugas;
        $data['lokasi'] = $this->Petugas_model->get_all_lokasi(); 
        $this->load->view('internal/setoran_petugas',$data);
    }

  // Petugas.php
public function get_petugas()
{
    $this->check_login();

    $limit  = (int) $this->input->post('limit');
    $offset = (int) $this->input->post('offset');
    $sort   = $this->input->post('sort');
    $search = trim($this->input->post('search'));

    if ($limit <= 0) { $limit = 50; }
    if ($offset < 0) { $offset = 0; }

    // =============================
    // SET TAHUN (DINAMIS)
    // =============================
    $tahun = date('Y');
    $awal  = $tahun . '-01-01 00:00:00';
    $akhir = $tahun . '-12-31 23:59:59';

    // =============================
    // QUERY DATA PETUGAS
    // =============================
    $this->db->select("
        p.id,
        p.no,
        p.nama,
        p.kategori,
        p.noktp,
        p.lokasi,
        p.target,
        p.area,
        p.alasan,
        p.aktif,
        p.created_at,
        p.kode_petugas,
        COALESCE(SUM(CAST(REPLACE(s.jumlah,'.','') AS UNSIGNED)),0) AS total_setoran
    ", false);

    $this->db->from('petugas_dev p');
    $this->db->join(
        'aspri_sts s',
        "s.no_urut = p.no
         AND s.waktu >= '$awal'
         AND s.waktu <= '$akhir'",
        'left'
    );

    $this->db->where('p.target >', 0);

    // SEARCH
    if ($search !== '') {
        $this->db->group_start()
            ->like('p.nama', $search)
            ->or_like('p.lokasi', $search)
            ->or_like('p.area', $search)
            ->or_like('p.kode_petugas', $search)
            ->group_end();
    }

    $this->db->group_by('p.id');

    // SORT
    switch ($sort) {
        case 'target_besar':
            $this->db->order_by('p.target', 'DESC');
            break;
        case 'target_kecil':
            $this->db->order_by('p.target', 'ASC');
            break;
        default:
            $this->db->order_by('p.id', 'ASC');
    }

    $this->db->limit($limit, $offset);
    $petugas = $this->db->get()->result_array();

    // =============================
    // TOTAL DATA (PAGING AKURAT)
    // =============================
    $this->db->from('petugas_dev p');
    $this->db->where('p.target >', 0);

    if ($search !== '') {
        $this->db->group_start()
            ->like('p.nama', $search)
            ->or_like('p.lokasi', $search)
            ->or_like('p.area', $search)
            ->or_like('p.kode_petugas', $search)
            ->group_end();
    }

    $total_petugas = $this->db->count_all_results();

    // =============================
    // RETURN JSON
    // =============================
    header('Content-Type: application/json');
    echo json_encode([
        'petugas'       => $petugas,
        'total_petugas' => $total_petugas,
    ]);
}

// overlay di dashboard
    public function detail_ajax($id = null)
{
  

    if ($id === null) {
        echo json_encode([
            'status' => 'error',
            'message' => 'ID Jukir tidak ditemukan'
        ]);
        return;
    }

    $jukirData = $this->Jukir_model->get_jukir_by_id($id);

    if (!$jukirData) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Jukir dengan ID tersebut tidak ditemukan'
        ]);
        return;
    }

    // === IDENTITAS ===
    $noKTP = $jukirData->no ?? null;

    // === TANGGAL TERAKHIR SETOR ===
    $tanggalTerakhirSetor = $this->Petugas_model->getTanggalTerakhirSetor($noKTP);
    $tanggalTerakhirSetorFormatted = $tanggalTerakhirSetor
        ? date('d/m/Y', strtotime($tanggalTerakhirSetor))
        : 'Belum ada setoran';

    // === TOTAL SETORAN ===
    $total_setoran = (int) $this->Petugas_model->hitungTotalSetoran($noKTP);

    // === TARGET ===
    $target_bulanan = (int) str_replace('.', '', $jukirData->target);
    $target_tahunan = $target_bulanan * 12;

    // === SISA ===
    $sisa_setoran = max(0, $target_tahunan - $total_setoran);

    // === CEK SETOR HARI INI ===
    $today = date('Y-m-d');
    $isAlreadySetorToday = $this->Petugas_model->isAlreadySetorToday($noKTP, $today);

    echo json_encode([
        'status' => 'ok',
        'data' => [
            'total_setoran' => $total_setoran,
            'jukir' => [
                'nama'                 => $jukirData->nama ?? '-',
                'no'                   => $jukirData->no ?? '-',
                'kode_petugas'         => $jukirData->kode_petugas ?? '-',
                'noKTP'                => $jukirData->noktp ?? '-',
                'aktif'                => (int) ($jukirData->aktif ?? 0),
                'foto'                 => $jukirData->foto ?? null,
                'lokasi'               => $jukirData->lokasi ?? '-',
                'target'               => $jukirData->target ?? '-',
                'tanggalTerakhirSetor' => $tanggalTerakhirSetorFormatted,
                'sisaSetoran'          => $sisa_setoran,
                'isAlreadySetorToday'  => $isAlreadySetorToday
            ]
        ]
    ]);
}






   public function get_users() {
        $search = $this->input->post('search');
        $users = $this->User_model->get_users($search);
        echo json_encode($users);
    }

public function edit_petugas($id) {
     $this->check_login(); 
    // Load data based on $id and pass it to edit view
    $data['petugas_id'] = $id;
     // Fetch officer data by ID
     $data['petugas'] = $this->Petugas_model->get_petugas_by_id($id);

     // Fetch location data (if needed)
     $data['lokasi'] = $this->Petugas_model->get_all_lokasi();
     $this->load->view('internal/_head');
    $this->load->view('admin/edit_petugas', $data);
}

public function search_petugas() {
    $keyword = $this->input->post('keyword'); // Ambil keyword pencarian dari POST data

    // Lakukan pencarian data petugas berdasarkan keyword
    $this->db->like('nama', $keyword); // Ubah 'nama' sesuai dengan kolom yang ingin Anda cari
    $query = $this->db->get('petugas_dev');
    
    $data['petugas'] = $query->result_array();
    $data['total_petugas'] = $query->num_rows(); // Hitung jumlah data hasil pencarian

    // Tambahkan nama lokasi berdasarkan no lokasi
    foreach ($data['petugas'] as &$row) {
        $nama_lokasi = $this->Lokasi_model->get_nama_by_no($row['lokasi']);
        $row['lokasi'] = $nama_lokasi;
    }

    header('Content-Type: application/json'); // Set response content type to JSON
    echo json_encode($data); // Kembalikan hasil pencarian dalam bentuk JSON
}

    
    public function add_petugas() {
        $data = array(
            'no' => $this->input->post('no'),
            'nama' => $this->input->post('nama'),
            'noktp' => $this->input->post('noktp'),
            'lokasi' => $this->input->post('lokasi'),
            'area' => $this->input->post('area'),
            'kesanggupan' => $this->input->post('kesanggupan'),
            // 'alasan' => $this->input->post('alasan'),
            'aktif' => $this->input->post('aktif')
        );

        $this->db->insert('petugas_dev', $data);

        echo json_encode(array("status" => TRUE));
    }

 
public function get_petugas_by_id($id) {
    $petugas = $this->Petugas_model->get_petugas_by_id($id);
    echo json_encode(['status' => 'success', 'petugas' => $petugas]);
}
public function update_petugas($id) {
    $this->form_validation->set_rules('no', 'No', 'required|trim');
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('noktp', 'No KTP', 'required|trim');
    $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
    $this->form_validation->set_rules('area', 'Area', 'required|trim');
    $this->form_validation->set_rules('kesanggupan', 'Target (Per Tahun)', 'required|trim');
    $this->form_validation->set_rules('aktif', 'Aktif', 'required|trim|in_list[0,1]');

    if ($this->form_validation->run() == FALSE) {
        $this->edit_petugas($id);
    } else {
        // Menghapus titik dari input kesanggupan sebelum menyimpan ke database
        $kesanggupan = str_replace('.', '', $this->input->post('kesanggupan'));

        $data = [
            'no' => $this->input->post('no'),
            'nama' => $this->input->post('nama'),
            'noktp' => $this->input->post('noktp'),
            'lokasi' => $this->input->post('lokasi'),
            'area' => $this->input->post('area'),
            'target' => $this->input->post('target'), // Gunakan variabel $kesanggupan yang sudah dihapus titiknya
            'aktif' => $this->input->post('aktif')
        ];

        $result = $this->Petugas_model->update_petugas($id, $data);

        if ($result) {
            $this->session->set_flashdata('success', 'Data petugas berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data petugas. Silakan coba lagi.');
        }

        redirect('petugas');
    }
}

    // Endpoint untuk datatable rekap setoran bulanan
    public function get_setoran_petugas()
    {
        $tahun = $this->input->get('tahun'); // opsional ?tahun=2024
        $data  = $this->Setoran_model->get_setoran_bulanan_petugas($tahun);

        // Kembalikan sebagai JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    public function delete_petugas() {
        $id = $this->input->post('id'); // Ganti 'no' menjadi 'id'
        $this->Petugas_model->delete_petugas($id); // Sesuaikan pemanggilan dengan parameter 'id'
        echo json_encode(['status' => 'success']);
    }

    public function add_user() {
         $this->check_login(); 
         $this->load->view('internal/_head'); // Load header
        $this->load->view('admin/add_user');
    }
    
    public function list_user() {
         $this->check_login(); 
        $this->load->view('internal/_head'); // Load header
        $this->load->view('admin/user_list');
    }

    public function save_user() {
        // Validasi form
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user_aspri.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke form dengan pesan error
            $this->load->view('admin/add_user');
        } else {
            // Ambil data dari form
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $nama = $this->input->post('nama');
            $jabatan = $this->input->post('jabatan');

            // Enkripsi password sebelum disimpan ke database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Simpan data ke dalam database melalui model
            $data = array(
                'username' => $username,
                'password' => $hashed_password,
                'nama' => $nama,
                'jabatan' => $jabatan
            );

            $this->User_model->save_user($data);

            // Redirect ke halaman daftar user atau ke halaman lain yang diinginkan
            redirect('petugas/list_user'); // Sesuaikan dengan URL halaman daftar user
        }
    }
    
    
}
