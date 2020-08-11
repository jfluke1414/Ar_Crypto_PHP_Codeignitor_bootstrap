<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Market extends Crypto_Controller {

	public function __construct(){
		parent::__construct();
		$this->_header();
	}
	
	public function index(){		
	    $ex_name = 'coinone';
	    $data[$ex_name] = $this->get_coin_info($ex_name);
	    
	    $ex_name = 'coinfield';
	    $data[$ex_name] = $this->get_coin_info($ex_name);
	    
	    $ex_name = 'huobi';
	    $data[$ex_name] = $this->get_coin_info($ex_name);
	    
	    $ex_name = 'upbit';
	    $data[$ex_name] = $this->get_coin_info($ex_name);
	    
	    $ex_name = 'bithumb';
	    $data[$ex_name] = $this->get_coin_info($ex_name);
	    
	    $ex_name = 'bittrex';
	    $data[$ex_name] = $this->get_coin_info($ex_name);
	    
	    $ex_name = 'poloniex';
	    $data[$ex_name] = $this->get_coin_info($ex_name);
	    
	    $data_list['data'] = $data;	    
		$this->load->view('market_view', $data_list);
		$this->_footer();
	}
	
	function get_coin_info($ex_name){
	    $this->load->model('Mains');
	    $data = $this->Mains->get_coin_data($ex_name);
	    return $data;
	}
	
	function get_exchange_info(){
	    $this->load->model('Mains');
	    $data = $this->Mains->get_exchange_rate();
	    return $data;
	}
}
