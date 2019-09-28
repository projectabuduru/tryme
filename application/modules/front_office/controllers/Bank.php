<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_bank', 'bank');
    }
    

    public function get_data_bank_aktif(){
        $query = $this->bank->get_data_aktif();

        echo res_true($query);return;
    }

}

/* End of file Bank.php */
