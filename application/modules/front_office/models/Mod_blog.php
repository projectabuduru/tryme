<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_blog extends CI_Model {

    public function get_data($number = null, $offset = null){
        $query = $this->db
                        ->select('*, DATE_FORMAT(created_at, "%d %b %Y") as tanggal')
                        ->get('blog', $number, $offset);
        return $query;
    }

    public function jumlah_data(){
        $query = $this->db->count_all('blog');
        return $query;
    }

    public function get_slug($slug){
        $query = $this->db
                        ->select('*, DATE_FORMAT(created_at, "%d %b %Y") as tanggal')
                        ->where('blog_slug', $slug)
                        ->get('blog')
                        ->row();
        return $query;
    }

}

/* End of file Mod_blog.php */

?>