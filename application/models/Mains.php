<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mains extends CI_Model {

    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
    
    function set_coin_data($data)
    {
		//$this->db->delete('coin_info', array('currency' => $data['btc_currency']));
		//var_dump($data);
		$mas_id = null;
		$max = null;
        
        $this->db->select_max('id');
        $this->db->where('exchange_name', $data['exchange_name']);
        $query = $this->db->get('coin_info');
        foreach($query->result() as $ids){
            $max = $ids->id;
            $max_id = $max + 1;
        }
        
        if(empty($data['btc_currency'])){
            return false;
        } else {
            if(!empty($data['btc_currency'])){
                // 			$this->db->where('currency', $data['btc_currency']);
                // 			$this->db->where('exchange_name', $data['exchange_name']);
                // 			$this->db->delete('coin_info');
                
                $this->db->set('id', $max_id);
                $this->db->set('currency', $data['btc_currency']);
                $this->db->set('price', $data['btc_last']);
                $this->db->set('exchange_name', $data['exchange_name']);
                $this->db->set('date', 'NOW()', FALSE);
                $this->db->insert('coin_info');
            }
            
            if(!empty($data['eth_currency'])){
                // 			$this->db->where('currency', $data['eth_currency']);
                // 			$this->db->where('exchange_name', $data['exchange_name']);
                // 			$this->db->delete('coin_info');
                $this->db->set('id', $max_id);
                $this->db->set('currency', $data['eth_currency']);
                $this->db->set('price', $data['eth_last']);
                $this->db->set('exchange_name', $data['exchange_name']);
                $this->db->set('date', 'NOW()', FALSE);
                $this->db->insert('coin_info');
            }
            
            if(!empty($data['xrp_currency'])){
                // 			$this->db->where('currency', $data['xrp_currency']);
                // 			$this->db->where('exchange_name', $data['exchange_name']);
                // 			$this->db->delete('coin_info');
                $this->db->set('id', $max_id);
                $this->db->set('currency', $data['xrp_currency']);
                $this->db->set('price', $data['xrp_last']);
                $this->db->set('exchange_name', $data['exchange_name']);
                $this->db->set('date', 'NOW()', FALSE);
                $this->db->insert('coin_info');
            }
            
            if(!empty($data['ltc_currency'])){
                // 			$this->db->where('currency', $data['ltc_currency']);
                // 			$this->db->where('exchange_name', $data['exchange_name']);
                // 			$this->db->delete('coin_info');
                $this->db->set('id', $max_id);
                $this->db->set('currency', $data['ltc_currency']);
                $this->db->set('price', $data['ltc_last']);
                $this->db->set('exchange_name', $data['exchange_name']);
                $this->db->set('date', 'NOW()', FALSE);
                $this->db->insert('coin_info');
            }
            
            if(!empty($data['bch_currency'])){
                // 			$this->db->where('currency', $data['bch_currency']);
                // 			$this->db->where('exchange_name', $data['exchange_name']);
                // 			$this->db->delete('coin_info');
                $this->db->set('id', $max_id);
                $this->db->set('currency', $data['bch_currency']);
                $this->db->set('price', $data['bch_last']);
                $this->db->set('exchange_name', $data['exchange_name']);
                $this->db->set('date', 'NOW()', FALSE);
                $this->db->insert('coin_info');
            }
            
            if(!empty($data['dash_currency'])){
                // 		    $this->db->where('currency', $data['dash_currency']);
                // 		    $this->db->where('exchange_name', $data['exchange_name']);
                // 		    $this->db->delete('coin_info');
                $this->db->set('id', $max_id);
                $this->db->set('currency', $data['dash_currency']);
                $this->db->set('price', $data['dash_last']);
                $this->db->set('exchange_name', $data['exchange_name']);
                $this->db->set('date', 'NOW()', FALSE);
                $this->db->insert('coin_info');
            }
            
            if(!empty($data['pib_currency'])){
                // 			$this->db->where('currency', $data['pib_currency']);
                // 			$this->db->where('exchange_name', $data['exchange_name']);
                // 			$this->db->delete('coin_info');
                $this->db->set('id', $max_id);
                $this->db->set('currency', $data['pib_currency']);
                $this->db->set('price', $data['pib_last']);
                $this->db->set('exchange_name', $data['exchange_name']);
                $this->db->set('date', 'NOW()', FALSE);
                $this->db->insert('coin_info');
            }
            
            if(!empty($data['qtum_currency'])){
                // 		    $this->db->where('currency', $data['qtum_currency']);
                // 		    $this->db->where('exchange_name', $data['exchange_name']);
                // 		    $this->db->delete('coin_info');
                $this->db->set('id', $max_id);
                $this->db->set('currency', $data['qtum_currency']);
                $this->db->set('price', $data['qtum_last']);
                $this->db->set('exchange_name', $data['exchange_name']);
                $this->db->set('date', 'NOW()', FALSE);
                $this->db->insert('coin_info');
            }
            
            if(!empty($data['snt_currency'])){
                // 		    $this->db->where('currency', $data['snt_currency']);
                // 		    $this->db->where('exchange_name', $data['exchange_name']);
                // 		    $this->db->delete('coin_info');
                $this->db->set('id', $max_id);
                $this->db->set('currency', $data['snt_currency']);
                $this->db->set('price', $data['snt_last']);
                $this->db->set('exchange_name', $data['exchange_name']);
                $this->db->set('date', 'NOW()', FALSE);
                $this->db->insert('coin_info');
            }
            return true;
        }
		
    }

	function set_exchange_rate($data)
	{
	
		$this->db->empty_table('exchange_rate');
		foreach($data as $list){	
			$this->db->where('currency', 'usd_krw');
			$this->db->where('currency', 'cad_krw');
			$this->db->delete('coin_info');

			$this->db->set('currency', 'usd_krw');
			$this->db->set('rate', $list->USD_KRW);
			$this->db->set('date', 'Now()', FALSE);
			$this->db->insert('exchange_rate');
		
			$this->db->set('currency', 'cad_krw');
			$this->db->set('rate', $list->CAD_KRW);
			$this->db->set('date', 'Now()', FALSE);
			$this->db->insert('exchange_rate');
		}
		
	}
	
	function get_exchange_rate()
	{
		$this->db->select('currency, rate, date(date) as date');    	
		$query = $this->db->get('exchange_rate');
        return $query->result();
	}
	
	function get_user_info(){

	    $query = $this->db->get('user_coin');
	    return $query->result();
	}
	
	function get_coin_info_ajax($ex_name)
	{
	    $q = 'SELECT * FROM coin_info WHERE exchange_name = "'.$ex_name.'" AND id = (SELECT MAX(id) FROM coin_info WHERE exchange_name = "'.$ex_name.'") ORDER BY DATE DESC';
	    
	    $query = $this->db->query($q);
	    
	    //     	$this->db->select('currency, price, exchange_name, date(date) as date');
	    //     	$this->db->where('exchange_name', $ex_name);
	    //     	$this->db->order_by('date', 'asc');
	    //     	$this->db->limit(1);
	    // 		$query = $this->db->get('coin_info');
	    
	    
	    //         foreach($query->result() as $list){
	    //             if($list->currency != 'btc'){
	    //                 $query = $this->db->query('SELECT * FROM coin_info WHERE exchange_name = "'.$ex_name.'"
	    //                 AND id = (SELECT MAX(id)-1 FROM coin_info WHERE exchange_name = "'.$ex_name.'") ORDER BY DATE DESC');
	    //             }
	    //         }
	    return $query->result();
	}
	
	
	function get_coin_data($ex_name)
    {
        $q = 'SELECT * FROM coin_info WHERE exchange_name = "'.$ex_name.'" AND id = (SELECT MAX(id) FROM coin_info WHERE exchange_name = "'.$ex_name.'") ORDER BY DATE DESC';        
        $query = $this->db->query($q);
        
//     	$this->db->select('currency, price, exchange_name, date(date) as date');
//     	$this->db->where('exchange_name', $ex_name);
//     	$this->db->order_by('date', 'asc');
//     	$this->db->limit(1);
// 		$query = $this->db->get('coin_info');

        
//         foreach($query->result() as $list){
//             if($list->currency != 'btc'){
//                 $query = $this->db->query('SELECT * FROM coin_info WHERE exchange_name = "'.$ex_name.'"
//                 AND id = (SELECT MAX(id)-1 FROM coin_info WHERE exchange_name = "'.$ex_name.'") ORDER BY DATE DESC');
//             }
//         }
                
        return $query->result();
    }

    function save_total_info($user_id, $total){
        $this->db->set('user_id', $user_id);
        $this->db->set('sum', $total);
        $this->db->set('date', 'Now()', FALSE);        
        $this->db->insert('user_total_info');
    }
    
    
    
    function get_total_fromto($today, $month, $year, $before_month, $lastday_beforemonth, $beforemonth_month){
        $month = sprintf('%02d',$month);
        $user_id = 'jfluke1414@gmail.com';
        $sql = 'SELECT * FROM user_total_info WHERE user_id ="'.$user_id.'" AND (date like "'.$before_month.' 03:00%" OR';
        
        for($i=$today;$i<=$lastday_beforemonth;$i++){
            $i = sprintf('%02d',$i);
            $sql .= ' DATE LIKE "'.$year.'-'.$beforemonth_month.'-'.$i.' 03:00%" OR ';
        }
        for($i=1;$i<=$today;$i++){
            $i = sprintf('%02d',$i);
            if($i==$today){
                $sql .= ' DATE LIKE "'.$year.'-'.$month.'-'.$i.' 03:00%") ORDER BY DATE DESC;';
            } else {
                $sql .= ' DATE LIKE "'.$year.'-'.$month.'-'.$i.' 03:00%" OR';
            }
        }
                
        $query = $this->db->query($sql);
        
        return $query->result();
    }
}