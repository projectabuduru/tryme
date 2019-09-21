<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_province extends CI_Model {

    public function get_data($where = null){
        $query =  $this->db->select('*');

        if(!empty($where)){
            $query = $query->like('nama', $where);
        }

        return $query->get('province')->result();
    }
    

}

/* End of file Mod_province.php */
