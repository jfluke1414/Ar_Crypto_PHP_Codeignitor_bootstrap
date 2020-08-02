<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends Crypto_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('download');
		
	}
	
	public function index()
	{		
		$this->load->view('test_view');	
		$this->_footer();
	}

	
}

