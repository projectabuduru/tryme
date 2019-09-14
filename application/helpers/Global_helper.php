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
        'data' => $data['data']
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

/* End of file global.php */
    
                        