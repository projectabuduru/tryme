<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
    	parent::__construct();
    	$this->load->model('m_user');
	}
	
	public function index(){
		if($this->session->userdata('logged_in') == TRUE ){
	        redirect('home');
		}
		$this->load->view('login/v_login');
	}


	public function cek(){
		$username = $this->input->post('username');
		$pass     = $this->input->post('password');
		$login    = $this->m_user->login($username, $pass);

		if($login){
			redirect('back_office/Home');
			$result['STATUS'] = "berhasil";
			$result['MESSAGE'] = "Login Berhasil !";
			// echo json_encode($result);
		} else{
			$data['STATUS'] = "gagal";
			$data['MESSAGE'] = "Username Atau Password Anda Salah !";
			$this->load->view('login/v_login',$data);
		}
	}
}