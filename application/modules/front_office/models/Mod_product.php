<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_product extends CI_Model {

    private $table = 'data_product dap';

    public function get_product($select = '*', $where = null, $join = null, $order = null, $limit = null, $start = 0){

        $this->db->select($select);

        if(!empty($where)){
            foreach ($where as $key => $value) {
                $this->db->where($value[0],$value[2],$value[1]);
            }
        }

        if(!empty($join)){
            foreach ($join as $key => $value) {
                $this->db->join($value[0], $value[1].' '.$value[2].' '.$value[3]);
            }
        }

        if(!empty($order)){
            $this->db->order_by($order[0], $order[1]);
        }

        return $this->db->get($this->table, $limit, $start)->result();

    }

    public function feature_product($role){
        // pre($role);
        //new product
        $query = $this->db->select('
                                    dap.*,
                                    dip.diskon,
                                    dip.satuan,
                                    dip.tanggal_mulai,
                                    dip.tanggal_selesai,
                                    ifnull(wish_id, null) as wish_id
                                ')
                        ->join('diskon_product as dip', 'dip.product_id = dap.product_id', 'left')
                        ->join('wishlist as wish', 'wish.product_id = dap.product_id', 'left')
                        ->order_by('created_at', 'desc')
                        ->get($this->table, 5, 0)->result();
                        // pre($query);
        $data = [];
        foreach ($query as $key => $value) {
            // $records = [];
            // pre($value->diskon);
            $harga_diskon = null;
            $harga_product = null;
            if($role == 'partner'){
                $harga_product = $value->product_price_partner;
                // $harga_diskon = null;
                if($value->tanggal_selesai >= date('Y-m-d H:i:s')){
                    if(!empty($value->diskon)){

                        if($value->satuan == 'percent'){
                            // pre($value->satuan);
                            $harga_diskon = $value->product_price_partner - ceil($value->product_price_partner * ($value->diskon / 100));
        
                        }else{
                            $harga_diskon = $value->diskon;
                        }
        
                    }
                }
                
                
            }else{
                $harga_product = $value->product_price;
                if(!empty($value->diskon)){
                    if($value->tanggal_selesai >= date('Y-m-d H:i:s')){
                        if($value->satuan == 'percent'){
                            // pre($value->satuan);
                            $harga_diskon = $value->product_price -  ceil($value->product_price * ($value->diskon / 100)); 
                            
        
                        }else{
                            $harga_diskon = $value->diskon;
                        }
                    }
                }
            }

            $data[] = [
                'product_id' => $value->product_id,
                'product_name' => $value->product_name,
                'product_price' => $harga_product,
                'product_diskon' => $harga_diskon,
                'diskon' => $value->diskon,
                'diskon_satuan' => $value->satuan,
                'product_image' => $value->product_image,
                'product_stok' => $value->product_stok,
                'wish_id' => $value->wish_id,
                
            ];
            // array_push($data, $records);
        }
        // pre((object)$data);
        return (object)$data;


    }

    public function all_product($role){

        //new product
        $query = $this->db->select('dap.*, dip.diskon, dip.satuan, dip.tanggal_mulai, dip.tanggal_selesai, ifnull(wish_id, null) as wish_id')
                        ->join('diskon_product as dip', 'dip.product_id = dap.product_id', 'left')
                        ->join('wishlist as wish', 'wish.product_id = dap.product_id', 'left')
                        ->order_by('created_at', 'desc')
                        ->get($this->table, 20, 0)->result();
                        // pre($query);
        $data = [];
        foreach ($query as $key => $value) {
            // $records = [];
            // pre($value->diskon);
            $harga_diskon = null;
            $harga_product = null;
            if($role == 'partner'){

                $harga_product = $value->product_price_partner;
                // $harga_diskon = null;
                if(!empty($value->diskon)){

                    if($value->satuan == 'percent'){
                        // pre($value->satuan);
                        $harga_diskon = ceil($value->product_price_partner * ($value->diskon / 100));
    
                    }else{
                        $harga_diskon = $value->diskon;
                    }
    
                }
                
            }else{
                $harga_product = $value->product_price;
                if(!empty($value->diskon)){

                    if($value->satuan == 'percent'){
                        // pre($value->satuan);
                        $harga_diskon = ceil($value->product_price * ($value->diskon / 100)); 
                        
    
                    }else{
                        $harga_diskon = $value->diskon;
                    }
    
                }
                
            }

            $data[] = [
                'product_id' => $value->product_id,
                'product_name' => $value->product_name,
                'product_price' => $harga_product,
                'product_diskon' => $harga_diskon,
                'diskon' => $value->diskon,
                'diskon_satuan' => $value->satuan,
                'product_image' => $value->product_image,
                'product_stok' => $value->product_stok,
                'wish_id' => $value->wish_id
                
            ];
            // array_push($data, $records);
        }
        // pre((object)$data);
        return (object)$data;


    }

}

/* End of file Mod_product.php */
