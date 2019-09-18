<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_user extends CI_Model {

    private $table = 'user';

    public function get_data($id = null, $login = null){
        $query = $this->db->select('*');

        if($id){
            $query = $query->where('user_id', $id);
                
        }

        if($login){
            $query = $query->where('user_email', $login['user_email'])
                            ->where('user_password', $login['user_password']);
        }

        

        return $query = $query->get($this->table);
    }

    public function insert($data){

        $query = $this->db->insert($this->table, $data);
        return $query;

    }

}

/* End of file User.php */
