<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->id_user = $this->session->userdata('user');
    }

    private $table = 'wishlist';
    

    public function action_add(){
        $post = $this->input->post();

        $cek_wishlist = $this->db->where('product_id', $post['product_id'])
                                ->where('user_id', $this->id_user['user_id'])
                                ->get($this->table)->row();
        if(!empty($cek_wishlist)){

            $this->db->where('product_id', $post['product_id'])
                    ->where('user_id', $this->id_user['user_id'])
                    ->delete($this->table);
        }else{
            $data = [
                'product_id' => $post['product_id'],
                'user_id' => $this->id_user['user_id'],
                'created_at' => date('Y-m-d H:i:s', strtotime('+7 Hour')),
                'created_by' => $this->id_user['user_id'],
            ];
            $this->db->insert($this->table, $data);
        }

        
        // pre($post);

    }

}

/* End of file Whishlist.php */
