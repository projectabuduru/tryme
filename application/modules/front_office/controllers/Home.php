<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
    }
    

    public function index()
    {
        try {
            
            $cek_session = !empty($this->session->userdata('user')) ? $this->session->userdata('user')['user_id'] : null;
            
            $data = [
                'title' => 'Beranda',
                'user' => get_user_login($cek_session)
            ];
            // pre($data);
            $this->template->display('home/index', $data);
            
        } catch (\Exception $e) {
            
            logging_function($e->getMessage());
            throw $e;
            pre($e);
        }
        
    }

}

/* End of file Home.php */
