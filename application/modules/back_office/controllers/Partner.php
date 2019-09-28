<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends CI_Controller {

    
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
        $this->load->view('admin/v_partner',$data); 	
	}
	
    function get_all_partner(){
        $this->db->where('status !=', "D");
        $this->db->where_not_in('role', array('admin', 'super_admin'));
		$result = $this->db->get('user')->result_array();
		$json = array();
		$no = 1;
		foreach ($result as $row) {
            $data['no']                      = $no;
            $data['user_id']                 = $row['user_id'];
            $data['user_nama']               = $row['user_nama'];
            $data['user_email']              = $row['user_email'];
            $data['user_telp']               = $row['user_telp'];
            $data['role']                    = $row['role'];
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

	public function modalpartner() {
		$this->load->view('modal/partner',null,FALSE);
	}

	public function modal_update_partner($id) {
        $this->db->where('user_id', $id);
		$admin = $this->db->get('user')->row();
        $data['admin']    = $admin;
		$this->load->view('modal/partner',$data,FALSE);
    }

	public function update_admin() {
        $id = $this->input->post('user_id');
        $user_nama = $this->input->post('user_nama');
        $user_password = $this->input->post('user_password');
        $hash_password = md5('tryme'.$user_password);
		$user_email = $this->input->post('user_email');
		$user_telp = $this->input->post('user_telp');
        $role = $this->input->post('role');
        $status = $this->input->post('status');
		$iduser = $this->session->userdata('user_id');
        $nama_file = $user_nama."-".time();
		$config['upload_path']   = './assets/images/user/';
		$config['file_name'] = $nama_file;
	    $config['allowed_types'] = 'jpg|png|jpeg';
	    $this->load->library('upload', $config);
		// script upload file pertama
	    $this->upload->do_upload('user_image');
		$foto = $this->upload->data();
		$size = $foto['file_size'];
		if ($size == NULL) {
			$foto1 = NULL;
		} else {
			$foto1 = $foto['file_name'];
		}
		if ($foto1 != NULL) {
			$this->db->where('user_id', $id);
			$a = $this->db->get('user')->row();
			if ($a->product_image != NULL) {
				unlink('/assets/images/user/'.$a->user_image);
			}
			$data = array(
				'user_nama' => $user_nama, 
				'user_password' => $hash_password, 
                'user_email' => $user_email, 
                'user_telp' => $user_telp, 
				'role' => $role, 
				'status' => $status, 
				'user_image' => $foto1,
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $iduser
			);
		} else {
			$data = array(
				'user_nama' => $user_nama, 
				'user_password' => $hash_password, 
                'user_email' => $user_email, 
                'user_telp' => $user_telp, 
				'role' => $role, 
				'status' => $status, 
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $iduser
			);
		}
		$this->db->where('user_id', $id);
		$this->db->update('user', $data);
		echo json_encode(array("status" => TRUE,'msg'=>'Update Data User Berhasil'));
	}

	public function nonaktif_user($id){
        $iduser = $this->session->userdata('user_id');
        $data = array(
            'status'     => "N", 
            'updated_by' => $iduser,
            'updated_at' => date('Y-m-d H:i:s')
        );
		$this->db->where('user_id', $id);
		$this->db->update('user', $data);
		echo json_encode(array("status" => TRUE));
	}

}

/* End of file Home.php */
