<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Template_origin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    

    public function index()
    {
        $data = [
            'title' => 'Beranda'
        ];
        $this->template->display('template_content', $data);
    }

    public function origin(){
        $this->template->display('template');
    }


}

/* End of file Template_origin.php */
