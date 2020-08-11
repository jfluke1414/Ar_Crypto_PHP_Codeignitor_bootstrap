<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends Crypto_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->library('session');
		$this->_manageheader();
	}

	public function index(){
		if($this->session->userdata('isadmin') == true){
			$this->_news_list();
		} else {
			$this->load->view('/manage/login_view');
		}
	}

	public function write(){
		$this->_login_chk();
		$this->load->view('/manage/write_view');
	}
	
	public function inquiry(){
		$this->_login_chk();
		$this->load->view('/manage/inquiry_view');
	}
	
	public function news_lists(){
		$this->_news_list();
	}
	
	public function inquiry_lists(){
		$this->_inquiry_list();
	}
	
	public function make_news(){
		$this->load->model('Manages');
		$this->Manages->save_news();
		
		$msg = "ï¿½ë�±ï¿½ë’ªåª›ï¿½ ï¿½ë²‘æ¿¡ï¿½ ï¿½ë¦ºï¿½ë¿€ï¿½ë’¿ï¿½ë•²ï¿½ë–Ž.";
		echo("<script>alert('$msg');</script>");
		echo("<script>location.href='/manage/write';</script>");
	}
	
	public function make_inquiry(){
		$this->load->model('Manages');
		$this->Manages->save_inquiry();
		
		$msg = "ï¿½ì” ï¿½ìŠœè‡¾ëª„ì“½åª›ï¿½ ï¿½ë²‘æ¿¡ï¿½ ï¿½ë¦ºï¿½ë¿€ï¿½ë’¿ï¿½ë•²ï¿½ë–Ž.";
		echo("<script>alert('$msg');</script>");
		echo("<script>location.href='/manage/inquiry';</script>");
	}
	
	public function _news_list(){	
		$this->_login_chk();
		
		$id = $this->input->get('list_id');
		$data['notice_id'] = $id;
		$this->load->model('Notices');

		$pagenum = $this->uri->segment(3, 1);	//ï¿½ëŸ¹ï¿½ì” ï§žï¿½ è¸°ë�Šìƒ‡
		$outcnt = '5';							//ç”±ÑŠë’ªï¿½ë“ƒ ç•°ì’•ì ° åª›ï¿½ï¿½ë‹”
		
		$params = array();
		$params['outcnt'] = $outcnt;
		$params['pagenum'] = $pagenum;
		$params['call'] = true;
		
		$result = $this->Notices->news_list($params);
		$data['results'] = $result;
		
		$allcnt = $this->Notices->news_count_all();
			
		$data['allcnt'] = $allcnt;
		$data['pagenum'] = $pagenum;
		$data['outcnt'] = $outcnt;
		
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Manage/news_lists';
		$config['total_rows'] = $allcnt;
		$config['per_page'] = $outcnt;
		$config['num_links'] = '4';
		$config['uri_segment'] = '3';
		$config['use_page_numbers'] = TRUE;
	
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		
		$config['prev_link'] = '<img src="/assets/images/icon_left.png" width="25" height="25" alt="" style="vertical-align: middle;">';
		$config['next_link'] = '<img src="/assets/images/icon_right.png" width="25" height="25" alt="" style="vertical-align: middle;">';
		
		$this->pagination->initialize($config);
		$this->load->view('/manage/newsList_view', $data);	
	}
	
	public function _inquiry_list(){	
		$this->_login_chk();
		
		$id = $this->input->get('list_id');
		$data['notice_id'] = $id;
		$this->load->model('Notices');

		$pagenum = $this->uri->segment(3, 1);	//ï¿½ëŸ¹ï¿½ì” ï§žï¿½ è¸°ë�Šìƒ‡
		$outcnt = '5';							//ç”±ÑŠë’ªï¿½ë“ƒ ç•°ì’•ì ° åª›ï¿½ï¿½ë‹”
		
		$params = array();
		$params['outcnt'] = $outcnt;
		$params['pagenum'] = $pagenum;
		$params['call'] = true;
		
		$result = $this->Notices->inquiry_list($params);
		$data['results'] = $result;
		
		$allcnt = $this->Notices->inquiry_count_all();
			
		$data['allcnt'] = $allcnt;
		$data['pagenum'] = $pagenum;
		$data['outcnt'] = $outcnt;
		
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Manage/inquiry_lists';
		$config['total_rows'] = $allcnt;
		$config['per_page'] = $outcnt;
		$config['num_links'] = '4';
		$config['uri_segment'] = '3';
		$config['use_page_numbers'] = TRUE;
	
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		
		$config['prev_link'] = '<img src="/assets/images/icon_left.png" width="25" height="25" alt="" style="vertical-align: middle;">';
		$config['next_link'] = '<img src="/assets/images/icon_right.png" width="25" height="25" alt="" style="vertical-align: middle;">';
		
		$this->pagination->initialize($config);
		$this->load->view('/manage/inquiryList_view', $data);	
	}
	
	public function _login_chk(){
		if(!$this->session->userdata('isadmin'))
		{
			redirect('/Manage','location');
			return true;
		}
	}
	
	function login_end(){
		Header("Content-type: text/html; charset=UTF-8");
		// Load the model
		$this->load->model('Manages');
		// Validate the user can login
		$result = $this->Manages->login_check();
		
		// Now we verify the result
		if(! $result){
			// If user did not validate, then show them login page again
			$msg = "ï¿½ë¸˜ï¿½ì” ï¿½ëµ’ ï¿½ìƒŠï¿½ï¿½ é�®ê¾¨ï¿½è¸°ë�Šìƒ‡åª›ï¿½ ï¿½ì”ªç§»ì„‘ë¸¯ï§žï¿½ ï¿½ë¸¡ï¿½ë’¿ï¿½ë•²ï¿½ë–Ž.";
			echo("
			<script>
			alert('$msg');
			history.back();
			</script>
			");
			exit;
		}else{
			// If user did validate, 
			// Send them to members area
			redirect('/Manage/news_lists','location');
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('/Manage', 'location');
	}

	public function admin_edit_news(){
		$id = $this->input->post('post_id');
		
		$this->load->model('Manages');
		$result = $this->Manages->get_news($id);
	
		foreach($result as $list){
			$id = $list->id;
			$title = $list->title;
			$content = $list->contents;
		}

		echo json_encode(array('status' => 'success', 'id' => $id, 'title' => $title, 'content' => $content));
		exit;
	}
	
	public function admin_edit_inquiry(){
		$id = $this->input->post('post_id');
		
		$this->load->model('Manages');
		$result = $this->Manages->get_inquiry($id);
	
		foreach($result as $list){
			$id = $list->id;
			$title = $list->title;
			$content = $list->contents;

		}
		echo json_encode(array('status' => 'success', 'id' => $id, 'title' => $title, 'content' => $content));
		exit;
	}	
	
	public function save_news_modified(){
		$this->load->model('Manages');
		$this->Manages->edit_news();

		$msg = "ï¿½ë�±ï¿½ë’ªåª›ï¿½ ï¿½ë‹”ï¿½ì ™ ï¿½ë¦ºï¿½ë¿€ï¿½ë’¿ï¿½ë•²ï¿½ë–Ž.";
		echo json_encode(array('status' => 'success', 'message' => $msg));
		exit;
	}
	
	public function save_inquiry_modified(){
		$this->load->model('Manages');
		$this->Manages->edit_inquiry();

		$msg = "ï¿½ì” ï¿½ìŠœè‡¾ëª„ì“½åª›ï¿½ ï¿½ë‹”ï¿½ì ™ ï¿½ë¦ºï¿½ë¿€ï¿½ë’¿ï¿½ë•²ï¿½ë–Ž.";
		echo json_encode(array('status' => 'success', 'message' => $msg));
		exit;
	}	
	
	
	public function del_rel(){
		$id = $this->input->post('post_id');

		$this->load->model('Manages');
		$this->Manages->del_rel($id);
		
		$msg="Delete completed";
		echo json_encode(array('status' => 'success','message'=> $msg));
		exit;
	}

	public function del_inquiry(){
		$id = $this->input->post('post_id');
		
		$this->load->model('Manages');
		$this->Manages->del_inquiry($id);
		
		$msg="Delete completed";
		echo json_encode(array('status' => 'success','message'=> $msg));
		exit;
	}

}
