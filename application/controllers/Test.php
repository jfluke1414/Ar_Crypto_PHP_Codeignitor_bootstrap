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
	    $this->load->view('test_view', $today);	
		$this->_footer();
	}

	public function get_date(){
	    $day = date("j");
	    $month = date("n");
	    $year = date("Y");
	    echo $day." ";
	    
	    
	    $nowdate = date("Y-m-d", strtotime( date("Y-m-d", strtotime( date("Y-m-d") ))));
	    $next_month = date("Y-m-d", strtotime( date("Y-m-d", strtotime( date("Y-m-d") )) . "+1 month" ));
	    $before_month = date("Y-m-d", strtotime( date("Y-m-d", strtotime( date("Y-m-d"))) . "-1 month" ));
	    echo $nowdate." ";
	    
	    //2020-08-08
	    $plus_15days = date("Y-m-d", strtotime( date("Y-m-d", strtotime( date("Y-m-d") )) . "+15 day" )); //2020-08-23
	    $minus_15days = date("Y-m-d", strtotime( date("Y-m-d", strtotime( date("Y-m-d"))) . "-15 day" )); //2020-07-24
	    echo $plus_15days." ";
	    echo $minus_15days." ";
	    
	    //get month
	    $date = "2010-08-12";
	    $d = date_parse_from_format("Y-m-d", $date);
// 	    echo $d["month"];
	    
	    
	    //Month last day
	    $lastDayThisMonth = date("Y-m-t");
	    $lastday_p15 = date("Y-m-t", strtotime( date("Y-m-d", strtotime( date("Y-m-d"))) . "-15 day" )); //2020-07-31
	    $lastday_m15 = date("Y-m-t", strtotime( date("Y-m-d", strtotime( date("Y-m-d") )) . "+15 day" )); //2020-08-31
	    $lastday_beforemonth = date("t", strtotime( date("Y-m-d", strtotime( date("Y-m-d") )) . "-1 month" )); //2020-08-31
	    echo $lastday_p15." ";
	    echo $lastday_beforemonth." ";
	    
	    
	    $today_beforemonth = date("d", strtotime( date("Y-m-d", strtotime( date("Y-m-d"))) . "-1 month" ));
	    $lastmonth = date("n", strtotime( date("Y-m-d", strtotime( date("Y-m-d") )) . "-1 month" ));
	    
	    echo $lastmonth;
	    
	    $number = 8;
	    $number = sprintf('%02d',$number);
// 	    echo $number;
	    
	    
	    
	    
	}
	
	function get_user_coin_areachart(){
    	$year = date("Y");
    	$month = date("n");
    	$today = date("j");
    	$nowdate = date("Y-m-d", strtotime( date("Y-m-d", strtotime( date("Y-m-d") ))));
    	$before_month = date("Y-m-d", strtotime( date("Y-m-d", strtotime( date("Y-m-d"))) . "-1 month" ));
    	$lastday_beforemonth = date("t", strtotime( date("Y-m-d", strtotime( date("Y-m-d") )) . "-1 month" )); //2020-08-31
    	$beforemonth_month = date("n", strtotime( date("Y-m-d", strtotime( date("Y-m-d") )) . "-1 month" ));//7
    	
    	$this->load->model('Mains');
    	$areachart_data = $this->Mains->get_total_fromto($today, $month, $year, $before_month, $lastday_beforemonth, $beforemonth_month);
    	
    	$areachart_data_arr = array();
    	
//     	foreach($areachart_data as $s){
//     	    array_push($areachart_data_arr, $s->sum);
//         }
        var_dump($areachart_data);
        	
	}
	
}


