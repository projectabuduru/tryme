<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Point extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        // $this->load->library('custom_function');
        if ($this->session->userdata('logged_in') != TRUE) {
            redirect('back_office/login');
        }
    }


    public function index()
    {
        $data['header']    = $this->load->view('templates_bo/topbar', null, TRUE);
        $data['sidebar']   = $this->load->view('templates_bo/sidebar', null, TRUE);
        $data['footer']    = $this->load->view('templates_bo/footer', null, TRUE);
        $this->load->view('point/v_point', $data);
    }

    function get_all_point()
    {
        $this->db->where('status !=', "D");
        $result = $this->db->get('master_point')->result_array();
        $json = array();
        $no = 1;
        foreach ($result as $row) {
            $data['no']             = $no;
            $data['point_id']       = $row['point_id'];
            $data['min_trans']      = $row['min_trans'];
            $data['max_trans']      = $row['max_trans'];
            $data['value']          = $row['value'];
            $data['status']         = ($row['status'] == "Y") ? "Aktif" : "Non AKtif";
            $no++;
            $json[] = $data;
        }
        header('Content-Type: application/json');
        $jTableResult = array();
        $jTableResult['Result'] = "sukses";
        $jTableResult['data'] = $json;
        print json_encode($jTableResult);
    }

    public function modalpoint()
    {
        $this->load->view('modal/point', null, FALSE);
    }

    public function modal_update_point($id)
    {
        $this->db->where('point_id', $id);
        $point = $this->db->get('master_point')->row();
        $data['point']    = $point;
        $this->load->view('modal/point', $data, FALSE);
    }

    public function create_point()
    {
        $min_trans = $this->input->post('min_trans');
        $max_trans = $this->input->post('max_trans');
        $value = $this->input->post('value');
        $status = $this->input->post('status');
        $iduser = $this->session->userdata('user_id');
        $data = array(
            'min_trans'  => $min_trans,
            'max_trans'  => $max_trans,
            'value'      => $value,
            'status'     => $status,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $iduser
        );
        $this->db->where('status', "Y");
        $this->db->where('min_trans', $min_trans);
        $check_min_trans = $this->db->get('master_point')->row();
        if($check_min_trans != null){
            $data = array("status" => FALSE, 'msg' => 'Minimal Transaksi sudah ada');
            echo json_encode($data);
            return;
        }

        $this->db->where('status', "Y");
        $this->db->where('max_trans', $max_trans);
        $check_max_trans = $this->db->get('master_point')->row();
        if($check_max_trans != null){
            $data = array("status" => FALSE, 'msg' => 'Maximal Transaksi sudah ada');
            echo json_encode($data);
            return;
        }
        $this->db->insert('master_point', $data);
        $this->db->insert_id();
        echo json_encode(array("status" => TRUE, 'msg' => 'Insert Point Berhasil'));
    }

    public function update_point()
    {
        $point_id = $this->input->post('point_id');
        $min_trans = $this->input->post('min_trans');
        $max_trans = $this->input->post('max_trans');
        $value = $this->input->post('value');
        $status = $this->input->post('status');
        $iduser = $this->session->userdata('user_id');
        $data = array(
            'min_trans'  => $min_trans,
            'max_trans'  => $max_trans,
            'value'      => $value,
            'status'     => $status,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $iduser
        );

        $this->db->where('point_id', $point_id);
        $olddata = $this->db->get('master_point')->row();
        
        $this->db->where('status', "Y");
        $this->db->where('min_trans', $min_trans);
        $check_min_trans = $this->db->get('master_point')->row();
        if($check_min_trans != null && $olddata->min_trans != $min_trans){
            $data = array("status" => FALSE, 'msg' => 'Minimal Transaksi sudah ada');
            echo json_encode($data);
        }

        $this->db->where('status', "Y");
        $this->db->where('max_trans', $max_trans);
        $check_max_trans = $this->db->get('master_point')->row();
        if($check_max_trans != null && $olddata->max_trans != $min_trans){
            $data = array("status" => FALSE, 'msg' => 'Maximal Transaksi sudah ada');
            echo json_encode($data);
        }

        $this->db->where('point_id', $point_id);
        $this->db->update('master_point', $data);
        echo json_encode(array("status" => TRUE, 'msg' => 'Update Point Berhasil'));
    }

    public function delete_point($id)
    {
        $iduser = $this->session->userdata('user_id');
        $data = array(
            'status'     => "D",
            'updated_by' => $iduser,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('point_id', $id);
        $this->db->update('master_point', $data);
        echo json_encode(array("status" => TRUE));
    }
}

/* End of file Home.php */
