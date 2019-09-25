<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_global extends CI_Model {

    public function get_data($table = null, $select = '*', $where = null, $join = null, $order = null, $start = '0', $end = null){

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

        
        return $this->db->get($table, $end, $start)->result();

    }

    public function insert($table, $data){
        return $this->db->insert($table, $data);
    }

    public function update($table, $where, $data){

        if(!empty($where)){
            foreach ($where as $key => $value) {
                $this->db->where($value[0],$value[2],$value[1]);
            }
        }

        return $this->db->update($table, $data);

    }

}

/* End of file M_global.php */
