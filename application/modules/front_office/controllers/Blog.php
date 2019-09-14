<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function index()
    {
        $data = [
            'title' => 'Blog'
        ];
        // pre($data);
        $this->template->display('blog/index', $data);
    }

}

/* End of file Blog.php */
