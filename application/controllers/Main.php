<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Crypto_Controller {

	public function __construct()
	{
		parent::__construct();
// 		$this->init();
	}
	
	public function init(){
	    $this->_header();
// 	    $this->_header_dialog();
	}

	public function test(){
	   echo 'a';
	}
	
	public function index()
	{		
	    if(!$this->inspection()){
            $this->load->view('login_view');
	    } else {
    		$data['exchange'] = $this->get_exchange_info();
    
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
    		
    		$data['subtracted_list'] = $this->get_user_coin();    		
    		$this->_header();
            $this->load->view('main_view', $data);
            $this->_footer();
	    }
	}
	
	function get_user_coin_chart(){
	    $result = $this->get_user_coin_ajax();
	    $sum_arr = $result['sum'];
	    $data = $result['data'];
	    echo json_encode(array('status' => 'success', 'data' => $data, 'sum_arr' => $sum_arr));
	    exit;
	}
	
	function get_user_coin_areachart(){
	    $result = $this->get_user_coin_ajax();
	    $sum_arr = $result['sum'];
	    $data = $result['data'];
	    
	    
	    $year = date("Y");
	    $month = date("n");
	    $today = date("j");
	    $before_month = date("Y-m-d", strtotime( date("Y-m-d", strtotime( date("Y-m-d"))) . "-1 month" ));
	    $lastday_beforemonth = date("t", strtotime( date("Y-m-d", strtotime( date("Y-m-d") )) . "-1 month" )); //2020-08-31
	    $beforemonth_month = date("n", strtotime( date("Y-m-d", strtotime( date("Y-m-d") )) . "-1 month" ));//7
	    
	    $date_info = array(
	        'year' => $year,
	        'month' => $month,
	        'today' => $today,
	        'before_month' => $before_month,
	        'lastday_beforemonth' => $lastday_beforemonth,
	        'beforemonth_month' => $beforemonth_month
	    );
	    $this->load->model('Mains');
	    $areachart_data = $this->Mains->get_total_fromto($today, $month, $year, $before_month, $lastday_beforemonth, $beforemonth_month);
	    
	    $areachart_data_arr = array();
	    foreach($areachart_data as $s){
	        array_push($areachart_data_arr, $s->sum);
	    }
	    
	    echo json_encode(array('status' => 'success', 'data' => $data, 'sum_arr' => $sum_arr, 'ereachart_data' => $areachart_data_arr, 'date_info' => $date_info));
	    exit;
	}
	
	
	function get_user_coin_ajax(){
	    
	    $this->load->model('Musers');
	    $result = $this->Musers->get_user_coin();
	    
	    $currency_btc = 'btc';
	    $currency_eth = 'eth';
	    $currency_xrp = 'xrp';
	    $currency_ltc = 'ltc';
	    $currency_bch = 'bch';
	    $currency_dash = 'dash';
	    $currency_pib = 'pib';
	    $currency_qtum = 'qtum';
	    $currency_snt = 'snt';
	    
	    if($result){
	        foreach($result as $list){
	            $btc_count = $list->btc_count;
	            $eth_count = $list->eth_count;
	            $xrp_count = $list->xrp_count;
	            $ltc_count = $list->ltc_count;
	            $bch_count = $list->bch_count;
	            $dash_count = $list->dash_count;
	            $pib_count = $list->pib_count;
	            $qtum_count = $list->qtum_count;
	            $snt_count = $list->snt_count;
	        }
	    } else {
	        $btc_count = 0;
	        $eth_count = 0;
	        $xrp_count = 0;
	        $ltc_count = 0;
	        $bch_count = 0;
	        $dash_count = 0;
	        $pib_count = 0;
	        $qtum_count = 0;
	        $snt_count = 0;
	    }
	    
	    
	    $this->load->model('Mfunctions');
	    $coin_data = $this->Mfunctions->get_coininfo_selected();
	    
	    
	    foreach($coin_data as $list){
	        if($list->currency == 'btc'){
	            $sum_btc = $list->price * $btc_count;
	            $btc_rate = $list->price;
	        }
	        if($list->currency == 'eth'){
	            $sum_eth = $list->price * $eth_count;
	            $eth_rate = $list->price;
	        }
	        if($list->currency == 'xrp'){
	            $sum_xrp = $list->price * $xrp_count;
	            $xrp_rate = $list->price;
	        }
	        if($list->currency == 'ltc'){
	            $sum_ltc = $list->price * $ltc_count;
	            $ltc_rate = $list->price;
	        }
	        if($list->currency == 'bch'){
	            $sum_bch = $list->price * $bch_count;
	            $bch_rate = $list->price;
	        }
	        if($list->currency == 'dash'){
	            $sum_dash = $list->price * $dash_count;
	            $dash_rate = $list->price;
	        }
	        if($list->currency == 'pib'){
	            $sum_pib = $list->price * $pib_count;
	            $pib_rate = $list->price;
	        }
	        if($list->currency == 'qtum'){
	            $sum_qtum = $list->price * $qtum_count;
	            $qtum_rate = $list->price;
	        }
	        if($list->currency == 'snt'){
	            $sum_snt = $list->price * $snt_count;
	            $snt_rate = $list->price;
	        }
	    }
	    
	    $subtracted_arr['data'] = array(
	        'currency_btc' => strtoupper($currency_btc),
	        'sum_btc' => $sum_btc,
	        	        
	        'currency_eth'=> strtoupper($currency_eth),
	        'sum_eth' => $sum_eth,
	        
	        'currency_xrp'=> strtoupper($currency_xrp),
	        'sum_xrp' => $sum_xrp,
	        
	        'currency_ltc' => strtoupper($currency_ltc),
	        'sum_ltc' => $sum_ltc,
	        
	        'currency_bch'=> strtoupper($currency_bch),
	        'sum_bch' => $sum_bch,
	        
	        'currency_dash' => strtoupper($currency_dash),
	        'sum_dash' => $sum_dash,
	        
	        'currency_pib'=> strtoupper($currency_pib),
	        'sum_pib' => $sum_pib,
	        
	        'currency_qtum'=> strtoupper($currency_qtum),
	        'sum_qtum' => $sum_qtum,
	        
	        'currency_snt'=> strtoupper($currency_snt),
	        'sum_snt' => $sum_snt,
	        
	        'sum_total' => $sum_btc+$sum_eth+$sum_xrp+$sum_ltc+$sum_bch+$sum_dash+$sum_qtum+$sum_pib+$sum_snt
	        
	    );
	    
	    $subtracted_arr['sum'] = array(
	        'btc' => $sum_btc,
	        'eth' => $sum_eth,
	        'xrp' => $sum_xrp,
	        'bch' => $sum_bch,
	        'ltc' => $sum_ltc,
	        'dash' => $sum_dash,
	        'pib' => $sum_pib,
	        'qtum' => $sum_qtum,
	        'snt' => $sum_snt
	    );
	    
	    // 	    $data['$substracted_btc'] = $substracted_btc;
	    // 	    $data['$substracted_eth'] = $substracted_eth;
	    // 	    $data['$substracted_xrp'] = $substracted_xrp;
	    // 	    $data['$substracted_bch'] = $substracted_bch;
	    // 	    $data['$substracted_dash'] = $substracted_dash;
	    // 	    $data['$substracted_pib'] = $substracted_pib;
	    // 	    $data['$substracted_qtum'] = $substracted_qtum;
	    // 	    $data['$substracted_snt'] = $substracted_snt;
	    
	    return $subtracted_arr;
	    
	}
	
	
	function get_user_coin(){
	    
	    $this->load->model('Musers');
	    $result = $this->Musers->get_user_coin();
	    
	    $currency_btc = 'btc';
	    $currency_eth = 'eth';
	    $currency_xrp = 'xrp';
	    $currency_ltc = 'ltc';
	    $currency_bch = 'bch';
	    $currency_dash = 'dash';
	    $currency_pib = 'pib';
	    $currency_qtum = 'qtum';
	    $currency_snt = 'snt';
	    
	    if($result){
	        foreach($result as $list){
	            $btc_count = $list->btc_count;
	            $eth_count = $list->eth_count;
	            $xrp_count = $list->xrp_count;
	            $ltc_count = $list->ltc_count;
	            $bch_count = $list->bch_count;
	            $dash_count = $list->dash_count;
	            $pib_count = $list->pib_count;
	            $qtum_count = $list->qtum_count;
	            $snt_count = $list->snt_count;
	        }
	    } else {
	        $btc_count = 0;
	        $eth_count = 0;
	        $xrp_count = 0;
	        $ltc_count = 0;
	        $bch_count = 0;
	        $dash_count = 0;
	        $pib_count = 0;
	        $qtum_count = 0;
	        $snt_count = 0;
	    }
	    
	    
	    $this->load->model('Mfunctions');
	    $coin_data = $this->Mfunctions->get_coininfo_selected();
	    
	    
	    foreach($coin_data as $list){
	        if($list->currency == 'btc'){
	            $sum_btc = $list->price * $btc_count;
	            $btc_rate = $list->price;
	        }
	        if($list->currency == 'eth'){
	            $sum_eth = $list->price * $eth_count;
	            $eth_rate = $list->price;
	        }
	        if($list->currency == 'xrp'){
	            $sum_xrp = $list->price * $xrp_count;
	            $xrp_rate = $list->price;
	        }
	        if($list->currency == 'ltc'){
	            $sum_ltc = $list->price * $ltc_count;
	            $ltc_rate = $list->price;
	        }
	        if($list->currency == 'bch'){
	            $sum_bch = $list->price * $bch_count;
	            $bch_rate = $list->price;
	        }
	        if($list->currency == 'dash'){
	            $sum_dash = $list->price * $dash_count;
	            $dash_rate = $list->price;
	        }
	        if($list->currency == 'pib'){
	            $sum_pib = $list->price * $pib_count;
	            $pib_rate = $list->price;
	        }
	        if($list->currency == 'qtum'){
	            $sum_qtum = $list->price * $qtum_count;
	            $qtum_rate = $list->price;
	        }
	        if($list->currency == 'snt'){
	            $sum_snt = $list->price * $snt_count;
	            $snt_rate = $list->price;
	        }
	    }
	    
	    
	    $subtracted_arr = array(
	        'currency_btc' => strtoupper($currency_btc),
	        'sum_btc' => number_format($sum_btc, 2, '.', ','),
	        'btc_count' => number_format($btc_count, 2, '.', ','),
	        'btc_rate' => number_format($btc_rate, 2, '.', ','),
	    
	        'currency_eth'=> strtoupper($currency_eth),
	        'sum_eth' => number_format($sum_eth, 2, '.', ','),
	        'eth_count' => number_format($eth_count, 2, '.', ','),
	        'eth_rate' => number_format($eth_rate, 2, '.', ','),
	    
	        'currency_xrp'=> strtoupper($currency_xrp),
	        'sum_xrp' => number_format($sum_xrp, 2, '.', ','),
	        'xrp_count' => number_format($xrp_count, 2, '.', ','),
	        'xrp_rate' => number_format($xrp_rate, 2, '.', ','),
	    
	        'currency_ltc' => strtoupper($currency_ltc),
	        'sum_ltc' => number_format($sum_ltc, 2, '.', ','),
	        'ltc_count' => number_format($ltc_count, 2, '.', ','),
	        'ltc_rate' => number_format($ltc_rate, 2, '.', ','),
	    
	        'currency_bch'=> strtoupper($currency_bch),
	        'sum_bch' => number_format($sum_bch, 2, '.', ','),
	        'bch_count' => number_format($bch_count, 2, '.', ','),
	        'bch_rate' => number_format($bch_rate, 2, '.', ','),
	    
	        'currency_dash' => strtoupper($currency_dash),
	        'sum_dash' => number_format($sum_dash, 2, '.', ','),
	        'dash_count' => number_format($dash_count, 2, '.', ','),
	        'dash_rate' => number_format($dash_rate, 2, '.', ','),
	    
	        'currency_pib'=> strtoupper($currency_pib),
	        'sum_pib' => number_format($sum_pib, 2, '.', ','),
	        'pib_count' => number_format($pib_count, 2, '.', ','),
	        'pib_rate' => number_format($pib_rate, 2, '.', ','),
	    
	        'currency_qtum'=> strtoupper($currency_qtum),
	        'sum_qtum' => number_format($sum_qtum, 2, '.', ','),
	        'qtum_count' => number_format($qtum_count, 2, '.', ','),
	        'qtum_rate' => number_format($qtum_rate, 2, '.', ','),
	    
	        'currency_snt'=> strtoupper($currency_snt),
	        'sum_snt' => number_format($sum_snt, 2, '.', ','),
	        'snt_count' => number_format($snt_count, 2, '.', ','),
	        'snt_rate' => number_format($snt_rate, 2, '.', ','),
	        
	        'sum_total' => number_format($sum_btc+$sum_eth+$sum_xrp+$sum_ltc+$sum_bch+$sum_dash+$sum_qtum+$sum_pib+$sum_snt, 2, '.', ',')
	    );
        
// 	    $data['$substracted_btc'] = $substracted_btc;
// 	    $data['$substracted_eth'] = $substracted_eth;
// 	    $data['$substracted_xrp'] = $substracted_xrp;
// 	    $data['$substracted_bch'] = $substracted_bch;
// 	    $data['$substracted_dash'] = $substracted_dash;
// 	    $data['$substracted_pib'] = $substracted_pib;
// 	    $data['$substracted_qtum'] = $substracted_qtum;
// 	    $data['$substracted_snt'] = $substracted_snt;
	    
	    return $subtracted_arr;
	    
	}
	
	
	
	function get_data(){
	    $ex_arr = array();
	    $ex_arr = $this->input->post('ex_arr');
	    $data = array();
// 	    var_dump($this->input->post('ex_arr'));
// 	    echo ("<script>console.log("+$ex_arr+");</script>");
	    $ex_arr_length = count($ex_arr);
	    for($i=0;$i<$ex_arr_length; $i++){
	       $result = $this->get_coin_info_ajax($ex_arr[$i]);
	       $data = $result;
// 	        $result_len = count($result);
// 	        for($i=0; $i<$result_len; $i++){
// 	            if($result[$i]->id == "coinone"){
// 	                $data['coinone'] = $result[$i];
// 	            }
	            
// 	        }
	    
// 	         $data[$ex_arr[$i]]
	         
	    }

	    echo json_encode(array('status' => 'success', 'data' => $data));
	    exit;
	}

	function get_coin_info_ajax($ex_name){
	    $this->load->model('Mains');
	    $data = $this->Mains->get_coin_info_ajax($ex_name);
	    
	    return $data;
	}
	
	function inspection(){
	    if($this->session->userdata('isuser')){
	        return true;
	    } else{
	        return false;
	    }
	}
	
	function get_coin_info($ex_name){
		$this->load->model('Mains');
		$data = $this->Mains->get_coin_data($ex_name);
		
		return $data;
	}
	
	function save_coin_info($data)
	{
		if($data == null){
			$msg = "Please check data. It's probably empty.";
			echo("
			<script>
			alert('$msg');
			history.back();
			</script>
			");
			exit;
		}
        $this->load->model('Mains');
		$this->Mains->set_coin_data($data);
	}

	function get_coinone_info()
    {
		$coinone_url = 'https://api.coinone.co.kr/ticker/?currency="BTC"';
		
		$curl_handle=curl_init();
		
		curl_setopt($curl_handle, CURLOPT_URL,$coinone_url);
		curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
// 		curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, FALSE);
// 		curl_setopt($curl_handle, CURLOPT_SSL_VERIFYHOST, FALSE);
		
		$coinone_data = curl_exec($curl_handle);

// 		if(curl_exec($curl_handle) === false)
// 		{
// 		    echo 'Curl error: ' . curl_error($curl_handle);
// 		}
// 		else
// 		{
// 		    echo 'Operation completed without any errors';
// 		}
		
		curl_close($curl_handle);
		$data = json_decode($coinone_data);
		
		$btc_arr = $data->btc;
		$eth_arr = $data->eth;
		$xrp_arr = $data->xrp;
		$ltc_arr = $data->ltc;
		$bch_arr = $data->bch;
		$pib_arr = $data->pib;

		$datas = array();
			$datas['btc_currency'] =  $btc_arr->currency;
			$datas['btc_last'] =  $btc_arr->last;
			
			$datas['eth_currency'] =  $eth_arr->currency;
			$datas['eth_last'] =  $eth_arr->last;	
			
			$datas['xrp_currency'] =  $xrp_arr->currency;
			$datas['xrp_last'] =  $xrp_arr->last;	
			
			$datas['ltc_currency'] =  $ltc_arr->currency;
			$datas['ltc_last'] =  $ltc_arr->last;	
			
			$datas['bch_currency'] =  $bch_arr->currency;
			$datas['bch_last'] =  $bch_arr->last;	
			
			$datas['pib_currency'] =  $pib_arr->currency;
			$datas['pib_last'] =  $pib_arr->last;	
    		$datas['exchange_name'] = "coinone";
		//var_dump($datas);
		return $datas;			
    }
    
    function get_coinfield_info()
    {
		$coinfield = 'https://api.coinfield.com/v1/tickers';
		
		$curl_handle=curl_init();
		curl_setopt($curl_handle, CURLOPT_URL,$coinfield);
		curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
		$query = curl_exec($curl_handle);
		curl_close($curl_handle);

		$data = json_decode($query);
		
		$datas = array();
		$datas['exchange_name'] = "coinfield";

		foreach ($data->markets as $list){
			if($list->market == "btccad"){
				$datas['btc_currency'] =  "btc";
				$datas['btc_last'] =  $list->last;
			}
			if($list->market == "ethcad"){
				$datas['eth_currency'] =  "eth";
				$datas['eth_last'] =  $list->last;
			}
			if($list->market == "xrpcad"){
				$datas['xrp_currency'] =  "xrp";
				$datas['xrp_last'] =  $list->last;
			}
			if($list->market == "ltccad"){
				$datas['ltc_currency'] =  "ltc";
				$datas['ltc_last'] =  $list->last;
			}
			if($list->market == "bchcad"){
				$datas['bch_currency'] =  "bch";
				$datas['bch_last'] =  $list->last;
			}
			if($list->market == "dashcad"){
				$datas['dash_currency'] =  "dash";
				$datas['dash_last'] =  $list->last;
			}
		};
		return $datas;			
    }
    
    
    function get_huobi_info()
    {
		$huobi = 'https://api.huobi.pro/market/tickers';
		
		$curl_handle=curl_init();
		curl_setopt($curl_handle, CURLOPT_URL,$huobi);
		curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
		$query = curl_exec($curl_handle);
		curl_close($curl_handle);

		$data = json_decode($query);
		$datas = array();
		$datas['exchange_name'] = "huobi";
		foreach ($data->data as $list){
			if($list->symbol == "btcusdt"){
				$datas['btc_currency'] =  "btc";
				$datas['btc_last'] =  $list->close;
			}
			if($list->symbol == "ethusdt"){
				$datas['eth_currency'] =  "eth";
				$datas['eth_last'] =  $list->close;
			}
			if($list->symbol == "xrpusdt"){
				$datas['xrp_currency'] =  "xrp";
				$datas['xrp_last'] =  $list->close;
			}
			if($list->symbol == "dashusdt"){
				$datas['dash_currency'] =  "dash";
				$datas['dash_last'] =  $list->close;
			}
			if($list->symbol == "bchusdt"){
				$datas['bch_currency'] =  "bch";
				$datas['bch_last'] =  $list->close;
			}
		};
		return $datas;			
    }
    
    function get_upbit_info()
    {
        $upbit_btc = 'https://api.upbit.com/v1/ticker?markets=KRW-BTC';
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,$upbit_btc);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $query = curl_exec($curl_handle);
        curl_close($curl_handle);
        
        $btc_data = json_decode($query);
        $datas = array();
        $datas['exchange_name'] = "upbit";
        foreach ($btc_data as $list){
            $datas['btc_currency'] =  "btc";
            $datas['btc_last'] =  $list->trade_price;
        };
        $upbit_eth = 'https://api.upbit.com/v1/ticker?markets=KRW-ETH';
        
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,$upbit_eth);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $query = curl_exec($curl_handle);
        curl_close($curl_handle);
        
        $eth_data = json_decode($query);
        
        foreach ($eth_data as $list){
            $datas['eth_currency'] =  "eth";
            $datas['eth_last'] =  $list->trade_price;
        };
        
        $upbit_xrp = 'https://api.upbit.com/v1/ticker?markets=KRW-XRP';
        
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,$upbit_xrp);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $query = curl_exec($curl_handle);
        curl_close($curl_handle);
        
        $xrp_data = json_decode($query);
        
        foreach ($xrp_data as $list){
            $datas['xrp_currency'] =  "xrp";
            $datas['xrp_last'] =  $list->trade_price;
        };
        
        $upbit_qtum = 'https://api.upbit.com/v1/ticker?markets=KRW-QTUM';
        
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,$upbit_qtum);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $query = curl_exec($curl_handle);
        curl_close($curl_handle);
        
        $qtum_data = json_decode($query);
        
        foreach ($qtum_data as $list){
            $datas['qtum_currency'] =  "qtum";
            $datas['qtum_last'] =  $list->trade_price;
        };
        
        $upbit_snt = 'https://api.upbit.com/v1/ticker?markets=KRW-SNT';
        
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,$upbit_snt);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $query = curl_exec($curl_handle);
        curl_close($curl_handle);
        
        $snt_data = json_decode($query);
        
        foreach ($snt_data as $list){
            $datas['snt_currency'] =  "snt";
            $datas['snt_last'] =  $list->trade_price;
        };
        return $datas;
    }
    
    
    
    
    function get_bithumb_info()
    {
		
		$bithumb_all = 'https://api.bithumb.com/public/ticker/all';
		$datas = array();

		$curl_handle=curl_init();
		curl_setopt($curl_handle, CURLOPT_URL,$bithumb_all);
		curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
		$query = curl_exec($curl_handle);
		
		curl_close($curl_handle);

		$all_data = json_decode($query);
		$list = $all_data->data;		
		$btc_arr = $list->BTC;
		$eth_arr = $list->ETH;
		$xrp_arr = $list->XRP;
		
		$datas['exchange_name'] = "bithumb";
		$datas['btc_currency'] =  "btc";
		$datas['btc_last'] =  $btc_arr->prev_closing_price;	
	
		$datas['eth_currency'] =  "eth";
		$datas['eth_last'] =  $eth_arr->prev_closing_price;	
	
		$datas['xrp_currency'] =  "xrp";
		$datas['xrp_last'] =  $xrp_arr->prev_closing_price;	
		
		return $datas;			
    }
    
    function get_bittrex_info(){
        
        $bittrex_btc = 'https://api.bittrex.com/api/v1.1/public/getticker?market=USD-BTC';
        
        $datas = array();
        
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,$bittrex_btc);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $query = curl_exec($curl_handle);
        
        curl_close($curl_handle);
        $btc_data = json_decode($query);
        
        $list = $btc_data->result;
        $datas['exchange_name'] = "bittrex";
        $datas['btc_currency'] =  "btc";
        $datas['btc_last'] =  $list->Last;        
        
        $bittrex_eth = 'https://api.bittrex.com/api/v1.1/public/getticker?market=USD-ETH';
        
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,$bittrex_eth);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $query = curl_exec($curl_handle);
        
        curl_close($curl_handle);
        $eth_data = json_decode($query);
        
        $list = $eth_data->result;
        $datas['eth_currency'] =  "eth";
        $datas['eth_last'] =  $list->Last;

        
        $bittrex_xrp = 'https://api.bittrex.com/api/v1.1/public/getticker?market=USD-XRP';
        
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,$bittrex_xrp);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $query = curl_exec($curl_handle);
        
        curl_close($curl_handle);
        $xrp_data = json_decode($query);
        
        $list = $xrp_data->result;
        $datas['xrp_currency'] =  "xrp";
        $datas['xrp_last'] =  $list->Last;
        
        return $datas;		
        
    }
    
    function get_poloniex_info(){
        
        $poloniex_all = 'https://poloniex.com/public?command=returnTicker';
        
        $datas = array();
        
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,$poloniex_all);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $query = curl_exec($curl_handle);
        
        curl_close($curl_handle);
        $all_data = json_decode($query);
        $btc = $all_data->USDT_BTC;
        $eth = $all_data->USDT_ETH;
        $xrp = $all_data->USDT_XRP;
        
        $datas['exchange_name'] = "poloniex";
        
        if($btc != null){
            $datas['btc_currency'] =  "btc";
            $datas['btc_last'] =  $btc->last;
        }
        if($eth != null){
            $datas['eth_currency'] =  "eth";
            $datas['eth_last'] =  $eth->last;
        }
        if($xrp != null){
            $datas['xrp_currency'] =  "xrp";
            $datas['xrp_last'] =  $xrp->last;
        }
        return $datas;
    }
    
    
    
    function set_exchange_rate()
    {
		$exchange_url = 'https://free.currconv.com/api/v7/convert?q=cad_krw,usd_krw&compact=ultra&apiKey=1b2360cf16ac589201bc';
		$datas = array();

		$curl_handle=curl_init();
		curl_setopt($curl_handle, CURLOPT_URL,$exchange_url);
		curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
		$exchange_query = curl_exec($curl_handle);
		curl_close($curl_handle);

		$rate_info['data'] = json_decode($exchange_query);
		$this->load->model('Mains');
		$this->Mains->set_exchange_rate($rate_info);
		return $datas;			
    }
    
	function get_exchange_info()
	{
		$this->load->model('Mains');
		$data = $this->Mains->get_exchange_rate();
		return $data;
	}

	function login(){
	    $this->load->view('login_view');
	}
	
}


