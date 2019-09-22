<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_product extends CI_Model {

    private $table = 'data_product';

    public function get_data_all(){
        $sql = "SELECT dp.*,mc.cate_name FROM data_product dp,master_category mc where dp.cate_id=mc.cate_id and dp.status != 'D'";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }

    public function get_category_product(){
        $sql = "SELECT cate_id,cate_name FROM master_category";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }

    public function get_data_product($id){
        $sql = "SELECT dp.*,mc.cate_name FROM data_product dp,master_category mc where dp.cate_id=mc.cate_id and dp.product_id = ?";
        $query = $this->db->query($sql,$id)->row();
        return $query;
    }
}

/* End of file User.php */
