<?php 
	/**
	 * summary
	 */
	class Template {
	    /**
	     * summary
	     */
	    protected $_ci;

	    public function __construct(){
        	$this->_ci = &get_instance();
	    }

	    function display( $template, $data = NULL){

	    	$data['_header']    = $this->_ci->load->view('templates/header', $data, TRUE);
			$data['_content']   = $this->_ci->load->view($template, $data, TRUE);
			$data['_footer']    = $this->_ci->load->view('templates/footer', $data, TRUE);
			$this->_ci->load->view('templates/template', $data); 	
			
		}
	}
?>