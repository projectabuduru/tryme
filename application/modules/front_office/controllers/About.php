<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
    private $title = 'About Us';

    public function index()
    {
        $cek_session = !empty($this->session->userdata('user')) ? $this->session->userdata('user')['user_id'] : null;
        
        $data = [
            'title' => $this->title,
            'user' => get_user_login($cek_session)
        ];

        $this->template->display('about/index', $data);
    }

}

/* End of file About.php */
