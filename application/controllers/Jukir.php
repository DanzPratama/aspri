<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jukir extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load form_validation library
        $this->load->library('form_validation');
        $this->load->model('Petugas_model');
        $this->load->model('Jukir_model');
    }
    
     private function check_login() {
        // Periksa apakah pengguna sudah login
        if (!$this->session->userdata('logged_in')) {
            // Jika belum login, arahkan ke halaman login
            redirect('login');
        }
     }
    public function index() {
             $this->check_login(); 
        $this->load->view('admin/jukir_cari');
    }
    public function pendapatan() {
             $this->check_login(); 
        $this->load->view('admin/jukir_pendapatan');
    }
    
    public function nama() {
        $this->load->view('admin/jukir_cari_nama');
    }
    
    public function detail_nama($id = null)
{
    if ($id === null) {
        $this->session->set_flashdata('jukir_not_found', 'ID Jukir tidak ditemukan.');
        redirect('aspri/jukir');
    }

    $jukirData = $this->Jukir_model->get_jukir_by_id($id);

    if (!$jukirData) {
        $this->session->set_flashdata('jukir_not_found', 'Jukir dengan ID tersebut tidak ditemukan.');
        redirect('aspri/jukir');
    }

    // === IDENTITAS UTAMA ===
    $noKTP = $jukirData->no ?? null;

    // === TANGGAL TERAKHIR SETOR ===
    $tanggalTerakhirSetor = $this->Petugas_model->getTanggalTerakhirSetor($noKTP);
    $tanggalTerakhirSetorFormatted = $tanggalTerakhirSetor
        ? date('d/m/Y', strtotime($tanggalTerakhirSetor))
        : 'Belum ada setoran';

    // === TOTAL SETORAN ===
    $total_setoran = (int) $this->Petugas_model->hitungTotalSetoran($noKTP);

    // === TARGET BULANAN (PASTIKAN NUMERIC) ===
    $target_bulanan = (int) str_replace('.', '', $jukirData->target);
    $target_tahunan = $target_bulanan * 12;

    // === SISA SETORAN ===
    $sisa_setoran = $target_tahunan - $total_setoran;
    if ($sisa_setoran < 0) {
        $sisa_setoran = 0;
    }

    // === CEK SUDAH SETOR HARI INI ===
    $today = date('Y-m-d');
    $isAlreadySetorToday = $this->Petugas_model->isAlreadySetorToday($noKTP, $today);

    // === DATA VIEW ===
    $data = [
        'total_setoran' => $total_setoran,
        'jukir' => [
            'nama'                   => $jukirData->nama ?? '-',
            'no'                   => $jukirData->no ?? '-',
            'kode_petugas'           => $jukirData->kode_petugas ?? '-',
            'noKTP'                  => $jukirData->noktp ?? '-',
            'aktif'                  => (int) ($jukirData->aktif ?? 0),
            'foto'                   => $jukirData->foto ?? null,
            'lokasi'                 => $jukirData->lokasi ?? '-',
            'target'         => $jukirData->target?? '-',
            'tanggalTerakhirSetor'   => $tanggalTerakhirSetorFormatted,
            'sisaSetoran'            => $sisa_setoran,
            'isAlreadySetorToday'    => $isAlreadySetorToday
        ]
    ];

    $this->load->view('admin/jukir_detail', $data);
}

public function harian($id_jukir)
{
    $this->check_login();

    // ===============================
    // DATA JUKIR
    // ===============================
    $jukir = $this->db
        ->where('id', $id_jukir)
        ->get('petugas_dev')
        ->row();

    if (!$jukir) {
        show_404();
    }

    // ===============================
    // TAHUN AKTIF (TAHUN SEKARANG)
    // ===============================
    $tahun = date('Y');
    $awal_tahun = $tahun . '-01-01 00:00:00';
    $akhir_tahun = $tahun . '-12-31 23:59:59';

    // ===============================
    // TOTAL SETORAN TAHUN INI SAJA
    // ===============================
    $this->db->select("SUM(CAST(REPLACE(jumlah,'.','') AS UNSIGNED)) as total", false);
    $this->db->from('aspri_sts');
    $this->db->where('no_urut', $jukir->no);
    $this->db->where('waktu >=', $awal_tahun);
    $this->db->where('waktu <=', $akhir_tahun);

    $total_setoran_tahun_ini = (int) ($this->db->get()->row()->total ?? 0);

    // ===============================
    // TARGET HARIAN (365 HARI)
    // ===============================
    $target_tahunan = (int) preg_replace('/[^0-9]/', '', $jukir->target);
    $target_harian  = $target_tahunan > 0 ? ($target_tahunan / 30) : 0;

    // ===============================
    // TOTAL HARI SETOR (TAHUN INI)
    // ===============================
    $total_hari_setor = $target_harian > 0
        ? floor($total_setoran_tahun_ini / $target_harian)
        : 0;

    // ===============================
    // PREV & NEXT JUKIR
    // ===============================
    $prev = $this->db
        ->select('id')
        ->where('id <', $id_jukir)
        ->order_by('id', 'DESC')
        ->limit(1)
        ->get('petugas_dev')
        ->row();

    $next = $this->db
        ->select('id')
        ->where('id >', $id_jukir)
        ->order_by('id', 'ASC')
        ->limit(1)
        ->get('petugas_dev')
        ->row();

    $prev_id = $prev ? $prev->id : null;
    $next_id = $next ? $next->id : null;

    // ===============================
    // DATA KE VIEW (BERSIH)
    // ===============================
$data = [
    'jukir'                   => $jukir,
    'tahun'                   => $tahun,
    'target_harian'           => $target_harian,
    'total_hari_setor'        => $total_hari_setor,
    'total_setoran_tahun_ini' => $total_setoran_tahun_ini, // ⬅️ INI KUNCINYA
    'prev_id'                 => $prev_id,
    'next_id'                 => $next_id,
];


    $this->load->view('internal/_head');
    $this->load->view('internal/jukir_setoran_harian', $data);
}

public function harian_ajax($id)
{
    if (ob_get_level() > 0) {
    ob_clean();
} // ⬅️ PENTING
    header('Content-Type: application/json');

    $this->check_login();

    $jukir = $this->db->where('id', $id)->get('petugas_dev')->row();
    if (!$jukir) {
        echo json_encode(['status' => false]);
        exit;
    }

    $tahun = date('Y');
    $awal  = "$tahun-01-01 00:00:00";
    $akhir = "$tahun-12-31 23:59:59";

    $this->db->select("SUM(CAST(REPLACE(jumlah,'.','') AS UNSIGNED)) total", false);
    $this->db->where('no_urut', $jukir->no);
    $this->db->where('waktu >=', $awal);
    $this->db->where('waktu <=', $akhir);
    $total = (int) ($this->db->get('aspri_sts')->row()->total ?? 0);

    $target_tahun  = (int) preg_replace('/[^0-9]/', '', $jukir->target);
    $target_harian = $target_tahun > 0 ? $target_tahun / 30 : 0;
   $hari_setor = 0;

if ($target_harian > 0) {
    $hari_setor = intdiv($total, $target_harian);
}




    echo json_encode([
        'status'         => true,
        'nama'           => $jukir->nama,
        'target'           => $jukir->target,
        'lokasi'         => $jukir->lokasi,
        'target_harian'  => number_format($target_harian,0,',','.'),
        'total_setoran'  => number_format($total,0,',','.'),
        'hari_setor'     => $hari_setor,
        'tahun'          => $tahun
    ]);
    exit; // ⬅️ WAJIB
}




public function kalender_setoran()
{
    $this->check_login();
    header('Content-Type: application/json');

    $id_jukir = $this->input->post('id_jukir');
    $bulan    = $this->input->post('bulan'); // YYYY-MM

    if (!$id_jukir || !$bulan) {
        echo json_encode(['hari' => 0]);
        return;
    }

    $jukir = $this->db->where('id', $id_jukir)->get('petugas_dev')->row();
    if (!$jukir) {
        echo json_encode(['hari' => 0]);
        return;
    }

    // ===============================
    // RANGE BULAN
    // ===============================
    $awal_bulan  = $bulan . '-01 00:00:00';
    $akhir_bulan = date('Y-m-t 23:59:59', strtotime($awal_bulan));

    // ===============================
    // TARGET TAHUNAN → TARGET HARIAN
    // ===============================
    $target_tahunan = (int) str_replace(
        '.',
        '',
        preg_replace('/[^0-9.]/', '', $jukir->target)
    );

    if ($target_tahunan <= 0) {
        echo json_encode(['hari' => 0]);
        return;
    }

    // INI KUNCINYA 🔥
    $target_harian = floor($target_tahunan / 30);

    if ($target_harian <= 0) {
        echo json_encode(['hari' => 0]);
        return;
    }

    // ===============================
    // TOTAL SETORAN BULAN INI
    // ===============================
    $this->db->select("SUM(CAST(REPLACE(jumlah,'.','') AS UNSIGNED)) as total", false);
    $this->db->from('aspri_sts');
    $this->db->like('nama_petugas', trim($jukir->nama));
    $this->db->where('waktu >=', $awal_bulan);
    $this->db->where('waktu <=', $akhir_bulan);

    $total_setoran_bulan = (int) ($this->db->get()->row()->total ?? 0);

    // ===============================
    // HITUNG HARI SETOR (BULAN)
    // ===============================
    $hari_setor = floor($total_setoran_bulan / $target_harian);

    // ===============================
    // BATASI JUMLAH HARI DALAM BULAN
    // ===============================
    $tahun = (int) substr($bulan, 0, 4);
    $bulan_ke = (int) substr($bulan, 5, 2);

    $max_hari = cal_days_in_month(CAL_GREGORIAN, $bulan_ke, $tahun);

    if ($hari_setor > $max_hari) {
        $hari_setor = $max_hari;
    }

    echo json_encode([
        'hari' => $hari_setor
    ]);
}





public function simpan_setoran()
{
    // ===== VALIDASI =====
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('kode', 'No KTP', 'required');
 //   $this->form_validation->set_rules('bulan', 'Bulan', 'required');
    $this->form_validation->set_rules('setoran', 'Setoran', 'required|numeric');

 if ($this->form_validation->run() === FALSE) {

    $this->session->set_flashdata(
        'error',
        '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg text-sm">
            <b>Gagal menyimpan setoran</b><br>'
            . validation_errors('<div>• ', '</div>') .
        '</div>'
    );

    redirect($_SERVER['HTTP_REFERER']);
    return;
}


    // ===== AMBIL DATA =====
    $nama      = $this->input->post('nama');
    $kode      = $this->input->post('kode');
    // $bulan     = $this->input->post('bulan');
    $setoran   = $this->input->post('setoran');
    $kolektor  = $this->input->post('kolektor');
    $lokasi    = $this->input->post('lokasi');
    $detail_lokasi = json_decode(
    $this->input->post('detail_lokasi'),
    true
);

    // ===== GENERATE NOTRANSAKSI =====
    $sql = "SELECT notransaksi 
            FROM setoran_aspri 
            ORDER BY CAST(SUBSTRING(notransaksi, 7) AS UNSIGNED) DESC 
            LIMIT 1";
    $query = $this->db->query($sql);
    $last  = $query->row();

    if ($last && isset($last->notransaksi)) {
        preg_match('/ASPRI-(\d+)/', $last->notransaksi, $m);
        $num = isset($m[1]) ? (int)$m[1] + 1 : 1001;
        $notransaksi = 'ASPRI-' . str_pad($num, 4, '0', STR_PAD_LEFT);
    } else {
        $notransaksi = 'ASPRI-1001';
    }

    date_default_timezone_set('Asia/Jakarta');

    $data = [
        'notransaksi'  => $notransaksi,
        'nama_petugas' => $nama,
        'kode_petugas' => $kode,
       // 'bulan'        => $bulan,
        'total_stor'   => $setoran,
        'kolektor'     => $kolektor,
        'lokasi'       => $lokasi,
        'waktu_setor'  => date('Y-m-d H:i:s')
    ];
if ($this->Petugas_model->simpan_setoran($data)) {

    // Jika ada detail lokasi (multi lokasi)
    if (is_array($detail_lokasi) && count($detail_lokasi) > 0) {

        foreach ($detail_lokasi as $d) {

            $this->db->insert('setoran_aspri_detail', [

                'notransaksi' => $notransaksi,
                'lokasi'      => trim($d['lokasi']),
                'nominal'     => (float)$d['nominal']

            ]);

        }

    } else {

        // Fallback untuk 1 lokasi
        $this->db->insert('setoran_aspri_detail', [

            'notransaksi' => $notransaksi,
            'lokasi'      => $lokasi,
            'nominal'     => (float)$setoran

        ]);

    }

    redirect('print/' . urlencode($notransaksi));

} else {

    $this->session->set_flashdata(
        'error',
        '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg text-sm">
            Gagal menyimpan data setoran.
        </div>'
    );

    redirect($this->agent->referrer());

}

}
    
    


    
public function struk($kode, $setoran, $nama_encoded, $kolektor_encoded, $lokasi_encoded, $notransaksi) {
    $nama = urldecode($nama_encoded);
    $kolektor = urldecode($kolektor_encoded);
    $lokasi = urldecode($lokasi_encoded);

    // Mendapatkan tanggal dan waktu saat ini
    $now = new DateTime();
    $tanggal = $now->format('d/m/Y');
    $waktu = $now->format('H:i:s');

    // Load helper terbilang
    $this->load->helper('terbilang');

    // Tambahkan data terbilang
    $terbilang = terbilang((int)$setoran);
    if ($petugas_id > 999) {

    $this->db->select('lokasi, SUM(total_stor) as total');
    $this->db->from('setoran_aspri');
    $this->db->where('notransaksi', $kode);
    $this->db->group_by('lokasi');
    $this->db->order_by('lokasi','ASC');

    $data['rincian_lokasi'] = $this->db->get()->result();

} else {
    $data['rincian_lokasi'] = [];
}
    // Mengirim data ke view
    $data = array(
        'kode' => $kode,
        'setoran' => $setoran,
        'tanggal' => $tanggal,
        'waktu' => $waktu,
        'nama' => $nama,
        'kolektor' => $kolektor,
        'lokasi' => $lokasi,
        'notransaksi' => $notransaksi,
        'terbilang' => $terbilang
    );
    
    $data['rincian_lokasi'] = [];

if ($petugas_id > 999) {
    $this->db->select('lokasi, SUM(total_stor) AS total');
    $this->db->from('setoran_aspri');
    $this->db->where('notransaksi', $kode);
    $this->db->group_by('lokasi');

    $data['rincian_lokasi'] = $this->db->get()->result();
}

    $this->load->view('admin/struk_nonbendahara', $data);
}
  public function cetak($kode)
{
    // Ambil data setoran
    $this->db->select('*');
    $this->db->from('setoran_aspri');
    $this->db->where('notransaksi', $kode);
    $this->db->order_by('waktu_setor', 'DESC');
    $this->db->limit(1);

    $row = $this->db->get()->row();

    if (!$row) {
        show_error('Data setoran tidak ditemukan');
    }

    // ================================
    // Ambil data target petugas
    // setoran_aspri.kode_petugas = petugas_dev.no
    // ================================
    $petugas = $this->db
        ->where('no', $row->kode_petugas)
        ->get('petugas_dev')
        ->row();

 $petugas_id = 0;
$target = 0;

if ($petugas) {
    $petugas_id = (int)$petugas->id;

    $nilaiTarget = trim($petugas->target);

    if (preg_match('/^\d{1,3}(\.\d{3})+$/', $nilaiTarget)) {
        $target = (int) str_replace('.', '', $nilaiTarget);
    } else {
        $target = (int) floatval($nilaiTarget);
    }
}

    // ================================
    // Nominal setoran
    // ================================
    $setoran = (int)$row->total_stor;

    // ================================
    // Status target
    // ================================
    $target_tercapai = ($setoran >= $target);
    $selisih = max(0, $target - $setoran);

    // ================================
    // Waktu cetak
    // ================================
    date_default_timezone_set('Asia/Jakarta');

    $tanggal = date('d/m/Y');
    $waktu   = date('H:i:s');
    
    // ================================
// Ambil detail lokasi
// ================================
$detail = $this->db
    ->where('notransaksi', $kode)
    ->get('setoran_aspri_detail')
    ->result();
    // Helper terbilang
    $this->load->helper('terbilang');

    // Kirim ke view
    $data = [
        'kode'             => $row->kode_petugas,
        'setoran'          => $setoran,
        'target'           => $target,
        'target_tercapai'  => $target_tercapai,
        'selisih'          => $selisih,
        'tanggal'          => $tanggal,
        'waktu'            => $waktu,
        'nama'             => $row->nama_petugas,
        'kolektor'         => $row->kolektor,
        'lokasi'           => $row->lokasi,
        'notransaksi'      => $row->notransaksi,
        'waktu_setor'      => $row->waktu_setor,
        'detail' => $detail,
        'petugas_id' => $petugas_id,
        'terbilang'        => terbilang($setoran)
    ];
    $userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);

$data['isAndroid'] = strpos($userAgent, 'android') !== false;
    
    
    $this->load->view('admin/struk', $data);
}

        public function setoran() {
        $this->check_login(); // Memeriksa login sebelum memuat halaman internal_petugas
        $this->load->view('internal/_head');
        $this->load->view('internal/jukir_setoran');
    }
    
    
    public function cari_nama()
{
    $nama = $this->input->post('nama');
    
    // Load model jukir
    $this->load->model('Jukir_model');
    
    // Ambil daftar jukir berdasarkan nama
    $result = $this->Jukir_model->get_by_name($nama);
    
    if (!empty($result)) {
        $data['jukir'] = $result;
        $this->load->view('admin/jukir_list', $data); // Tampilkan hasil pencarian di view jukir_list.php
    } else {
        $this->session->set_flashdata('jukir_not_found', 'Nama Jukir tidak ditemukan.');
        redirect('jukir');
    }
}

public function cari_nama_ajax()
{
if (!$this->input->is_ajax_request() && php_sapi_name() !== 'cli') {
    show_404();
}


    $nama = $this->input->post('nama');

    $this->load->model('Jukir_model');
    $jukir = $this->Jukir_model->get_by_name($nama);

    header('Content-Type: application/json');

    if ($jukir) {
        echo json_encode([
            'status' => 'ok',
            'data'   => $jukir
        ]);
    } else {
        echo json_encode([
            'status'  => 'empty',
            'message' => 'Nama Jukir tidak ditemukan'
        ]);
    }
}


}


    
