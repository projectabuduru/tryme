<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('M_global', 'global');
        $this->load->model('Mod_product', 'product');
        $this->id_user = $this->session->userdata('user');
    }
    
    // private $table = 'data_product dap';
    private $title = 'Beranda';

    public function index()
    {
        try {
            
            $cek_session = !empty($this->session->userdata('user')) ? $this->session->userdata('user')['user_id'] : null;
            $records = [
                'feature_product' => $this->product->feature_product($this->id_user['role']),
                'all_product' => $this->product->all_product($this->id_user['role'])
            ];
            // pre($records);
            $data = [
                'title' => $this->title,
                'user' => get_user_login($cek_session),
                'data' => $records,
            ];
            // pre($data);
            $this->template->display('home/index', $data);

        } catch (\UserException $e) {
            pre(['error' => $e]);
        }
        
    }

}

/* End of file Home.php */
