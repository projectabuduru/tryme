<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    public function index()
    {
        $data = [
            'title' => 'About Us'
        ];

        $this->template->display('about/index', $data);
    }

}

/* End of file About.php */
