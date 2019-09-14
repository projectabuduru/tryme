<?php
class error404 extends CI_Controller
{
	public function __construct()
	{
	        parent::__construct();
	}
 
	public function index()
	{
		$this->output->set_status_header('404');
		$data = [
			'title' => 'Error 404'
		];
		$this->template->display('index', $data);
	}
}
?>