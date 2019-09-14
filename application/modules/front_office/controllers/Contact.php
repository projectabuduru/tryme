<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function index()
    {
        $data = [
            'title' => 'Contact',
        ];

        $this->template->display('contact/index', $data);
    }

}

/* End of file Contact.php */
