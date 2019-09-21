<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper('url');
        $this->load->model('Mod_blog', 'blog');
    }
    

    public function index($page = 0)
    {
        $select = '*,DATE_FORMAT(created_at, "%d %b %Y") as tanggal';
        $where = null;
        $join = null;
        $order = null;
        $url = 'blog/';
        $per_page = '6';
        $uri = '2';
        $result = cust_pagination('blog',$select, $where, $join, $order, $url, $per_page, $uri, $page);
        
        foreach ($result as $key => $value) {
            
            $exp_date = explode(' ', $value->tanggal);
            // pre-exp_date);
            $value->blog_content = substrwords($value->blog_content, 150);
            $value->tgl = $exp_date[0];
            $value->bulan = $exp_date[1];
            $value->tahun = $exp_date[2];
        }
        // pre($data);
        $cek_session = !empty($this->session->userdata('user')) ? $this->session->userdata('user')['user_id'] : null;
        $get_user = (object)get_user_login($cek_session);
        // pre($get_user);
        $data['user'] = $get_user;
        $data['data'] = $result;
        $data['pagination'] = $this->pagination->create_links();
        $data['title']  = 'Blog';
        // pre($data);
        // $data = [
        //     'title' => 'Blog',
        //     'data' => $this->blog->get_data($config['per_page'], $from)->result()
        // ];
        // pre($data['pagination']);
        $this->template->display('blog/index', $data);
    }

    public function blog_detail($slug){

        $get_data = $this->blog->get_slug($slug);
        $exp_date = explode(' ', $get_data->tanggal);
        $get_data->tgl = $exp_date[0];
        $get_data->bulan = $exp_date[1];
        $get_data->tahun = $exp_date[2];
        // pre($get_data);
        $data = [
            'title' => 'Detail Blog',
            'data' => $get_data
        ];
        // pre($data);
        $this->template->display('blog/detail', $data);
    }

}

/* End of file Blog.php */
