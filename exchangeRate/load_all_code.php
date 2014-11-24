<?php
	require_once('simple_html_dom.php');

		$code = Array();

		ob_start();
		$from = Array('AED','ARS','AUD','BGN','BRL','CAD','CHF','CLP','CNY','CZK','DKK','DZD','EGP','EUR','GBP','HKD','HRK','HUF','IDR','ILS','INR','IRR','ISK','JPY','KRW','LKR','MXN','MYR','NGN','NOK','NZD','PHP','PKR','PLN','QAR','RON','RSD','RUB','SAR','SEK','SGD','THB','TRY','TWD','UAH','USD','ZAR');
		foreach ($from as $key) {
			$code[] = $key;

			$html = file_get_html('http://fx-rate.net/'.$key.'/');
			$rows = $html->find('#toptencurrencies table',1);
			$tr = $rows->find('tbody tr');

			$Data = Array();
			$ctr=-1;

			//$Data['from'] = $from;

			foreach ($tr as $tr1) {
				if ($ctr == -1){ $ctr++; continue; }
		
				$code[$key][$ctr]['to'] = str_replace("/",'',$tr1->children(0)->children(0)->href);
				$code[$key][$ctr]['name'] = $tr1->children(0)->children(0)->title;	
				$code[$key][$ctr]['img'] = 'http://fx-rate.net/'.$tr1->children(0)->children(0)->children(0)->src;	
				$code[$key][$ctr]['fromTo'] = $tr1->children(1)->children(0)->innertext;	
				$code[$key][$ctr]['toFrom'] = $tr1->children(2)->children(0)->innertext;	
		
			$ctr++;
			}
		}
		$output = ob_get_clean();
		
		 //echo '<pre>';
		 //print_r($code);
		 //echo '</pre>';

		


		$array = serialize($code);
		save_array($array);
	
		function save_array($somecontent)
		{	  
	  
	  	$filename = 'rate.array'; 
    
    	if (!$handle = fopen($filename, 'w')) {
         echo "Cannot open file ($filename)";
         exit;
   		 }

    	if (fwrite($handle, $somecontent) === FALSE) {
        echo "Cannot write to file ($filename)";
        exit;
   		 }
		fclose($handle);
	
		}