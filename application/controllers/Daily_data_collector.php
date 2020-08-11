<?php 
class Daily_data_collector extends Crypto_Controller{
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){   
        //error_log("error", 0); To php_error.log /home/cryptologs/php-err.log
        $this->get_user_coin();
    }
    
    public function get_user_coin(){
        $this->load->model('Musers');
        $this->load->model('Mfunctions');
        $this->load->model('Mains');
        $result = $this->Musers->get_alluser_coin();
        
        $data = Array();
        
        $currency_btc = 'btc';
        $currency_eth = 'eth';
        $currency_xrp = 'xrp';
        $currency_ltc = 'ltc';
        $currency_bch = 'bch';
        $currency_dash = 'dash';
        $currency_pib = 'pib';
        $currency_qtum = 'qtum';
        $currency_snt = 'snt';
        
        foreach($result as $list){
            if($list){
                $btc_count = $list->btc_count;
                $eth_count = $list->eth_count;
                $xrp_count = $list->xrp_count;
                $ltc_count = $list->ltc_count;
                $bch_count = $list->bch_count;
                $dash_count = $list->dash_count;
                $pib_count = $list->pib_count;
                $qtum_count = $list->qtum_count;
                $snt_count = $list->snt_count;
                $user_id = $list->user_id;
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
            $total = $sum_btc+$sum_eth+$sum_xrp+$sum_ltc+$sum_bch+$sum_dash+$sum_qtum+$sum_pib+$sum_snt;
            $this->Mains->save_total_info($user_id, $total);
            //array_push($data, array('user_id' => $user_id, 'total' => $total));
        }
    }
}
?>