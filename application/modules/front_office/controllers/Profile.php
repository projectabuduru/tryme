<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_user', 'user');
        $this->load->model('Mod_province', 'province');
        $this->load->model('Mod_user_alamat', 'user_alamat');
        $this->id_user = $this->session->userdata('user')['user_id'];
        // $this->load->library('datatables');
        if(!$this->session->userdata('user')){
            $this->session->sess_destroy();
            redirect('home');
        }
        
    }
    
    private $title = 'Profile';
    public function index($page = null)
    {
        $cek_session = !empty($this->session->userdata('user')) ? $this->session->userdata('user')['user_id'] : null;

        $data = [
            'title' => $this->title,
            'user' => get_user_login($cek_session),
        ];
        // pre($data);
        $this->template->display('profile/index', $data);
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
        }

        echo json_encode($list);
    }

    public function action_add_alamat(){
        $post = $this->input->post();
        $post['user_id'] = $this->id_user;
        $post['created_at'] = date('Y-m-d H:i:s');
        $post['created_by'] = $post['user_id'];

        $this->db->trans_begin();
        $query = $this->user_alamat->add($post);
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $data['status'] = $query;
            $data['message'] = 'Gagal tambah alamat, silahkan coba lagi nanti';
        }else{
            $data['status'] = $query;
            $data['message'] = 'Berhasil tambah alamat';
        }
        return res_json($data);

    }

    public function alamat($page = null){
        
        $select = '*, ua.status as status_alammat, u.status as status_user';
        $where = [
            ['u.user_id', '=', $this->id_user]
        ];
        $join = [
            ['user_alamat as ua', 'u.user_id','=', 'ua.user_id']
        ];
        $order = ['ua.status','asc'];
        $url = 'profile/alamat/';
        $per_page = '5';
        $uri = '3';
        $results = cust_pagination('user as u',$select, $where, $join, $order, $url, $per_page, $uri, $page);
        foreach ($results as $key => $value) {
            $url = 'city?province='.$value->alamat_provinsi_id.'&id='.$value->alamat_kota_id;
            $get_city = json_decode(curl_rajaongkir($url))->rajaongkir->results;
            $value->alamat_detail = $get_city->province.', '.$get_city->type.' '.$get_city->city_name.' ('.$get_city->postal_code.')';
            // pre($get_city);
        }
        // pre($results);
        $data['title'] = $this->title;
        $data['user'] = get_user_login($this->id_user);
        $data['data'] = $results;
        $data['pagination'] = $this->pagination->create_links();        
        $this->template->display('profile/alamat', $data);

    }

    public function change_alamat_user($id){
        $where = [
            ['user_id', '=', $this->id_user ],
            ['status','=','Y']
        ];
        $cek_alamat = $this->user->get_data_alamat($where);
        // pre($this->db->last_query($cek_alamat));
        $this->db->trans_begin();
        if(!empty($cek_alamat)){
            $cek_alamat = $cek_alamat[0];
            $data = ['status' => 'N'];
            $this->user->update_alamat($cek_alamat->alamat_id, $data);
        }

        $data = ['status' => 'Y'];
        $this->user->update_alamat($id, $data);

        if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                $response['status'] = true;
                $response['message'] = 'Gagal set alamat';
        }else{
                $this->db->trans_commit();
                $response['status'] = true;
                $response['message'] = 'Berhasil set alamat';
        }

        return res_json($response);
        // pre($cek_alamat);
    }

    public function myacoount(){
        
        $data = [
            'title' => $this->title,
            'user' => get_user_login($this->id_user),
        ];
        // pre($data);
        $this->template->display('profile/myaccount', $data);
    }


    //trash
    public function get_data_alamat(){
        
        $data = $this->user->get_datatable_alamat($this->id_user);
        // pre($data);
        // $records = [];
        $no = !empty($_POST['start']) ? $_POST['start'] : 0;
        foreach ($data['data'] as $key => $value) {
            $no++;
            $row = [];
            $row[] = '';
            $row[] = "<p><b>$value->user_penerima<b></p>
                     <p>$value->user_penerima_telp<p>";
            $row[] = "<p><b>$value->alamat_nama</b><p>
                        <p>$value->alamat</p>";
            $row[] = '';
            $row[] = '';
            $records[] = $row;
        }

        $output = array(
            "draw" => !empty($_POST['draw']) ? $_POST['draw'] : 0,
            "recordsTotal" => $data['recordsTotal'],
            "recordsFiltered" => $data['recordsFiltered'],
            "data" => $records,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

}

/* End of file Profile.php */
