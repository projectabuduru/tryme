<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Keuntungan extends CI_Controller
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
        $this->load->view('keuntungan/v_keuntungan', $data);
    }

    function get_all_keuntungan()
    {
        $this->db->where('status !=', "D");
        $result = $this->db->get('keuntungan')->result_array();
        $json = array();
        $no = 1;
        foreach ($result as $row) {
            $data['no']                      = $no;
            $data['keuntungan_diskon']       = $row['keuntungan_diskon'];
            $data['keuntungan_min_jumlah']   = $row['keuntungan_min_jumlah'];
            $data['status']                  = ($row['status'] == "Y") ? "Aktif" : "Non AKtif";
            $no++;
            $json[] = $data;
        }
        header('Content-Type: application/json');
        $jTableResult = array();
        $jTableResult['Result'] = "sukses";
        $jTableResult['data'] = $json;
        print json_encode($jTableResult);
    }

    public function modalkeuntungan()
    {
        $this->load->view('modal/keuntungan', null, FALSE);
    }

    public function modal_update_keuntungan($id)
    {
        $this->db->where('keuntungan_id', $id);
        $keuntungan = $this->db->get('keuntungan')->row();
        $data['keuntungan']    = $keuntungan;
        $this->load->view('modal/keuntungan', $data, FALSE);
    }

    public function create_keuntungan()
    {
        $keuntungan_diskon = $this->input->post('keuntungan_diskon');
        $keuntungan_min_jumlah = $this->input->post('keuntungan_min_jumlah');
        $status = $this->input->post('status');
        $iduser = $this->session->userdata('user_id');
        $data = array(
            'keuntungan_diskon' => $keuntungan_diskon,
            'keuntungan_min_jumlah' => $keuntungan_min_jumlah,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $iduser
        );
        $this->db->insert('keuntungan', $data);
        $this->db->insert_id();
        echo json_encode(array("status" => TRUE, 'msg' => 'Insert Keuntungan Berhasil'));
    }

    public function update_keuntungan()
    {
        $keuntungan_id = $this->input->post('keuntungan_id');
        $keuntungan_diskon = $this->input->post('keuntungan_diskon');
        $keuntungan_min_jumlah = $this->input->post('keuntungan_min_jumlah');
        $status = $this->input->post('status');
        $iduser = $this->session->userdata('user_id');
        $data = array(
            'keuntungan_diskon' => $keuntungan_diskon,
            'keuntungan_min_jumlah' => $keuntungan_min_jumlah,
            'status' => $status,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $iduser
        );
        $this->db->where('keuntungan_id', $keuntungan_id);
        $this->db->update('keuntungan', $data);
        echo json_encode(array("status" => TRUE, 'msg' => 'Update Keuntungan Berhasil'));
    }

    public function delete_keuntungan($id)
    {
        $iduser = $this->session->userdata('user_id');
        $data = array(
            'status'     => "D",
            'updated_by' => $iduser,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('keuntungan_id', $id);
        $this->db->update('keuntungan', $data);
        echo json_encode(array("status" => TRUE));
    }
}

/* End of file Home.php */
