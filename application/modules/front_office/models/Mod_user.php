<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_user extends CI_Model {

    private $table = 'user';

    public function get_data($id = null, $login = null){
        $this->db->select('*');

        if($id){
            $this->db->where('user_id', $id);
                
        }

        if($login){
            foreach($login as $key_login => $value_login){
                $this->db->where($key_login, $value_login);
            }
        }

        

        return $this->db->get($this->table);
    }

    public function insert($data){

        $query = $this->db->insert($this->table, $data);
        return $query;

    }

    public function get_data_alamat($where = null){
        $this->db->select('*');

        if(!empty($where)){
            foreach ($where as $key => $value) {
                $this->db->where($value[0],$value[2],$value[1]);
            }
        }
        $query = $this->db->order_by('status','asc')
                        ->get('user_alamat')->result();
        return $query;
    }

    public function update_alamat($id, $data){
        return $this->db->where('alamat_id', $id)
                         ->update('user_alamat',$data);
    }

    public function update_data_profile($where, $data){
        
        if(!empty($where)){
            foreach ($where as $key => $value) {
                $this->db->where($value[0],$value[2],$value[1]);
            }
        }

        return $this->db->update('user', $data);

    }


    //trash
    public function get_datatable_alamat($id){
        // pre($id);
        $this->db->where('u.user_id', $id)
                
                ->join('user_alamat ua', 'u.user_id = ua.user_id');
        // pre($query);
        $search = ['user_nama','alamat_nama'];
        $order = ['ua.status' => 'desc'];
        $i = 0;
     
        foreach ($search as $item) // looping awal
        {
            if(!empty($_POST['search']['value'])) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                   $this->db->group_start()
                                    ->like($item, $_POST['search']['value']);
                }
                else
                {
                   $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($search) - 1 == $i) 
                   $this->db->group_end(); 
            }
            $i++;
        }
        
         
        if(isset($_POST['order'])) 
        {
           $this->db->order_by($order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($order))
        {
            $order = $order;
           $this->db->order_by(key($order), $order[key($order)]);
        }
        $end = !empty($_POST['length']) ? $_POST['length'] : 10;
        $start = !empty($_POST['start']) ? $_POST['start'] : 0;
        // pre($_POST['length']);
        // if(!empty($_POST['length']) && $_POST['length'] != -1)
        $this->db->limit($end, $start);
        $records =  $this->db->get('user u')->result();
        // pre($this->db->last_query($records));
        $count_row = $this->db->get('user u')->num_rows();
        $count_all_row = $this->db->count_all_results();

        return ['data' => $records, 'recordsTotal' => $count_all_row, 'recordsFiltered' => $count_row];

    }
    
}

/* End of file User.php */
