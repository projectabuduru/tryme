<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    private $table = 'user';

    public function login($username,$password){
        $query = $this->db->select('*');
        $password_hash = md5('tryme'.$password);
        $datawhere     = array('user_nama' => $username,'user_password'=>$password_hash,'status'=>'Y');
        $query = $query->where($datawhere)->where_in('role',array('admin','super_admin'))->get($this->table)->row();
        if (!empty($query)) {
            $newdata = array(
                'user_id'       => $query->user_id,
                'user_nama'     => $query->user_nama,
                'user_email'    => $query->user_email,
                'user_telp'     => $query->user_telp,
                'user_image'    => $query->user_image,
                'role'          => $query->role,
                'logged_in'     => TRUE,
            );
            $this->session->set_userdata($newdata);
            return true;
        } else{
            return false;
        }
    }

    public function get_data_partner($id){
        $sql = "SELECT dp.*,mc.cate_name FROM data_product dp,master_category mc where dp.cate_id=mc.cate_id and dp.product_id = ?";
        $query = $this->db->query($sql,$id)->row();
        return $query;
    }
}

/* End of file User.php */
