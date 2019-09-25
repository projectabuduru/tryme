<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_cart extends CI_Model {

    private $table = 'cart';

    public function get_cart($select = '*', $where = null, $join = null, $order = null, $limit = null, $start = 0){

        $this->db->select($select);

        if(!empty($where)){
            foreach ($where as $key => $value) {
                $this->db->where($value[0],$value[2],$value[1]);
            }
        }

        if(!empty($join)){
            foreach ($join as $key => $value) {
                $this->db->join($value[0], $value[1].' '.$value[2].' '.$value[3]);
            }
        }

        if(!empty($order)){
            $this->db->order_by($order[0], $order[1]);
        }

        return $this->db->get($this->table, $limit, $start)->result();

    }

}

/* End of file Mod_cart.php */
