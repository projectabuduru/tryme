<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_product');
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
        $this->load->view('product/v_product',$data); 	
	}
	
    function get_all_product(){
        $result    = $this->M_product->get_data_all();
		$json = array();
		$no = 1;
		foreach ($result as $row) {
			$data['no']                      = $no;
			$data['product_id']              = $row['product_id'];
			$data['cate_id']                 = $row['cate_id'];
			$data['product_name']            = $row['product_name'];
			$data['product_price']	         = $row['product_price'];
			$data['product_price_partner']   = $row['product_price_partner'];
			$data['product_image']           = $row['product_image'];
			$data['product_stok']            = $row['product_stok'];
			$data['product_manfaat']         = $row['product_manfaat'];
			$data['cate_name']               = $row['cate_name'];
			$data['product_description']     = $row['product_description'];
            $no++;
            $json[] = $data;
		}
		header('Content-Type: application/json');
		$jTableResult = array();
		$jTableResult['Result'] = "sukses";
		$jTableResult['data'] = $json;
		print json_encode($jTableResult);
	}

	public function modalproduk() {
		$category    = $this->M_product->get_category_product();
		$data['kategori']    = $category;
		$this->load->view('modal/produk',$data,FALSE);
	}

	public function modal_update_produk($id) {
		$category    = $this->M_product->get_category_product();
		$product     = $this->M_product->get_data_product($id);
		$data['kategori']    = $category;
		$data['product']    = $product;
		$this->load->view('modal/produk',$data,FALSE);
	}

	public function modal_detail_product($id) {
		$product     = $this->M_product->get_data_product($id);
		$data['product']    = $product;
		$data['type']    	= "view";
		$this->load->view('modal/produk',$data,FALSE);
	}

	public function create_product() {
		$cate_id = $this->input->post('cate_id');
		$product_name = $this->input->post('product_name');
		$product_price = $this->input->post('product_price');
		$product_price_partner = $this->input->post('product_price_partner');
		$product_stock = $this->input->post('product_stock');
		$product_description = $this->input->post('product_description');
		$product_manfaat = $this->input->post('product_manfaat');
		$product_berat = $this->input->post('product_berat');
		$iduser = $this->session->userdata('user_id');
		$nama_file = $product_name."-".time();
		$config['upload_path']   = './assets/images/product/';
		$config['file_name'] = $nama_file;
	    $config['allowed_types'] = 'jpg|png|jpeg';
	    $this->load->library('upload', $config);
		// script upload file pertama
		if ( ! $this->upload->do_upload('product_image')) {
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
				'cate_id' => $cate_id, 
				'product_name' => $product_name, 
				'product_price' => $product_price, 
				'product_price_partner' => $product_price_partner, 
				'product_stok' => $product_stock, 
				'product_description' => $product_description, 
				'product_manfaat' => $product_manfaat, 
				'product_berat' => $product_berat, 
				'product_image' => $foto1,
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $iduser
			);
			$this->db->insert('data_product', $data);
			$this->db->insert_id();
			echo json_encode(array("status" => TRUE,'msg'=>'Insert Produk Berhasil'));
		 } 
	}

	public function update_product() {
		$id = $this->input->post('product_id');
		$cate_id = $this->input->post('cate_id');
		$product_name = $this->input->post('product_name');
		$product_price = $this->input->post('product_price');
		$product_price_partner = $this->input->post('product_price_partner');
		$product_stock = $this->input->post('product_stock');
		$product_description = $this->input->post('product_description');
		$product_manfaat = $this->input->post('product_manfaat');
		$product_berat = $this->input->post('product_berat');
		$iduser = $this->session->userdata('user_id');
		$nama_file = $product_name."-".time();
		$config['upload_path']   = './assets/images/product/';
		$config['file_name'] = $nama_file;
	    $config['allowed_types'] = 'jpg|png|jpeg';
	    $this->load->library('upload', $config);
		// script upload file pertama
	    $this->upload->do_upload('product_image');
		$foto = $this->upload->data();
		$size = $foto['file_size'];
		if ($size == NULL) {
			$foto1 = NULL;
		} else {
			$foto1 = $foto['file_name'];
		}
		if ($foto1 != NULL) {
			$this->db->where('product_id', $id);
			$a = $this->db->get('data_product')->row();
			if ($a->product_image != NULL) {
				unlink('/assets/images/product/'.$a->product_image);
			}
			$data = array(
				'cate_id' => $cate_id, 
				'product_name' => $product_name, 
				'product_price' => $product_price, 
				'product_price_partner' => $product_price_partner, 
				'product_stok' => $product_stock, 
				'product_description' => $product_description, 
				'product_manfaat' => $product_manfaat, 
				'product_berat' => $product_berat, 
				'product_image' => $foto1,
				'updated_by' => $iduser,
				'updated_at' => date('Y-m-d H:i:s')
			);
		} else {
			$data = array(
				'cate_id' => $cate_id, 
				'product_name' => $product_name, 
				'product_price' => $product_price, 
				'product_price_partner' => $product_price_partner, 
				'product_stok' => $product_stock, 
				'product_description' => $product_description, 
				'product_manfaat' => $product_manfaat, 
				'product_berat' => $product_berat, 
				'updated_by' => $iduser,
				'updated_at' => date('Y-m-d H:i:s')
			);
		}
		$this->db->where('product_id', $id);
		$this->db->update('data_product', $data);
		echo json_encode(array("status" => TRUE,'msg'=>'Update Produk Berhasil'));
	}

	public function delete_product($id){
		$iduser = $this->session->userdata('user_id');
        $data = array(
            'status'     => "D", 
            'updated_by' => $iduser,
            'updated_at' => date('Y-m-d H:i:s')
        );
		$this->db->where('product_id', $id);
		$this->db->update('data_product', $data);
		echo json_encode(array("status" => TRUE));
	}

}

/* End of file Home.php */
