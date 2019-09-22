<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

    
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
        $this->load->view('bank/v_bank',$data); 	
	}
	
    function get_all_bank(){
        $this->db->where('status !=', "D");
		$result = $this->db->get('master_bank')->result_array();
		$json = array();
		$no = 1;
		foreach ($result as $row) {
            $data['no']                      = $no;
            $data['bank_id']                 = $row['bank_id'];
            $data['bank_nama']               = $row['bank_nama'];
            $data['bank_rekening']           = $row['bank_rekening'];
			$data['bank_atas_nama']          = $row['bank_atas_nama'];
            $data['status']                  = ($row['status'] == "Y")?"Aktif":"Non AKtif";
            $no++;
            $json[] = $data;
		}
		header('Content-Type: application/json');
		$jTableResult = array();
		$jTableResult['Result'] = "sukses";
		$jTableResult['data'] = $json;
		print json_encode($jTableResult);
	}

	public function modalbank() {
		$this->load->view('modal/bank',null,FALSE);
	}

	public function modal_update_bank($id) {
        $this->db->where('bank_id', $id);
		$bank = $this->db->get('master_bank')->row();
        $data['bank']    = $bank;
		$this->load->view('modal/bank',$data,FALSE);
    }
    
	public function create_bank() {
		$bank_nama = $this->input->post('bank_nama');
		$bank_rekening = $this->input->post('bank_rekening');
		$bank_atas_nama = $this->input->post('bank_atas_nama');
		$status = $this->input->post('status');
		$iduser = $this->session->userdata('user_id');
		$nama_file = $bank_nama."-".time();
		$config['upload_path']   = './assets/images/bank/';
		$config['file_name'] = $nama_file;
	    $config['allowed_types'] = 'jpg|png|jpeg';
	    $this->load->library('upload', $config);
		// script upload file pertama
		if ( ! $this->upload->do_upload('bank_foto')) {
			$data = array("status" => FALSE,'msg' => 'gagal melakukan upload gambar');
			echo json_encode($data); 
		 }else { 
			$foto = $this->upload->data();
			$size = $foto['file_size'];
			if ($size == NULL) {
				$foto1 = NULL;
			} else {
				$foto1 = $foto['file_name'];
			}
			$data = array(
				'bank_nama' => $bank_nama, 
				'bank_rekening' => $bank_rekening, 
				'bank_atas_nama' => $bank_atas_nama, 
				'status' => $status, 
				'bank_foto' => $foto1,
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $iduser
			);
			$this->db->insert('master_bank', $data);
			$this->db->insert_id();
			echo json_encode(array("status" => TRUE,'msg'=>'Insert Data Bank Berhasil'));
		 } 
	}

	public function update_bank() {
        $id = $this->input->post('bank_id');
		$bank_nama = $this->input->post('bank_nama');
		$bank_rekening = $this->input->post('bank_rekening');
		$bank_atas_nama = $this->input->post('bank_atas_nama');
		$status = $this->input->post('status');
        $iduser = $this->session->userdata('user_id');
        $nama_file = $bank_nama."-".time();
		$config['upload_path']   = './assets/images/bank/';
		$config['file_name'] = $nama_file;
	    $config['allowed_types'] = 'jpg|png|jpeg';
	    $this->load->library('upload', $config);
		// script upload file pertama
	    $this->upload->do_upload('bank_foto');
		$foto = $this->upload->data();
		$size = $foto['file_size'];
		if ($size == NULL) {
			$foto1 = NULL;
		} else {
			$foto1 = $foto['file_name'];
		}
		if ($foto1 != NULL) {
			$this->db->where('bank_id', $id);
			$a = $this->db->get('master_bank')->row();
			if ($a->product_image != NULL) {
				unlink('/assets/images/bank/'.$a->bank_foto);
			}
			$data = array(
				'bank_nama' => $bank_nama, 
				'bank_rekening' => $bank_rekening, 
				'bank_atas_nama' => $bank_atas_nama, 
				'status' => $status, 
				'bank_foto' => $foto1,
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $iduser
			);
		} else {
			$data = array(
				'bank_nama' => $bank_nama, 
				'bank_rekening' => $bank_rekening, 
				'bank_atas_nama' => $bank_atas_nama, 
				'status' => $status, 
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $iduser
			);
		}
		$this->db->where('bank_id', $id);
		$this->db->update('master_bank', $data);
		echo json_encode(array("status" => TRUE,'msg'=>'Update Data Bank Berhasil'));
	}

	public function delete_bank($id){
        $iduser = $this->session->userdata('user_id');
        $data = array(
            'status'     => "D", 
            'updated_by' => $iduser,
            'updated_at' => date('Y-m-d H:i:s')
        );
		$this->db->where('bank_id', $id);
		$this->db->update('master_bank', $data);
		echo json_encode(array("status" => TRUE));
	}

}

/* End of file Home.php */
