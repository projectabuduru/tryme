<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('model_app');
    	// $this->load->library('custom_function');
    	if($this->session->userdata('logged_in') != TRUE ){
	        redirect('back_office/login');
		}
    }
    

    public function index()
    {
        // $this->template->display_bo('home/v_home');
    }

}

/* End of file Home.php */
