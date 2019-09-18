<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_partner extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('user')){
            $this->sesion->session_destroy();
        }
    }
    
    private $title = 'Sales Partner';
    public function index()
    {
        $cek_session = !empty($this->session->userdata('user')) ? $this->session->userdata('user')['user_id'] : null;

        $data = [
            'title' => $this->title,
            'user' => get_user_login($cek_session)
        ];

        $this->template->display('sales/index', $data);
    }

}

/* End of file Sales_partner.php */
