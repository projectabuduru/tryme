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

    public function action_edit(){
        
        $post = $this->input->post();
        // pre([$_FILES, $post]);
        $config['upload_path'] = './assets/images/profile/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|jpeg|GIF|JPG|PNG|JPEG';
        $config['max_size']  = '10476717';
        $config['file_name']     = 'profile-'.$post['user_nama'].'-'.date('YmdHis');	
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('user_image')){
            $error = array('error' => $this->upload->display_errors());
            $response['status'] = false;
            $response['message'] = $error;
            echo res_json($response);
            return;
        }
        

        $data = array('upload_data' => $this->upload->data());
        $config2['image_library']  = 'gd2';
        $config2['source_image']   = $this->upload->upload_path.$this->upload->file_name;
        $config['create_thumb']    = TRUE;
        $config['maintain_ratio']  = TRUE;
        $config['overwrite']       = TRUE;
        $config2['width']          = 720;
        $config2['height']         = 480;

        $this->load->library('image_lib', $config2);

        $this->image_lib->resize();
        $this->upload->data();

        $this->db->trans_begin();

        $data = $post;
        $data['user_image'] = implode('',explode('.',$config['upload_path'])).$this->upload->file_name;
        $where = [
            ['user_id','=',$this->id_user]
        ];
        $query = $this->user->update_data_profile($where, $data);

        if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                $response['status'] = true;
                $response['message'] = "Berhasil ubah profile";
        }else{
                $this->db->trans_commit();
                $response['status'] = true;
                $response['message'] = "Gagal ubah profile";
        }
        
        redirect('profile/account');
    }

    public function action_edit_password(){

        $post = $this->input->post();
        // pre($post);
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|min_length[6]',
                                            [
                                                'required' => 'Password Lama tidak boleh kosong',                                                
                                                'min_length' => 'Minimal 6 karakter'
                                            ]);
        $this->form_validation->set_rules('password_baru', 'password Baru', 'required|min_length[6]', 
                                            [
                                                'required' => 'Password baru tidak boleh kosong', 
                                                'min_length' => 'Password baru minimal 6 karakter'
                                            ]);
        $this->form_validation->set_rules('password_baruc', 'password Baru', 'required|min_length[6]|matches[password_baru]', 
                                            [
                                                'required' => 'password Lama tidak boleh kosong', 
                                                'min_length' => 'Konfirmasi password minimal 6 karakter',
                                                'matches' => 'Password konfirmasi tidak sesuai'
                                            ]);

        if (!$this->form_validation->run($this))
        {
            $str = ['<p style="color:red">', '</p>'];
            $str_replace = ['<li>', '</li>'];
            $message = str_replace($str, $str_replace, validation_errors());
            // $this->template->display('login/index', $data);
            echo res_false($message);return;
            // redirect('login.html');
        }else{
            $this->db->trans_begin();
            $where = [
                ['user_id','=',$this->id_user]
            ];
            $data['user_password'] = make_password($post['password_baru']);
            $query = $this->user->update_data_profile($where, $data);

            if ($this->db->trans_status() === FALSE){
                    $this->db->trans_rollback();
                    $message = "Gagal ubah password";
                    echo res_false($message); return;
            }else{
                    $this->db->trans_commit();
                    $message = "Berhasil ubah password";
                    echo res_true(null, $message); return;
            }
        }

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
