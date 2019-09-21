<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_user_alamat extends CI_Model {

    private $table = 'user_alamat';

    public function add($data){

        return $this->db->insert($this->table, $data);

    }

}

/* End of file Mod_user_alamat.php */
