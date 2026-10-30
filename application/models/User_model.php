<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function save_user($data) {
        // Simpan data user ke dalam database
        $this->db->insert('user_aspri', $data);
    }

     // Method untuk mengambil data user berdasarkan username
     public function get_user_by_username($username) {
        $query = $this->db->get_where('user_aspri', array('username' => $username));
        return $query->row(); // Mengembalikan satu baris hasil query
    }

    public function cek_login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        return $this->db->get('user_aspri')->row();
    }
    
  
    public function get_users($search = '') {
        $this->db->like('username', $search);
        $this->db->or_like('jabatan', $search);
        $query = $this->db->get('user_aspri');
        return $query->result_array();
    }
}
?>
