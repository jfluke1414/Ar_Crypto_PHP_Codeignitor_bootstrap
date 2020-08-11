<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends Crypto_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('captcha');		
	}
	
	public function index()
	{		
// 		$url = base_url();
// 		$captcha_word = rand(23678190, 96523469);
		
// 		$captcha = array(
// 			'word'   => $captcha_word,
// 			'img_path'  => './captcha/',
// 			'img_url'  => ''.base_url().'captcha/',			
// 			'img_width'  => '160',
// 			'img_height'  => '40',
// 			'expiration'  => '3600'
// 		);
		
// 		$data['captcha'] = create_captcha($captcha);
// 		$sessi_cap = $data['captcha']['word'];
		
// 		$this->session->set_userdata('captchaword', $sessi_cap);
		
// 		$this->load->view('support_view', $data);	
// 		$this->_footer();
	    echo("<script>alert('Sorry, Coming soon.');history.back();</script>");
	}
	
	
	public function remake_captcha(){
		$url = base_url();
		$captcha_word = rand(23678190, 96523469);
		
		$captcha = array(
			'word'   => $captcha_word,
			'img_path'  => './captcha/',
			'img_url'  => ''.base_url().'captcha/',			
			'img_width'  => '160',
			'img_height'  => '40',
			'expiration'  => '3600'
		);
		
		$data['captcha'] = create_captcha($captcha);
		$sessi_cap = $data['captcha']['word'];
		$cap_image = $data['captcha']['image'];
		
		$this->session->set_userdata('captchaword', $sessi_cap);
		
		echo json_encode(array('status' => 'success', 'data'=> $cap_image));
		exit;

	}
	
	public function request(){
		$securekey = $this->input->post("captcha_txt");
		
    	$phone = $this->input->post('phone');    	
    	$consult_chx = $this->input->post('consult_chx');
    	$demo_chx = $this->input->post('demo_chx');
    	$partner_chx = $this->input->post('partner_chx');
    	
    	if($securekey == '' || $securekey == ' ï¿½ì†»æ´¹ï½‹ìƒ�ï¿½ë‡¡ï¿½ì‰®ï¿½ë‹±ç­Œë¤¾ì‘´ï¿½ê²±å� ìŽˆã�”ï¿½ëœ�å� ï¿½ ï¿½ëœ�ï¿½ëŸ©è‚‰ï¿½ï¿½ëœ�ï¿½ëŸ©ï¿½ì¡‘ï¿½ëœ�ï¿½ëŸ¥ï¿½ë�µ ï¿½ì�’ï¿½ìŠ£ï¿½ë‹”ï¿½ë•»å� ì�²ëœ�ï¿½ëŸ©ï¿½ë­µ.'){
			echo("<script>alert('ï¿½ì†»æ´¹ï½‹ìƒ�ï¿½ë‡¡å� ï¿½ å� ìŽˆë‹±ç­Œë¤¾ì‘´ï¿½ê²±å� ìŽˆã�”ï¿½ëœ�å� ï¿½ ï¿½ëœ�ï¿½ëŸ©ï¿½ê¼ªï¿½ëœ�ï¿½ëŸ©é€¾Îµëœ�ï¿½ëŸ¥ï¿½ë�µ ï¿½ì�’ï¿½ìŠ£ï¿½ë‹”ï¿½ë•»å� ì�²ëœ�ï¿½ëŸ©ï¿½ë­µ.');history.back();</script>");
			return false;
		}
    	
    	$captchaword = $this->session->userdata('captchaword');
		$captcha_txt = $this->input->post('captcha_txt');

		if($captchaword != $captcha_txt){
			$msg = "ï¿½ì†»æ´¹ï½‹ìƒ�ï¿½ë‡¡ï¿½ì‰®æ�´ì’’ê²«ï¿½ë¼”æ�´â†’ë¤†ï¿½ë£Šï¿½ì‚• ï¿½ëœ�ï¿½ë£žï¿½ì‚•å� ìŽˆëŽ¨å� ìŽˆìœ¥å� ìŽˆí‰µï¿½ëœ�ï¿½ëŸ¥å ‰ï¿½. ï¿½ì†»æ´¹ï½‹ìƒ�ï¿½ë‡¡ï¿½ì‰®æ�´ì’’ê²«ï¿½ë¼”æ�´âˆ½ì˜™ï§�ë‹·ëœ�å� ï¿½ ï¿½ëœ�ï¿½ëŸ©ï¿½ê¼ªï¿½ëœ�ï¿½ëŸ©é€¾Îµëœ�ï¿½ëŸ¥ï¿½ë�µ ï¿½ì�’ï¿½ìŠ£ï¿½ë‹”ï¿½ë•»å� ì�²ëœ�ï¿½ëŸ©ï¿½ë­µ";
			echo("<script>alert('$msg');</script>");
			echo("<script>location.href='/Support';</script>");
			exit;
		} else {
			$this->load->library('session');
			$this->session->set_userdata("captcha_ok", "true");
		}
    	
    	if($consult_chx==null ? $consult_chx = 0:$consult_chx = 1);
    	if($demo_chx==null ? $demo_chx = 0:$demo_chx = 1);
    	if($partner_chx==null ? $partner_chx = 0:$partner_chx = 1);

		$this->load->library('encrypt');
    	$encrypt_phone = $this->encrypt->encode($phone);
    	
    	$data['phone'] = $encrypt_phone;
    	$data['consult_chx'] = $consult_chx;
    	$data['demo_chx'] = $demo_chx;
    	$data['partner_chx'] = $partner_chx;
    	
    	$this->load->model('Requests');
    	$this->Requests->save_request($data);
		
		$msg = "å� ìŽˆë‹±ç­Œë¤¾ì‘´è¸°ï¿½ ï¿½ëœ�ï¿½ëŸ©ï¿½ë­µï¦«ëš³í�¦ï¿½ì‚• ï¿½ëœ�ï¿½ëŸ©ï¿½ê±¦å� ìŽˆì‡€å� ìŽŒë’§ï¿½ëµ³é‡‰ì•¹ì‚•ï¿½êµ¢å� ì�²ëœ�ï¿½ëŸ¥è£•ë©¨ëœ�ï¿½ëŸ¥é�®ë�¶ëœ�ï¿½ëŸ¥å ‰ï¿½.";
		echo("<script>alert('$msg');</script>");
		echo("<script>location.href='/main';</script>");
	}
}

