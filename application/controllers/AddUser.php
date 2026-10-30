<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adduser extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model yang dibutuhkan
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('admin/add_user');
    }

    public function save_user() {
        // Validasi form
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user_aspri.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
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
            $hashed_password = md5($password);
    
            // Simpan data ke dalam database melalui model
            $data = array(
                'username' => $username,
                'password' => $hashed_password,
                'nama' => $nama,
                'jabatan' => $jabatan
            );
    
            $this->User_model->save_user($data);
    
            // Redirect ke halaman daftar user atau ke halaman lain yang diinginkan
            redirect('admin/user_list'); // Sesuaikan dengan URL halaman daftar user
        }
    }
    

}
?>
