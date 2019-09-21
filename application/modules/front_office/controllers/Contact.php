<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function index()
    {
        $cek_session = !empty($this->session->userdata('user')) ? $this->session->userdata('user')['user_id'] : null;
        $data = [
            'title' => 'Contact',
            'user' => get_user_login($cek_session)
        ];

        $this->template->display('contact/index', $data);
    }

}

/* End of file Contact.php */
