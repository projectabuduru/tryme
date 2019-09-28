<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_bank extends CI_Model {

    private $table = 'master_bank';

    public function get_data_aktif(){
        $query = $this->db->where('status', 'Y')
                ->get($this->table)
                ->result();
        return $query;
    }

    public function get_data_delete(){
        $query = $this->db->where('status', 'N')
                ->get($this->table)
                ->result();
        return $query;
    }

}

/* End of file Mod_bank.php */
