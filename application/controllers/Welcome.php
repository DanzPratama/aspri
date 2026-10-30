<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session'); // Load session library
        $this->load->database(); // Load database
        $this->load->model('User_model'); // Load User_model
        $this->load->model('Setoran_model'); // Load Setoran_model
        $this->load->helper('device_helper'); // Load custom helper
        $this->load->helper('terbilang'); 
        $this->load->library('user_agent'); // Load user_agent library
    }

    public function index() {
        // Initialize $data array
        $data = array();
        
        // Periksa apakah pengguna sudah login
        if ($this->session->userdata('logged_in')) {
            // Tentukan halaman aktif berdasarkan URL atau nama method
            $data['activePage'] = "home";
            
            // Redirect to the dashboard with data
            redirect('dashboard', $data);
        } else {
            // Load the dashboard view with data
            $this->load->view('login', $data);
        }
    }
public function login() {
    // Memuat library session
    $this->load->library('session');
    
    // Memeriksa apakah session sudah ada
    if ($this->session->userdata('logged_in')) {
        // Jika session sudah ada, arahkan ke dashboard
        redirect('/dashboard');
    } else {
        // Jika belum ada session, tampilkan halaman login
        $this->load->view('login');
    }
}

     public function login_web() {
        $this->load->view('login');
    }
    
 public function proses() {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    // Cari user berdasarkan username di database
    $user = $this->User_model->get_user_by_username($username);

    if ($user) {
        // Jika user ditemukan, verifikasi password
        if (password_verify($password, $user->password)) {
            // Simpan data user ke session
            $userdata = array(
                'user_id' => $user->id,
                'username' => $user->username,
                'nama' => $user->nama,
                'jabatan' => $user->jabatan,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($userdata);

            // **Deteksi apakah login menggunakan Windows**
            $user_agent = $this->input->user_agent();
  

            // Redirect sesuai dengan jabatan
            if ($user->jabatan == 'Admin' || $user->jabatan == 'Superadmin' || $user->jabatan == 'Kepala UPTD Parkir') {
                redirect('internal');
            } else {
                redirect('dashboard');
            }
        } else {
            $this->session->set_flashdata('error', 'Password Salah');
            redirect('login');
        }
    } else {
        $this->session->set_flashdata('error', 'Akun Tidak Terdaftar');
        redirect('login');
    }
}



    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
    
    public function dashboard() {
    $this->check_login();

    $this->load->model('Setoran_model');

    $nama_petugas = $this->session->userdata('nama');

    // transaksi terbaru (limit 5)
    $this->db->select('waktu_setor, nama_petugas, lokasi, total_stor');
    $this->db->from('setoran_aspri');
    $this->db->where('kolektor', $nama_petugas);
    $this->db->order_by('waktu_setor', 'DESC');
    $this->db->limit(3);
    $data['transaksi_terbaru'] = $this->db->get()->result();

    // TOTAL HARI INI (PAKAI MODEL – BENAR)
    $data['total_transaksi_hari_ini']  =
        $this->Setoran_model->get_total_transaksi_hari_ini($nama_petugas);

    $data['total_pendapatan_hari_ini'] =
        $this->Setoran_model->get_total_pendapatan_hari_ini($nama_petugas);
    $jabatan = $this->session->userdata('jabatan');

if (
    $jabatan === 'Admin'
) {
    redirect('internal');
}
    // Ambil daftar petugas untuk dropdown STS manual
$data['petugas'] = $this->db
    ->select('id, no, nama, lokasi')
    ->from('petugas_dev')
    ->order_by('nama', 'ASC')
    ->get()
    ->result();

    $this->load->view('admin/dashboard', $data);
}

public function setoran() {
     $this->check_login(); 
    $this->load->model('Jukir_model');
    $this->load->library('pagination');

    $kolektor = $this->session->userdata('nama');
    $config['base_url'] = site_url('transaksi');
    $config['total_rows'] = $this->Jukir_model->count_all_setoran_by_kolektor($kolektor);
    $config['per_page'] = 30;
    $config['uri_segment'] = 3;
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

    $setoran = $this->Jukir_model->get_setoran_by_kolektor($kolektor, $config['per_page'], $page);

    if ($this->input->is_ajax_request()) {
        $pagination_links = $this->pagination->create_links();
        echo json_encode([
            'setoran' => $setoran,
            'pagination' => $pagination_links
        ]);
        return;
    }

    $data['setoran'] = $setoran;
    $data['pagination'] = $this->pagination->create_links();
    
    $this->check_login();
    $this->load->view('admin/setoran', $data);
}






    public function detail() {
        $this->check_login(); // Memeriksa login sebelum memuat halaman detail
        $this->load->view('admin/detail');
    }

    // Method untuk memeriksa apakah pengguna sudah login
   // Method untuk memeriksa apakah pengguna sudah login
    private function check_login() {
    if (!$this->session->userdata('logged_in')) {
        $this->session->set_flashdata('error', 'Ehh login hela atuh');
        redirect('login');
    }
}


  public function internal() {
    $this->check_login();
    
    $this->load->model('Setoran_model');
     $data['pendapatan'] = $this->Setoran_model->get_pendapatan_per_ruas_jalan();

    $total_hari_ini = $this->Setoran_model->get_total_setoran_today();
    $total_kemarin = $this->Setoran_model->get_total_setoran_yesterday();
    $total_minggu = $this->Setoran_model->get_total_setoran_week();
    $total_lastweek = $this->Setoran_model->get_total_setoran_last_week();
    $total_bulan_ini = $this->Setoran_model->get_total_setoran_this_month();
    $total_bulan_lalu = $this->Setoran_model->get_total_setoran_last_month();
    $total_tahun_ini = $this->Setoran_model->get_total_setoran_this_year(); // Tambahkan baris ini
    $target_tahun = $this->Setoran_model->get_target_tahun_ini();
    $target_bulan_ni = $this->Setoran_model->get_target_bulan_ini(); // Tambahkan baris ini

    // Menghitung Realisasi Bulanan
    if ($target_bulan_ni > 0) {
        $realisasi = ($total_bulan_ini / $target_bulan_ni) * 100;
    } else {
        $realisasi = 0;
    }

    // Menghitung persentase peningkatan dibandingkan kemarin
    if ($total_kemarin > 0) {
        $data['persentase_peningkatan'] = (($total_hari_ini - $total_kemarin) / $total_kemarin) * 100;
    } elseif ($total_hari_ini > 0 && $total_kemarin == 0) {
        $data['persentase_peningkatan'] = 100; // Mengatur ke 100% jika tidak ada data kemarin
    } else {
        $data['persentase_peningkatan'] = 0;
    }

    // Menghitung persentase peningkatan dibandingkan bulan lalu
    if ($total_bulan_lalu > 0) {
        $data['persentase_peningkatan_bulan'] = (($total_bulan_ini - $total_bulan_lalu) / $total_bulan_lalu) * 100;
    } elseif ($total_bulan_ini > 0 && $total_bulan_lalu == 0) {
        $data['persentase_peningkatan_bulan'] = 100;
    } else {
        $data['persentase_peningkatan_bulan'] = 0;
    }

   // Menghitung Realisasi Tahunan
    if ($target_tahun > 0) {
        $realisasi_tahunan = ($total_tahun_ini / 2000006000) * 100;
    } else {
        $realisasi_tahunan = 0;
    }


    // Menghitung target harian
    $target_harian = $target_tahun / 365; // Target harian

    // Menghitung persentase realisasi harian
    if ($target_harian > 0) {
        $realisasi_harian_persen = ($total_hari_ini / $target_harian) * 100;
    } else {
        $realisasi_harian_persen = 0;
    }

    // Format target harian dalam format rupiah
    $formatted_target_harian = number_format($target_harian, 0, ',', '.');

    $data['total_setoran_hari_ini'] = $total_hari_ini;
    $data['total_setoran_kemarin'] = $total_kemarin;
    $data['total_setoran_minggu'] = $total_minggu;
    $data['total_setoran_lastweek'] = $total_lastweek;
    $data['total_setoran_bulan_ini'] = $total_bulan_ini;
    $data['total_setoran_bulan_lalu'] = $total_bulan_lalu;
    $data['total_setoran_tahun_ini'] = $total_tahun_ini;
    $data['target_bulan_ini'] = $target_tahun;
    $data['target_bulan'] = $target_bulan_ni;
    $data['formatted_target'] = terbilang($target_tahun);
    $data['realisasi_tahunan'] = $realisasi_tahunan;
    $data['realisasi'] = $realisasi;
    $data['realisasi_harian_persen'] = $realisasi_harian_persen; // Tambahkan baris ini
    $data['formatted_target_harian'] = $formatted_target_harian; // Tambahkan baris ini

    $this->load->view('internal/_head');
    $this->load->view('internal/dashboard', $data);
}

public function get_realtime_setoran() {
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');
    header('Connection: keep-alive');

    $this->load->model('Setoran_model');

    // Ambil data terbaru
    $total_setoran_hari_ini = $this->Setoran_model->get_total_setoran_today();
    $total_setoran_kemarin = $this->Setoran_model->get_total_setoran_yesterday();
    $total_setoran_minggu = $this->Setoran_model->get_total_setoran_week();
    $total_setoran_lastweek = $this->Setoran_model->get_total_setoran_last_week();
    $total_setoran_bulan_ini = $this->Setoran_model->get_total_setoran_this_month();
    $total_setoran_tahun_ini = $this->Setoran_model->get_total_setoran_this_year();

    // Siapkan data yang akan dikirim dalam format JSON
    $data = [
        'total_setoran_hari_ini' => number_format($total_setoran_hari_ini, 0, ',', '.'),
        'total_setoran_kemarin' => number_format($total_setoran_kemarin, 0, ',', '.'),
        'total_setoran_minggu' => number_format($total_setoran_minggu, 0, ',', '.'),
        'total_setoran_lastweek' => number_format($total_setoran_lastweek, 0, ',', '.'),
        'total_setoran_bulan_ini' => number_format($total_setoran_bulan_ini, 0, ',', '.'),
        'total_setoran_tahun_ini' => number_format($total_setoran_tahun_ini, 0, ',', '.')
    ];

    // Kirim data dalam format SSE
    echo "data: " . json_encode($data) . "\n\n";

    flush();
}


    public function internal_petugas() {
        $this->check_login(); // Memeriksa login sebelum memuat halaman internal_petugas
        $this->load->view('internal/_head');
        $this->load->view('internal/petugas');
    }
    
    public function internal_titik() {
        $this->check_login(); // Memeriksa login sebelum memuat halaman internal_petugas
        $this->load->view('internal/_head');
        $this->load->view('internal/titik_jalan');
    }
    public function sts() {
        $this->check_login(); // Memeriksa login sebelum memuat halaman internal_petugas
        $this->load->view('internal/_head');
        $this->load->view('admin/sts_page');
    }

public function laporan_bku() {
    $this->check_login(); // Memeriksa login sebelum memuat halaman laporan_bku
    $this->load->model('Setoran_model');

    // Ambil data setoran dari database
    $setoran_aspri = $this->Setoran_model->get_setoran_kalender();

    // Array untuk menyimpan total setoran per tanggal
    $setoran_data = [];
    foreach ($setoran_aspri as $setoran) {
        // Ambil hanya tanggal dan jumlah setor dari waktu_setor
     // Ambil tanggal setoran
$tanggal = date('Y-m-d', strtotime($setoran->waktu_setor));

// Normalisasi nominal agar aman dijumlahkan
$jumlah_setor = (string) ($setoran->total_stor ?? '0');
$jumlah_setor = preg_replace('/[^\d-]/', '', $jumlah_setor);
$jumlah_setor = (int) ($jumlah_setor ?: 0);

// Akumulasi setoran per tanggal
if (!isset($setoran_data[$tanggal])) {
    $setoran_data[$tanggal] = 0;
}

$setoran_data[$tanggal] += $jumlah_setor;
    }

    // Kirim array ke view
    $data['setoran_data'] = json_encode($setoran_data); // Encode ke format JSON untuk JavaScript
    $this->load->view('internal/_head');
    $this->load->view('internal/kalender_setoran', $data);
}

    
public function laporan_pendapatan() {
    $this->check_login(); 
    $this->load->model('Jukir_model'); 

    $tanggal  = $this->input->get('tanggal');
    $kolektor = $this->input->get('kolektor'); // 🔥 ambil dari query string

    if ($kolektor) {
        // Jika ada filter kolektor, pakai ini
        $data['setoran'] = $this->Jukir_model->get_setoran_by_penagih($kolektor);
    } elseif ($tanggal) {
        // Filter tanggal (harian / range)
        if (strpos($tanggal, ',') !== false) {
            list($start_date, $end_date) = explode(',', $tanggal);
            $data['setoran'] = $this->Jukir_model->get_setoran_by_date_range($start_date, $end_date);
        } else {
            $data['setoran'] = $this->Jukir_model->get_setoran_by_date($tanggal);
        }
    } else {
        // Tanpa filter → semua
        $data['setoran'] = $this->Jukir_model->get_all_setoran();
    }

    // kirim juga nilai kolektor ke view biar bisa di-set di input
    $data['kolektor_filter'] = $kolektor;

    $this->load->view('internal/_head');
    $this->load->view('admin/laporan', $data);
}



    public function privacy() {
    
        $this->load->view('privacy');
    }

    // Method lain yang tidak memerlukan autentikasi
    public function check_kode_jukir() {
        $kode = $this->input->post('kode');
        $this->load->model('Jukir_model');
        $result = $this->Jukir_model->get_by_kode($kode);

        if ($result) {
            echo json_encode(['exists' => true]);
        } else {
            echo json_encode(['exists' => false]);
        }
    }

    public function struk() {
         $this->check_login(); 
        // Mengambil data transaksi dari form sebelumnya
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');
        $keterangan = $this->input->post('keterangan');
        $lokasi = $this->input->post('lokasi');

        // Data transaksi yang akan ditampilkan
        $data['transaksi'] = array(
            'tanggal' => $tanggal,
            'jumlah' => $jumlah,
            'keterangan' => $keterangan,
            'waktu_setor' => $waktu_setor,
            'lokasi' => $lokasi
        );

        // Load view dengan data transaksi
        $this->load->view('struk_nonbendahara', $data);
    }

}
