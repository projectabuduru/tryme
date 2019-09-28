<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->id_user = !empty($this->session->userdata('user')) ? $this->session->userdata('user') : null;
        $this->ip = $this->input->ip_address();
        
    }

    private $title = 'Try me | Checkout';
    

    public function checkout()
    {
        // if(!empty($this->id_user)){
        //     $this->db->where('cart_user_id', $this->id_user['user_id']);
        // }else{
        //     $this->db->where('cart_ip', '=', $this->ip);
        // }
        // $query = $this->db->get('cart')
        //                 ->result();
        $data = [
            'title' => $this->title,
            'user' => get_user_login($this->id_user['user_id']),
        ];

        $this->template->display('order/index',$data);
        // pre($data);

    }

    public function proses_checkout(){

        $post = $this->input->post();

        pre($post);

        
    }

    public function invoice(){

    }

}

/* End of file Order.php */
