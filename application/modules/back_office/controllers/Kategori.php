<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    
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
        $this->load->view('kategori/v_kategori',$data); 	
	}
	
    function get_all_kategori(){
        $this->db->where('status !=', "D");
		$result = $this->db->get('master_category')->result_array();
		$json = array();
		$no = 1;
		foreach ($result as $row) {
            $data['no']                      = $no;
            $data['cate_id']               = $row['cate_id'];
			$data['cate_name']               = $row['cate_name'];
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

	public function modalkategori() {
		$this->load->view('modal/kategori',null,FALSE);
	}

	public function modal_update_kategori($id) {
        $this->db->where('cate_id', $id);
		$kategori = $this->db->get('master_category')->row();
        $data['kategori']    = $kategori;
		$this->load->view('modal/kategori',$data,FALSE);
    }
    
	public function create_kategori() {
		$cate_name = $this->input->post('cate_name');
        $status = $this->input->post('status');
        $iduser = $this->session->userdata('user_id');
        $data = array(
            'cate_name' => $cate_name, 
            'status' => $status, 
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $iduser
        );
        $this->db->insert('master_category', $data);
        $this->db->insert_id();
        echo json_encode(array("status" => TRUE,'msg'=>'Insert Kategori Berhasil'));
	}

	public function update_kategori() {
		$cate_id = $this->input->post('cate_id');
		$cate_name = $this->input->post('cate_name');
        $status = $this->input->post('status');
        $iduser = $this->session->userdata('user_id');
        $data = array(
            'cate_name'  => $cate_name, 
            'status'     => $status, 
            'updated_by' => $iduser,
            'updated_at' => date('Y-m-d H:i:s')
        );
		$this->db->where('cate_id', $cate_id);
		$this->db->update('master_category', $data);
		echo json_encode(array("status" => TRUE,'msg'=>'Update Kategori Berhasil'));
	}

	public function delete_kategori($id){
        $iduser = $this->session->userdata('user_id');
        $data = array(
            'status'     => "D", 
            'updated_by' => $iduser,
            'updated_at' => date('Y-m-d H:i:s')
        );
		$this->db->where('cate_id', $id);
		$this->db->update('master_category', $data);
		echo json_encode(array("status" => TRUE));
	}

}

/* End of file Home.php */
