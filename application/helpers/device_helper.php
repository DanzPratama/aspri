<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function is_android() {
    $CI =& get_instance();
    $CI->load->library('user_agent');

    // Mendapatkan User Agent
    $user_agent = $CI->input->user_agent();

    // Pengecekan apakah User Agent mengandung kata "Android"
    return stripos($user_agent, 'Android') !== false;
}
