<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
    	// $this->load->library('custom_function');
    	if($this->session->userdata('logged_in') != TRUE ){
	        redirect('back_office/login');
		}
    }
    

    public function index()
    {
        $data['header']    = $this->load->view('templates_bo/topbar',null,TRUE);
        $data['sidebar']   = $this->load->view('templates_bo/sidebar',null,TRUE);
        $data['footer']    = $this->load->view('templates_bo/footer',null,TRUE);
        $this->load->view('voucher/v_voucher',$data); 	
	}
	
    function get_all_voucher(){
        $this->db->where('status !=', "D");
		$result = $this->db->get('voucher')->result_array();
		$json = array();
		$no = 1;
		foreach ($result as $row) {
            $data['no']            = $no;
            $data['voc_id']        = $row['voc_id'];
			$data['voc_name']      = $row['voc_name'];
            $data['voc_kode']      = $row['voc_kode'];
            $data['voc_nominal']   = $row['voc_nominal'];
            $data['expired']   = $row['expired'];
            $no++;
            $json[] = $data;
		}
		header('Content-Type: application/json');
		$jTableResult = array();
		$jTableResult['Result'] = "sukses";
		$jTableResult['data'] = $json;
		print json_encode($jTableResult);
	}

	public function modalvoucher() {
		$this->load->view('modal/voucher',null,FALSE);
	}

	public function modal_update_voucher($id) {
        $this->db->where('voc_id', $id);
		$voucher = $this->db->get('voucher')->row();
        $data['voucher']    = $voucher;
		$this->load->view('modal/voucher',$data,FALSE);
    }
    
	public function create_voucher() {
		$voc_name = $this->input->post('voc_name');
        $voc_kode = $this->input->post('voc_kode');
        $voc_nominal = $this->input->post('voc_nominal');
        $expired = $this->input->post('expired');
        $iduser = $this->session->userdata('user_id');
        $data = array(
            'voc_name' => $voc_name, 
            'voc_kode' => $voc_kode, 
            'voc_nominal' => $voc_nominal, 
            'expired' => $expired, 
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $iduser
        );
        $this->db->insert('voucher', $data);
        $this->db->insert_id();
        echo json_encode(array("status" => TRUE,'msg'=>'Insert Voucher Berhasil'));
	}

	public function update_voucher() {
        $voc_id = $this->input->post('voc_id');
		$voc_name = $this->input->post('voc_name');
        $voc_kode = $this->input->post('voc_kode');
        $voc_nominal = $this->input->post('voc_nominal');
        $expired = $this->input->post('expired');
        $iduser = $this->session->userdata('user_id');
        $data = array(
            'voc_name' => $voc_name, 
            'voc_kode' => $voc_kode, 
            'voc_nominal' => $voc_nominal, 
            'expired' => $expired, 
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $iduser
        );
		$this->db->where('voc_id', $voc_id);
		$this->db->update('voucher', $data);
		echo json_encode(array("status" => TRUE,'msg'=>'Update Voucher Berhasil'));
	}

	public function delete_voucher($id){
        $iduser = $this->session->userdata('user_id');
        $data = array(
            'status'     => "D", 
            'updated_by' => $iduser,
            'updated_at' => date('Y-m-d H:i:s')
        );
		$this->db->where('voc_id', $id);
		$this->db->update('voucher', $data);
		echo json_encode(array("status" => TRUE));
	}

}

/* End of file Home.php */
