<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_partner extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_user', 'user');
        if(!$this->session->userdata('user')){
            $this->session->sess_destroy();
        }
    }
    
    private $title = 'Sales Partner';
    public function index()
    {
        $cek_session = !empty($this->session->userdata('user')) ? $this->session->userdata('user')['user_id'] : null;

        $data = [
            'title' => $this->title,
            'user' => get_user_login($cek_session)
        ];

        $this->template->display('sales/index', $data);
    }

    public function action_register(){
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

            $post['user_password'] = make_password($post['user_password']);
            $post['role'] = 'partner';
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

}

/* End of file Sales_partner.php */
