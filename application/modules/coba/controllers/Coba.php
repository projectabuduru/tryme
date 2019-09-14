<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    

    public function index()
    {
        $data = [
                    'cc' => 'crot',
                    'cc1' => 'crot2'
                ];
        pre($data);
    }

    public function json_test(){
        $data = [
            'status' => true,
            'message' => 'ini message',
            'data' => [
                'data' => '1',
                'data2' => '2'
            ]
        ];
        
       res_json($data);
    }

}

/* End of file Coba.php */
