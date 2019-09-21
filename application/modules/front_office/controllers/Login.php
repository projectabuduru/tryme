<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_user', 'user');
    }
    
    private $title = 'Login | Register';

    public function index()
    {
        $this->session->sess_destroy();
        $data = [
                'title' => $this->title,
        ];
        $this->template->display('login/index', $data);
    }

    public function action_login(){

        $post = $this->input->post();

        $this->form_validation->set_rules('user_email', 'Email', 'required|trim|valid_email',
                                            [
                                                'required' => 'Email tidak boleh kosong',                                                
                                                'valid_email' => 'Isikan email dengan benar'
                                            ]);
        $this->form_validation->set_rules('user_password', 'Password', 'required|min_length[6]', 
                                            [
                                                'required' => 'password tidak boleh kosong', 
                                                'min_length' => 'Minimal 6 karakter'
                                            ]);

        if (!$this->form_validation->run($this))
        {
            $str = ['<p style="color:red">', '</p>'];
            $str_replace = ['<li>', '</li>'];
            $data['status'] = false;
            $data['message'] = str_replace($str, $str_replace, validation_errors());
            // $this->template->display('login/index', $data);
            return res_json($data);
            // redirect('login.html');
        }else{

            $post['user_password'] = make_password($post['user_password']);
            // pre($post);
            $cek_user = $this->user->get_data(null, ['user_email' => $post['user_email']])->row();

            if($cek_user){
                // pre($post);
                $cek_login = $this->user->get_data(null, $post)->row();
                // pre($this->db->last_query($cek_login));

                if($cek_login){
                    $sesion = [
                        'role' => $cek_login->role,
                        'user_id' => $cek_login->user_id
                    ];
                    $this->session->set_userdata('user',$sesion);
        
                    $data['status'] = true;
                    $data['message'] = 'Berhasil melakukan login';
                    $data['data'] = 'login';
                }else{
        
                    $data['status'] = false;
                    $data['message'] = 'Password salah';
                    $data['data'] = null;
                }
            }else{
                    $data['status'] = false;
                    $data['message'] = 'Email tidak ditemukan';
                    $data['data'] = null;
            }

            
            
            return res_json($data);

        }

    }

    public function action_register_member(){

        $post = $this->input->post();

        $this->form_validation->set_rules('user_nama', 'Username', 'required', ['required' => 'Username tidak boleh kosong']);
        $this->form_validation->set_rules('user_email', 'Email', 'required|is_unique[user.user_email]|trim|valid_email',['required' => 'Email tidak boleh kosong','is_unique' => 'Email sudah ada, silahkan gunakan email lain', 'valid_email' => 'Isikan email dengan benar']);
        $this->form_validation->set_rules('user_telp', 'User Telpon', 'required|is_unique[user.user_telp]|is_natural|min_length[11]', ['required' => 'Telpon tidak boleh kosong', 'is_unique' => 'Nomor telpon sudah ada, silahkan gunakan nomor telpon lain', 'is_natural' => 'Isikan hanya angka saja', 'min_length' => 'minimal 11 karakter']);
        $this->form_validation->set_rules('user_password', 'Password', 'required|min_length[6]', ['required' => 'password tidak boleh kosong', 'min_length' => 'Minimal 6 karakter']);

        if (!$this->form_validation->run($this))
        {
            $str = ['<p style="color:red">', '</p>'];
            $str_replace = ['<li>', '</li>'];
            $data['status'] = false;
            $data['message'] = str_replace($str, $str_replace, validation_errors());
            // $this->template->display('login/index', $data);
            return res_json($data);
            // redirect('login.html');
        }else{

            $post['user_nama'] = strtoupper($post['user_nama']);
            $post['user_password'] = make_password($post['user_password']);
            $post['role'] = 'member';
            $post['created_at'] = date('Y-m-d H:i:s');
            $this->db->trans_begin();
            $query = $this->user->insert($post);
            $last_id = $this->db->insert_id($query);
            if($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                $data['status'] = $query;
                $data['message'] = 'Berhasil melakukan register';
            }else{
                $this->db->trans_commit();
                $sesion = [
                    'role' => $post['role'],
                    'user_id' => $last_id
                ];
                $this->session->set_userdata('user',$sesion);

                $data['status'] = $query;
                $data['message'] = 'Berhasil melakukan register';
                $data['data'] = 'register';
            }
            
            return res_json($data);

        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('home');
    }

}

/* End of file Login.php */
