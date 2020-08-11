		<?php
			foreach($exchange as $list){
				if($list->currency == "usd_krw"){
				    $usdkrw = number_format($list->rate, 2, '.', ',');
				}
				if($list->currency == "cad_krw"){
					$cadkrw = $list->rate;
				}
			};

  			foreach($coinone as $list){

				$coinone_exchange = strtoupper($list->exchange_name);

  				if($list->currency == 'btc'){
  				    $coinone_date = $list->date;
  					$coinone_btc_currency = strtoupper($list->currency);
  					$coinone_btc_last_ori = $list->price;
  					$coinone_btc_last = number_format($list->price, 2, '.', ',');
  				}
  				if($list->currency == 'eth'){
  					$coinone_eth_currency = strtoupper($list->currency);
  					$coinone_eth_last_ori = $list->price;
  					$coinone_eth_last = number_format($list->price, 2, '.', ',');
  				}
  				if($list->currency == 'ltc'){
  					$coinone_ltc_currency = strtoupper($list->currency);
					$coinone_ltc_last_ori = $list->price;
  					$coinone_ltc_last = number_format($list->price, 2, '.', ',');
  				}
  				if($list->currency == 'xrp'){
  					$coinone_xrp_currency = strtoupper($list->currency);
					$coinone_xrp_last_ori = $list->price;
  					$coinone_xrp_last = number_format($list->price, 2, '.', ',');
  				}
  				if($list->currency == 'bch'){
  					$coinone_bch_currency = strtoupper($list->currency);
  					$coinone_bch_last = number_format($list->price, 2, '.', ',');
  				}
  				if($list->currency == 'pib'){
  					$coinone_pib_currency = strtoupper($list->currency);
  					$coinone_pib_last = number_format($list->price, 2, '.', ',');
  				}
  			};


			foreach($coinfield as $list){

				$coinfield_exchange = strtoupper($list->exchange_name);

  				if($list->currency == 'btc'){
  				    $coinfield_date = $list->date;
  					$coinfield_btc_currency = strtoupper($list->currency);
					$coinfield_btc_last_ori = $list->price * $cadkrw;
  					$coinfield_btc_last = number_format($list->price * $cadkrw, 2, '.', ',');

  				}
  				if($list->currency == 'eth'){
  					$coinfield_eth_currency = strtoupper($list->currency);
					$coinfield_eth_last_ori = $list->price * $cadkrw;
  					$coinfield_eth_last = number_format($list->price * $cadkrw, 2, '.', ',');
  				}
  				if($list->currency == 'ltc'){
  					$coinfield_ltc_currency = strtoupper($list->currency);
  					$coinfield_ltc_last = number_format($list->price * $cadkrw, 2, '.', ',');
  				}
  				if($list->currency == 'xrp'){
  					$coinfield_xrp_currency = strtoupper($list->currency);
					$coinfield_xrp_last_ori = $list->price * $cadkrw;
  					$coinfield_xrp_last = number_format($list->price * $cadkrw, 2, '.', ',');
  				}
  				if($list->currency == 'bch'){
  					$coinfield_bch_currency = strtoupper($list->currency);
  					$coinfield_bch_last = number_format($list->price * $cadkrw, 2, '.', ',');
  				}
  				if($list->currency == 'dash'){
  					$coinfield_dash_currency = strtoupper($list->currency);
  					$coinfield_dash_last = number_format($list->price * $cadkrw, 2, '.', ',');
  				}
  			};
  			
			foreach($huobi as $list){

				$huobi_exchange = strtoupper($list->exchange_name);

  				if($list->currency == 'btc'){
  				    $huobi_date = $list->date;
  					$huobi_btc_currency = strtoupper($list->currency);
					$huobi_btc_last_ori = $list->price * $usdkrw;
  					$huobi_btc_last = number_format($list->price * $usdkrw, 2, '.', ',');  					
  				}
  				if($list->currency == 'eth'){
  					$huobi_eth_currency = strtoupper($list->currency);
					$huobi_eth_last_ori = $list->price * $usdkrw;
  					$huobi_eth_last = number_format($list->price * $usdkrw, 2, '.', ',');
  				}
  				if($list->currency == 'ltc'){
  					$huobi_ltc_currency = strtoupper($list->currency);
  					$huobi_ltc_last = number_format($list->price * $usdkrw, 2, '.', ',');
  				}
  				if($list->currency == 'xrp'){
  					$huobi_xrp_currency = strtoupper($list->currency);
					$huobi_xrp_last_ori = $list->price * $usdkrw;
  					$huobi_xrp_last = number_format($list->price * $usdkrw, 2, '.', ',');
  				}
  				if($list->currency == 'bch'){
  					$huobi_bch_currency = strtoupper($list->currency);
  					$huobi_bch_last = number_format($list->price * $usdkrw, 2, '.', ',');
  				}
  				if($list->currency == 'dash'){
  					$huobi_dash_currency = strtoupper($list->currency);
  					$huobi_dash_last = number_format($list->price * $usdkrw, 2, '.', ',');
  				}
  				
  			};

  			
  			foreach($upbit as $list){
  			    
  			    $upbit_exchange = strtoupper($list->exchange_name);
  			    
  			    if($list->currency == 'btc'){
  			        $upbit_date = $list->date;
  			        $upbit_btc_currency = strtoupper($list->currency);
  			        $upbit_btc_last_ori = $list->price;
  			        $upbit_btc_last = number_format($list->price, 2, '.', ',');
  			    }
  			    if($list->currency == 'eth'){
  			        $upbit_eth_currency = strtoupper($list->currency);
  			        $upbit_eth_last_ori = $list->price;
  			        $upbit_eth_last = number_format($list->price, 2, '.', ',');
  			    }
  			    if($list->currency == 'xrp'){
  			        $upbit_xrp_currency = strtoupper($list->currency);
  			        $upbit_xrp_last_ori = $list->price;
  			        $upbit_xrp_last = number_format($list->price, 2, '.', ',');
  			    }
  			    if($list->currency == 'qtum'){
  			        $upbit_qtum_currency = strtoupper($list->currency);
  			        $upbit_qtum_last = number_format($list->price, 2, '.', ',');
  			    }
  			    if($list->currency == 'snt'){
  			        $upbit_snt_currency = strtoupper($list->currency);
  			        $upbit_snt_last = number_format($list->price, 2, '.', ',');
  			    }
  			};
  			
  			
			foreach($bithumb as $list){

				$bithumb_exchange = strtoupper($list->exchange_name);

  				if($list->currency == 'btc'){
  				    $bithumb_date = $list->date;
  					$bithumb_btc_currency = strtoupper($list->currency);
					$bithumb_btc_last_ori = $list->price;
  					$bithumb_btc_last = number_format($list->price, 2, '.', ',');  					
  				}
  				if($list->currency == 'eth'){
  					$bithumb_eth_currency = strtoupper($list->currency);
					$bithumb_eth_last_ori = $list->price;
  					$bithumb_eth_last = number_format($list->price, 2, '.', ',');
  				}
  				if($list->currency == 'ltc'){
  					$bithumb_ltc_currency = strtoupper($list->currency);
  					$bithumb_ltc_last = number_format($list->price, 2, '.', ',');
  				}
  				if($list->currency == 'xrp'){
  					$bithumb_xrp_currency = strtoupper($list->currency);
					$bithumb_xrp_last_ori = $list->price;
  					$bithumb_xrp_last = number_format($list->price, 2, '.', ',');
  				}
  				if($list->currency == 'bch'){
  					$bithumb_bch_currency = strtoupper($list->currency);
  					$bithumb_bch_last = number_format($list->price, 2, '.', ',');
  				}
  				if($list->currency == 'dash'){
  					$bithumb_dash_currency = strtoupper($list->currency);
  					$bithumb_dash_last = number_format($list->price, 2, '.', ',');
  				}
  			};
  			
  			
  			foreach($bittrex as $list){
  			    
  			    $bittrex_exchange = strtoupper($list->exchange_name);
  			    
  			    if($list->currency == 'btc'){
  			        $bittrex_date = $list->date;
  			        $bittrex_btc_currency = strtoupper($list->currency);
  			        $bittrex_btc_last_ori = $list->price * $usdkrw;
  			        $bittrex_btc_last = number_format($list->price * $usdkrw, 2, '.', ',');
  			    }
  			    if($list->currency == 'eth'){
  			        $bittrex_eth_currency = strtoupper($list->currency);
  			        $bittrex_eth_last_ori = $list->price * $usdkrw;
  			        $bittrex_eth_last = number_format($list->price * $usdkrw, 2, '.', ',');
  			    }
  			    if($list->currency == 'xrp'){
  			        $bittrex_xrp_currency = strtoupper($list->currency);
  			        $bittrex_xrp_last_ori = $list->price * $usdkrw;
  			        $bittrex_xrp_last = number_format($list->price * $usdkrw, 2, '.', ',');
  			    }
  			};
  			
  			foreach($poloniex as $list){
  			    
  			    $poloniex_exchange = strtoupper($list->exchange_name);
  			    
  			    if($list->currency == 'btc'){
  			        $poloniex_date = $list->date;
  			        $poloniex_btc_currency = strtoupper($list->currency);
  			        $poloniex_btc_last_ori = $list->price * $usdkrw;
  			        $poloniex_btc_last = number_format($list->price * $usdkrw, 2, '.', ',');
  			    }
  			    if($list->currency == 'eth'){
  			        $poloniex_eth_currency = strtoupper($list->currency);
  			        $poloniex_eth_last_ori = $list->price * $usdkrw;
  			        $poloniex_eth_last = number_format($list->price * $usdkrw, 2, '.', ',');
  			    }
  			    if($list->currency == 'xrp'){
  			        $poloniex_xrp_currency = strtoupper($list->currency);
  			        $poloniex_xrp_last_ori = $list->price * $usdkrw;
  			        $poloniex_xrp_last = number_format($list->price * $usdkrw, 2, '.', ',');
  			    }
  			};
  			
  			
  			$btc_max = max($coinone_btc_last_ori, $coinfield_btc_last_ori, $huobi_btc_last_ori, $bithumb_btc_last_ori, $bittrex_btc_last_ori, $poloniex_btc_last_ori, $upbit_btc_last_ori);
  			$eth_max = max($coinone_eth_last_ori, $coinfield_eth_last_ori, $huobi_eth_last_ori, $bithumb_eth_last_ori, $bittrex_eth_last_ori, $poloniex_eth_last_ori, $upbit_eth_last_ori);
  			$xrp_max = max($coinone_xrp_last_ori, $coinfield_xrp_last_ori, $huobi_xrp_last_ori, $bithumb_xrp_last_ori, $bittrex_xrp_last_ori, $poloniex_xrp_last_ori, $upbit_xrp_last_ori);
  			
  			
  			$sub_btc_coinone = $coinone_btc_last_ori-$btc_max;
  			$percent_btc_coinone = round(($sub_btc_coinone/$btc_max) * 100, 2);
  			$sub_btc_coinfield = $coinfield_btc_last_ori-$btc_max;
  			$percent_btc_coinfield = round(($sub_btc_coinfield/$btc_max) * 100, 2);
  			$sub_btc_huobi = $huobi_btc_last_ori-$btc_max;
  			$percent_btc_huobi = round(($sub_btc_huobi/$btc_max) * 100, 2);
  			$sub_btc_bithumb = $bithumb_btc_last_ori-$btc_max;
  			$percent_btc_bithumb = round(($sub_btc_bithumb/$btc_max) * 100, 2);
  			$sub_btc_bittrex = $bittrex_btc_last_ori-$btc_max;
  			$percent_btc_bittrex = round(($sub_btc_bittrex/$btc_max) * 100, 2);
  			$sub_btc_poloniex = $poloniex_btc_last_ori-$btc_max;
  			$percent_btc_poloniex = round(($sub_btc_poloniex/$btc_max) * 100, 2);
  			$sub_btc_upbit = $upbit_btc_last_ori-$btc_max;
  			$percent_btc_upbit = round(($sub_btc_upbit/$btc_max) * 100, 2);
  			
  			$sub_eth_coinone = $coinone_eth_last_ori-$eth_max;
  			$percent_eth_coinone = round(($sub_eth_coinone/$eth_max) * 100, 2);
  			$sub_eth_coinfield = $coinfield_eth_last_ori-$eth_max;
  			$percent_eth_coinfield = round(($sub_eth_coinfield/$eth_max) * 100, 2);
  			$sub_eth_huobi = $huobi_eth_last_ori-$eth_max;
  			$percent_eth_huobi = round(($sub_eth_huobi/$eth_max) * 100, 2);
  			$sub_eth_bithumb = $bithumb_eth_last_ori-$eth_max;
  			$percent_eth_bithumb = round(($sub_eth_bithumb/$eth_max) * 100, 2);
  			$sub_eth_bittrex = $bittrex_eth_last_ori-$eth_max;
  			$percent_eth_bittrex = round(($sub_eth_bittrex/$eth_max) * 100, 2);
  			$sub_eth_poloniex = $poloniex_eth_last_ori-$eth_max;
  			$percent_eth_poloniex = round(($sub_eth_poloniex/$eth_max) * 100, 2);
  			$sub_eth_upbit = $upbit_eth_last_ori-$eth_max;
  			$percent_eth_upbit = round(($sub_eth_upbit/$eth_max) * 100, 2);
  			
  			$sub_xrp_coinone = $coinone_xrp_last_ori-$xrp_max;
  			$percent_xrp_coinone = round(($sub_xrp_coinone/$xrp_max) * 100, 2);
  			$sub_xrp_coinfield = $coinfield_xrp_last_ori-$xrp_max;
  			$percent_xrp_coinfield = round(($sub_xrp_coinfield/$xrp_max) * 100, 2);
  			$sub_xrp_huobi = $huobi_xrp_last_ori-$xrp_max;
  			$percent_xrp_huobi = round(($sub_xrp_huobi/$xrp_max) * 100, 2);
  			$sub_xrp_bithumb = $bithumb_xrp_last_ori-$xrp_max;
  			$percent_xrp_bithumb = round(($sub_xrp_bithumb/$xrp_max) * 100, 2);
  			$sub_xrp_bittrex = $bittrex_xrp_last_ori-$xrp_max;
  			$percent_xrp_bittrex = round(($sub_xrp_bittrex/$xrp_max) * 100, 2);
  			$sub_xrp_poloniex = $poloniex_xrp_last_ori-$xrp_max;
  			$percent_xrp_poloniex = round(($sub_xrp_poloniex/$xrp_max) * 100, 2);
  			$sub_xrp_upbit = $upbit_xrp_last_ori-$xrp_max;
  			$percent_xrp_upbit = round(($sub_xrp_upbit/$xrp_max) * 100, 2);
  			
  			$total = $subtracted_list['sum_total'];

 	?>

            <div id="head_img">
                <div class="RollDiv">  
                  <div>  
            		<p><font size="2"><strong>BTC Max<br>\<?=number_format($btc_max, 2, '.', ',')?></strong></font></p>
                    <p><font size="2"><strong>ETH Max<br>\<?=number_format($eth_max, 2, '.', ',')?></strong></font></p>
                    <p><font size="2"><strong>XRP Max<br>\<?=number_format($xrp_max, 2, '.', ',')?></strong></font></p>
                    <p><font size="2" bold><strong><?=$coinone_btc_currency?><br>\<?=$coinone_btc_last?></strong></font></p>
                    <p><font size="2" bold><strong><?=$coinone_eth_currency?><br>\<?=$coinone_eth_last?></strong></font></p>
                    <p><font size="2" bold><strong><?=$coinone_xrp_currency?><br>\<?=$coinone_xrp_last?></strong></font></p>
                    <p><font size="2" bold><strong><?=$coinone_ltc_currency?><br>\<?=$coinone_ltc_last?></strong></font></p>
                    <p><font size="2" bold><strong><?=$coinone_bch_currency?><br>\<?=$coinone_bch_last?></strong></font></p>
                    <p><font size="2" bold><strong><?=$coinfield_dash_currency?><br>\<?=$coinfield_dash_last?></strong></font></p>
                    <p><font size="2" bold><strong><?=$coinone_pib_currency?><br>\<?=$coinone_pib_last?></strong></font></p>
                    <p><font size="2" bold><strong><?=$upbit_qtum_currency?><br>\<?=$upbit_qtum_last?></strong></font></p>
                    <p><font size="2" bold><strong><?=$upbit_snt_currency?><br>\<?=$upbit_snt_last?></strong></font></p>
                    <p><font size="2" bold><strong><?=$upbit_snt_currency?><br>\<?=$upbit_snt_last?></strong></font></p>
                    <p><font size="2" bold><strong><?=$upbit_snt_currency?><br>\<?=$upbit_snt_last?></strong></font></p>
                  </div>  
                </div>
            </div>
        
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">DASHBOARD</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">My Total estimated value</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">\<?=$total?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">USD->KRW</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$1 = \<?=$usdkrw?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          
          
          <div class="row">

            <!-- Bar Chart -->
            <div class="col-xl-8 col-lg-7" style="max-width:100%;flex:100%;">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Daily Earnings Overview</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          
          
          
          

          <div class="row">

            <!-- Bar Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Total Earnings Overview</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myBarChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Coin Distribution Overview</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  
                  <div class="mt-4 text-center small">
                    <!-- <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i>
                    </span> -->
                    <div id="pie_coin_kind"></div>
                    
                    <!-- <span class="mr-2">
                    <i class="fas fa-circle text-success"></i>
                    </span>
                    <span class="mr-2">
                    <i class="fas fa-circle text-info"></i>
                    </span> -->
                    
                  </div>
          
                  
                  
                </div>
              </div>
            </div>
          </div>



		<?php 
			
// 		    var_dump($subtracted_list);
		    
		    
// 		    $btc_value = $subtracted_list['sum_btc'];
// 			$eth_value = $subtracted_list['sum_eth'];
// 			$xrp_value = $subtracted_list['sum_xrp'];
// 			$ltc_value = $subtracted_list['sum_ltc'];
// 			$bch_value = $subtracted_list['sum_bch'];
// 			$dash_value = $subtracted_list['sum_dash'];
// 			$pib_value = $subtracted_list['sum_pib'];
// 			$qtum_value = $subtracted_list['sum_qtum'];
// 			$snt_value = $subtracted_list['sum_snt'];
			
// 			$btc_cy = $subtracted_list['currency_btc'];
// 			$eth_cy = $subtracted_list['currency_eth'];
// 			$xrp_cy = $subtracted_list['currency_xrp'];
// 			$ltc_cy = $subtracted_list['currency_ltc'];
// 			$bch_cy = $subtracted_list['currency_bch'];
// 			$dash_cy = $subtracted_list['currency_dash'];
// 			$pib_cy = $subtracted_list['currency_pib'];
// 			$qtum_cy = $subtracted_list['currency_qtum'];
// 			$snt_cy = $subtracted_list['currency_snt'];
			
// 			$btc_count = $subtracted_list['btc_count'];
// 			$eth_count = $subtracted_list['eth_count'];
// 			$xrp_count = $subtracted_list['xrp_count'];
// 			$ltc_count = $subtracted_list['ltc_count'];
// 			$dash_count = $subtracted_list['dash_count'];
// 			$bch_count = $subtracted_list['bch_count'];
// 			$dash_count = $subtracted_list['dash_count'];
// 			$pib_count = $subtracted_list['pib_count'];
// 			$qtum_count = $subtracted_list['qtum_count'];
// 			$snt_count = $subtracted_list['snt_count'];
			
// 			$btc_rate = $subtracted_list['btc_rate'];
// 			$eth_rate = $subtracted_list['eth_rate'];
// 			$xrp_rate = $subtracted_list['xrp_rate'];
// 			$ltc_rate = $subtracted_list['ltc_rate'];
// 			$dash_rate = $subtracted_list['dash_rate'];
// 			$bch_rate = $subtracted_list['bch_rate'];
// 			$dash_rate = $subtracted_list['dash_rate'];
// 			$pib_rate = $subtracted_list['pib_rate'];
// 			$qtum_rate = $subtracted_list['qtum_rate'];
// 			$snt_rate = $subtracted_list['snt_rate'];

// 			$total = $btc_value + $eth_value + $xrp_value + $ltc_value + $bch_value + $dash_value + $pib_value + $qtum_value + $snt_value;
        ?>

		 <!-- DataTales -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">My Total estimated value<h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>

                      <!-- <td colspan="4" align="center" style="font-weight: bold;font-size: 19px;">F</td> -->
                    </tr>
                    <tr>
                      <th>COIN</th>
                      <th>AMOUNT</th>
                      <th>QTY</th>
                      <th>RATE</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <!-- <th colspan="2" style="text-align:center;">COIN</th> -->
                      <th colspan="2" style="text-align:center;">TOTAL AMOUNT</th>
                      <th colspan="2" style="color:red;">\<?=$total?></th>
                    </tr>
                  </tfoot>
                  	<tr>
                      <?php foreach($subtracted_list as $key => $data){
                      	$total_pos = strpos($key, 'total');
                      	$currency_pos = strpos($key, 'rate');
                      	
                      	$sum_str = substr($key, 0, 3);
                      	
                      	if($total_pos == false){
                      	    if($currency_pos == true || $sum_str == 'sum'){?>
                      	     
                      	    <td>\<?=$data?></td>
                      	    <?php 
                      	    } else {?>
                      	        <td><?=$data?></td>
                      	        <?php 
                      	    }
                      	}?>
                      <?php 
                         $pos = strpos($key, 'rate');
                         if($pos == true){?>
         		           </tr>     
                	  <?php
                         }
                      }?>
					
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- End DataTales -->


          <!-- Content Row -->
          <div class="row">

      </div>
      <!-- End of Main Content -->

      
  
 