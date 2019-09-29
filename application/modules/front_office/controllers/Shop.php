<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->id_user = !empty($this->session->userdata('user')) ? $this->session->userdata('user') : null;
        $this->ip = $this->input->ip_address();
        $this->load->model('Mod_product', 'product');
        
    }

    public function index()
    {
        
    }

    public function get_shop(){
        $data = $this->product->all_product($this->id_user['role']);
        echo res_true($data); return;
    }

}

/* End of file Shop.php */
