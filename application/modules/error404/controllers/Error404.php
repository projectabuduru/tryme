<?php
class error404 extends CI_Controller
{
	public function __construct()
	{
			parent::__construct();
			$this->load->model('front_office/Mod_user', 'user');
	}
 
	public function index()
	{
		$this->output->set_status_header('404');
		$cek_session = !empty($this->session->userdata('user')) ? $this->session->userdata('user')['user_id'] : null;
		$data['user'] = get_user_login($cek_session);
		$data['title'] = 'Error 404';
		// pre($data);
		$this->template->display('index', $data);
	}
}
?>