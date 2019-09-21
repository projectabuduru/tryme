<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function pre($var){

    $CI = &get_instance();
    echo '<pre>';
    if ( $var == 'lastdb' ){
        print_r($CI->db->last_query());
    } else if ( $var == 'post' ){
        print_r($CI->input->post());
    } else if ( $var == 'get' ){
        print_r($CI->input->get());
    } else {
        print_r( $var );
    }
    echo '</pre>';
    die();
}

function res_json($data){
    $data = [
        'status' => $data['status'],
        'message' => $data['message'],
        'data' => (!empty($data['data']) ? $data['data'] : null)
    ];
    echo json_encode($data);
}

function md56($param,$tipe = null,$jml = null){
    if(empty($tipe)){
        return substr(md5($param),0, ( empty($jml) ? 6 : $jml  ) );

        substr(md5($param),0, 6 );
    }else{
        return 'SUBSTRING(md5('.$param.'),true,6)';
    }
}

function make_password($password){
    return md5('tryme'.$password);
}

function get_user_login($id){
    if($id){
        $CI = &get_instance();
        $CI->load->model('Mod_user', 'user');
        $query =  $CI->user->get_data($id)->row();
        return $query;
    }
    
}

function substrwords($text, $maxchar, $end='...') {
    if (strlen($text) > $maxchar || $text == '') {
        $words = preg_split('/\s/', $text);      
        $output = '';
        $i      = 0;
        while (1) {
            $length = strlen($output)+strlen($words[$i]);
            if ($length > $maxchar) {
                break;
            } 
            else {
                $output .= " " . $words[$i];
                ++$i;
            }
        }
        $output .= $end;
    } 
    else {
        $output = $text;
    }
    return $output;
}

function curl_rajaongkir($url, $data = null){
    $url = 'https://api.rajaongkir.com/starter/'.$url;
    
    if(!empty($data)){
        $status = 'POST';
        $head 	= null;
    }else{
        $status= 'GET';
        $head = 'Content-Type: application/json';
    }

    $header = [
        "key: f876060c0e565d3c3242d35b5808bf04",
        $head
        //'Content-Type : application/x-www-form-urlencoded'
    ];

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL =>$url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_TIMEOUT => 30000,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $status,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => $header,
    ));
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($curl);
    
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        return "cURL Error #:" . $err;
    } else {
        return $response;
    }
}

function cust_pagination($table, $select = '*', $where = null, $join = null, $order = null, $url, $perpage, $uri = 2, $page){
        $CI = &get_instance();

        if(!empty($where)){
            foreach ($where as $key => $value) {
                $CI->db->where($value[0],$value[2],$value[1]);
            }
        }
        if(!empty($join)){
            foreach ($join as $key => $value) {
                $CI->db->join($value[0], $value[1].' '.$value[2].' '.$value[3]);
            }
        }
        $jumlah_data = $CI->db->from($table)
                            ->count_all_results();
        // pre($CI->db->last_query($jumlah_data));
        $config['base_url'] = base_url($url); //site url
        $config['total_rows'] = $jumlah_data; //total row
        $config['per_page'] = $perpage;  //show record per halaman //6
        $config["uri_segment"] = $uri;  // uri parameter //2
        $config['use_page_numbers'] = TRUE;   
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        // pre([
        //     $this->uri->segment(0),
        //     $this->uri->segment(1),
        //     $this->uri->segment(2),
        //     $this->uri->segment(3)
        //     ]);
        
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="active"><span class="page-link"><a href="#" class="fz-12">';
        $config['cur_tag_close']    = '</a></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $CI->pagination->initialize($config);
        // $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        if($page != 0){ 
            $page = ($page-1) * $config['per_page']; 
          }  
        // pre([$table, $select, $where, $join, $order]);
        $CI->db->select($select);
          
        if(!empty($where)){
            foreach ($where as $key => $value) {
                $CI->db->where($value[0],$value[2],$value[1]);
            }
        }

        if(!empty($join)){
            foreach ($join as $key => $value) {
                $CI->db->join($value[0], $value[1].' '.$value[2].' '.$value[3]);
            }
        }

        if(!empty($order)){
                        
            $CI->db->order_by($order[0], $order[1]);
            
        }

        $result = $CI->db->get($table, $config["per_page"], $page)->result();
        // pre($result);
        return $result;
}


/* End of file global.php */
    
                        