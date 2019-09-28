<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rajaongkir extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_province', 'province');
    }
    

    public function province(){

        $get = $this->input->get('search');
        $get = !empty($get) ? $get : null;

        $get_province = $this->province->get_data($get);
        $list = [];
        foreach ($get_province as $key => $value) {
            $list[$key]['id'] = $value->id;
            $list[$key]['text'] = $value->nama;
        }

        echo json_encode($list);
              
    }

    public function city($id_province = null){
        $url = 'city?province='.$id_province;
        $get_city = json_decode(curl_rajaongkir($url));
        // pre($get_city);
        $list = [];
        foreach ($get_city->rajaongkir->results as $key => $value) {
            $list[$key]['id'] = $value->city_id;
            $list[$key]['text'] = $value->city_name." ($value->type)";
            $list[$key]['kodepos'] = $value->postal_code;
        }

        echo json_encode($list);
    }

    public function cost(){
        $post = $this->input->post();
        $post['origin'] = '409';
        // pre($post);
        $url = 'cost';
        $get_cost = json_decode(curl_rajaongkir($url, $post))->rajaongkir;
        // pre($get_cost);
        if($get_cost->status->code = 200){
            // pre($get_cost->results[0]->costs);
            if(!empty($get_cost->results[0]->costs)){
                echo res_true($get_cost->results[0]->costs); return;
            }else{
                echo res_false('Kurir belum mendukung didaerah ini');
            }
            
        }else{
            echo res_false('Terjadi Kesalahan'); return;
        }
        
    }

}

/* End of file Rajaongkir.php */
