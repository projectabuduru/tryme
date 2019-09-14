<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        try {
            
            $data = [
                'title' => 'Beranda',
            ];
            $this->template->display('home/index', $data);
            
        } catch (\Exception $e) {
            
            logging_function($e->getMessage());
            throw $e;
            pre($e);
        }
        
    }

}

/* End of file Home.php */
