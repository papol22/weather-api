<?php
	require_once('simple_html_dom.php');
	
	$html = file_get_html('http://fx-rate.net/'.$from.'/');
	
	$rows = $html->find('#toptencurrencies table',1);
	$tr = $rows->find('tbody tr');
	$cur = $html->find('#last_link');

	$Data = Array();
	$ctr=-1;

	$Data['from'] = $from;

	foreach ($tr as $tr1) {
		if ($ctr == -1){ $ctr++; continue; }

		$Data[$ctr]['data']['to'] = str_replace("/",'',$tr1->children(0)->children(0)->href);
		$Data[$ctr]['data']['title'] = $tr1->children(0)->children(0)->title;	
		$Data[$ctr]['data']['img'] = 'http://fx-rate.net/'.$tr1->children(0)->children(0)->children(0)->src;	
		$Data[$ctr]['data']['fromTo'] = $tr1->children(1)->children(0)->innertext;	
		$Data[$ctr]['data']['toFrom'] = $tr1->children(2)->children(0)->innertext;	
		
		$ctr++;
	}	

	foreach ($cur as $cur1) {
		$Data[$ctr+1]['data']['to'] = $from;
		$Data[$ctr+1]['data']['title'] = str_replace("&nbsp;",'',$cur1->plaintext);	
		$Data[$ctr+1]['data']['img'] = $cur1->children(0)->src;	
		$Data[$ctr+1]['data']['fromTo'] = 1;	
		$Data[$ctr+1]['data']['toFrom'] = 1;	
	}