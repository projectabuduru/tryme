<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

    
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
        $this->load->view('pengeluaran/v_pengeluaran',$data); 	
	}
	
    function get_all_pengeluaran(){
        $this->db->where('status !=', "D");
		$result = $this->db->get('pengeluaran')->result_array();
		$json = array();
		$no = 1;
		foreach ($result as $row) {
            $data['no']                 = $no;
            $data['id_pengeluaran']     = $row['id_pengeluaran'];
			$data['tgl_pengeluaran']    = $row['tgl_pengeluaran'];
            $data['nama_pengeluaran']   = $row['nama_pengeluaran'];
            $data['jumlah_pengeluaran'] = $row['jumlah_pengeluaran'];
            $data['total_harga']        = $row['total_harga'];
            $data['keterangan']         = $row['keterangan'];
            $data['status']             = $row['status'];
            $no++;
            $json[] = $data;
		}
		header('Content-Type: application/json');
		$jTableResult = array();
		$jTableResult['Result'] = "sukses";
		$jTableResult['data'] = $json;
		print json_encode($jTableResult);
	}

	public function modalpengeluaran() {
		$this->load->view('modal/pengeluaran',null,FALSE);
	}

	public function modal_update_pengeluaran($id) {
        $this->db->where('id_pengeluaran', $id);
		$pengeluaran = $this->db->get('pengeluaran')->row();
        $data['pengeluaran']    = $pengeluaran;
		$this->load->view('modal/pengeluaran',$data,FALSE);
    }
    
	public function create_pengeluaran() {
		$tgl_pengeluaran = $this->input->post('tgl_pengeluaran');
        $nama_pengeluaran = $this->input->post('nama_pengeluaran');
        $jumlah_pengeluaran = $this->input->post('jumlah_pengeluaran');
        $total_harga = $this->input->post('total_harga');
        $keterangan = $this->input->post('keterangan');
        $iduser = $this->session->userdata('user_id');
        $data = array(
            'tgl_pengeluaran' => $tgl_pengeluaran, 
            'nama_pengeluaran' => $nama_pengeluaran, 
            'jumlah_pengeluaran' => $jumlah_pengeluaran, 
            'total_harga' => $total_harga, 
            'keterangan' => $keterangan, 
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $iduser
        );
        $this->db->insert('pengeluaran', $data);
        $this->db->insert_id();
        echo json_encode(array("status" => TRUE,'msg'=>'Insert Pengeluaran Berhasil'));
	}

	public function update_pengeluaran() {
        $id_pengeluaran = $this->input->post('id_pengeluaran');
		$tgl_pengeluaran = $this->input->post('tgl_pengeluaran');
        $nama_pengeluaran = $this->input->post('nama_pengeluaran');
        $jumlah_pengeluaran = $this->input->post('jumlah_pengeluaran');
        $total_harga = $this->input->post('total_harga');
        $keterangan = $this->input->post('keterangan');
        $iduser = $this->session->userdata('user_id');
        $data = array(
            'tgl_pengeluaran' => $tgl_pengeluaran, 
            'nama_pengeluaran' => $nama_pengeluaran, 
            'jumlah_pengeluaran' => $jumlah_pengeluaran, 
            'total_harga' => $total_harga, 
            'keterangan' => $keterangan, 
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $iduser
        );
		$this->db->where('id_pengeluaran', $id_pengeluaran);
		$this->db->update('pengeluaran', $data);
		echo json_encode(array("status" => TRUE,'msg'=>'Update Pengeluaran Berhasil'));
	}

	public function delete_pengeluaran($id){
        $iduser = $this->session->userdata('user_id');
        $data = array(
            'status'     => "D", 
            'updated_by' => $iduser,
            'updated_at' => date('Y-m-d H:i:s')
        );
		$this->db->where('id_pengeluaran', $id);
		$this->db->update('pengeluaran', $data);
		echo json_encode(array("status" => TRUE));
	}

}

/* End of file Home.php */
