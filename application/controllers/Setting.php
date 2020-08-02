<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends Crypto_controller {
    
    public function __construct(){
        parent::__construct();
        $this->init();
    }
    
    public function init(){
        $this->_header();
    }
    
    public function index(){
        $this->load->model('Musers');
        $data['result'] = $this->Musers->get_coin_kind();
        
        $this->load->view('setting_view', $data);
        $this->_footer();
        
    }
    
    public function save_user_coin_ajax(){
        $this->load->model('Musers');
        
        if($this->Musers->get_user_coin()){
            $this->Musers->change_user_coin();
            $msg="updated user coin information.";
        } else {
            $this->Musers->create_usercoin_info();
            $msg="created new user coin information.";
        }

        echo json_encode(array('status' => 'success', 'message' => $msg));
        exit;
    }
    
    
    
}


?>