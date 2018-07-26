<?php

class MY_Controller extends CI_Controller
{
    public $data = array();

	function __construct()
	{
		parent::__construct();
        $this->data['errors'] = array();
        $this->load->model('template/template_m', 'tampilan');
        
        // Login check
		$exception_uris = array(
			'login', 
			'logout',
			'login/process'
		);
		if (in_array(uri_string(), $exception_uris) == FALSE) {
			if ($this->session->userdata('is_loggin') == FALSE) {
				redirect('login');
			}
		}
	}

} 