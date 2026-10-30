<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Device_checker {

    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->library('user_agent');
    }

    public function is_android() {
        return $this->CI->agent->is_platform('Android');
    }

}
