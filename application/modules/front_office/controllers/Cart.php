<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_product', 'product');
        $this->load->model('Mod_cart', 'cart');
        $this->id_user = !empty($this->session->userdata('user')) ? $this->session->userdata('user') : null;
        $this->ip = $this->input->ip_address();
    }
    
    private $table = 'cart';

    public function cart_add(){
        $id_product = $this->input->post('product_id');
        
        if(!empty($this->id_user)){
            $where = ['cart_user_id', '=', $this->id_user['user_id']];
        }else{
            $where = ['cart_ip', '=', $this->ip];
        }
        $where = [
            ['product_id', '=', $id_product],
            $where
        ];
        $cek_my_cart = $this->cart->get_cart('*', $where);

        if(empty($cek_my_cart)){
            $data = [
                'cart_user_id' => $this->id_user['user_id'],
                'product_id' => $id_product,
                'cart_ip' => $this->ip,
                'product_qty' => 1,
                'created_at' => date('Y-m-d H:i:s', strtotime('+7 hour')),
                'created_by' => $this->id_user['user_id'],
            ];
            // $get_product = $this->product->get_product('*', $where)[0];
            $query = $this->db->insert($this->table, $data);
    
            if($query){
                echo res_true($data, 'Berhasil tambah cart'); return;
            }else{
                echo res_false('Gagal menambahkan cart'); return;
            }
        }else{
            echo res_warning('Sudah tersedia dikeranjang'); return;
        }
        // pre($cek_my_cart);
        // $ip_user = $this->input->ip_address();
        
        // pre([$data]);

        

    }

    public function mycart(){

        $price = !empty($this->id_user) ? "FORMAT((case
                                                when diskon IS NULL then product_price_partner
                                                when satuan = 'percent' then (product_price_partner - (product_price_partner * (diskon/100)))
                                                when satuan = 'nominal' then (product_price_partner - diskon)
                                            END), 'N0') AS price,
                                            FORMAT(product_price_partner,'N0') as old_price" :
                                        "FORMAT((case
                                            when diskon IS NULL then product_price
                                            when satuan = 'percent' then (product_price - (product_price * (diskon/100)))
                                            when satuan = 'nominal' then (product_price - diskon)
                                        END),'N0') AS price,
                                        FORMAT(product_price,'N0') as old_price";

        // $this->db->select('product_name,product_qty,product_stok,product_image,'.$price);
        $select = 'product_name,
                    product_qty,
                    product_stok,
                    product_image,
                    cart.product_id,
                '.$price;
        if(!empty($this->id_user)){
            $where = 'cart_user_id = '.$this->id_user['user_id'];
            // $this->db->where('cart_user_id', $this->id_user['user_id']);
        }else{
            $where = 'cart_ip = "'.$this->ip.'" and cart_user_id is null';
            // $this->db->where('cart_ip', $this->ip);
        }
        // $this->db->order_by('cart_id','desc');
        // $this->db->join('data_product dap','dap.product_id = cart.product_id');
        // $this->db->join('diskon_product as dp', 'dp.product_id = cart.product_id', 'left');
        // $get_my_cart = $this->db->get($this->table, 5, 0)->result();
        // $this->db->where('dp.tanggal_selesai >=', date('Y-m-d H:i:s', strtotime('+7 hour')));
        $get_my_cart = $this->db->query('SELECT '.$select.'
                                            FROM `cart`
                                            JOIN `data_product` `dap` ON `dap`.`product_id` = `cart`.`product_id`
                                            left JOIN `diskon_product` as `dp` ON `dp`.`product_id` = `cart`.`product_id` and `dp`.`tanggal_selesai` >= "'.date('Y-m-d H:i:s', strtotime('+7 hour')).'"
                                            where '.$where)->result();
        $total = 0;
        foreach ($get_my_cart as $key => $value) {
            $price = str_replace(',','.',$value->price) * 1000;
            $old_price = str_replace(',','.',$value->old_price) * 1000;
            $value->price = $price;
            $value->old_price = $old_price;
            $total = $total + $price;
            $value->total = $total;
        }
        // foreach ($get_my_cart as $key => $value) {
            
        // }
        // pre($get_my_cart);
        echo res_true($get_my_cart);return;

    }

    public function cart_delete(){
        $id_product = $this->input->post('product_id');
        if(!empty($this->id_user)){
            $this->db->where('cart_user_id', $this->id_user['user_id']);
        }else{
            $this->db->where('cart_ip', $this->ip);
            $this->db->where('cart_user_id is null');
        }
        $this->db->where('product_id', $id_product);
        $query = $this->db->delete('cart');
        // pre($this->db->last_query($query));
        if($query){
            echo res_true(null, 'Berhasil hapus keranjang'); return;
        }else{
            echo res_false('Gagal hapus keranjang'); return;
        }
        // $query = $this->db->delete('cart');

    }

    public function cart_upgrade(){
        $post = $this->input->post();
        $get_product = $post['product_id'];
        foreach ($get_product as $key => $value) {
            $data = [
                'product_id' => $post['product_id'][$key],
                'product_qty' => $post['qty'][$key],
            ];
            // pre($data);
            if(!empty($this->id_user)){
                $this->db->where('cart_user_id', $this->id_user['user_id']);
                // $where = ['cart_user_id', '=', $this->id_user['user_id']];
            }else{
                $this->db->where('cart_ip', $this->ip);
                $this->db->where('cart_user_id is null');
                // $where = ['cart_ip', '=', $this->ip];
            }

            $this->db->where('product_id', $post['product_id'][$key]);
            $result = $this->db->update('cart',$data);
        }
      
        if($result){
            echo res_true(null, 'Berhasil upgrade keranjang'); return;
        }else{
            echo res_false('Gagal upgrade keranjang'); return;
        }

        // pre($post);
    }

    public function mycart_show(){

        $data = [
            'title' => 'Try me | Cart Ku'
        ];

        // pre($data);

        $this->template->display('cart/index', $data);

    }

}

/* End of file Cart.php */
