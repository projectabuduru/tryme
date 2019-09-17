<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper('url');
        // $this->load->model('Mod_blog');
    }
    

    public function index($page = 0)
    {
        $config['base_url'] = base_url('blog/'); //site url
        $config['total_rows'] = $this->blog->jumlah_data(); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 2;  // uri parameter
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
        $config['cur_tag_open']     = '<li class="active"><span class="page-link"><a href="#">';
        $config['cur_tag_close']    = '</a></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        // $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        if($page != 0){ 
            $page = ($page-1) * $config['per_page']; 
          }  
        
        $data = $this->blog->get_data($config["per_page"], $page)->result();

        foreach ($data as $key => $value) {
            
            $exp_date = explode(' ', $value->tanggal);
            // pre($exp_date);
            $value->tgl = $exp_date[0];
            $value->bulan = $exp_date[1];
            $value->tahun = $exp_date[2];
        }
        
        $data['data'] = $data;
        $data['pagination'] = $this->pagination->create_links();
        $data['title']  = 'Blog';
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
