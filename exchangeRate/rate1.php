<?php
php_sapi_name();
	require_once('simple_html_dom.php');
	
	$html = file_get_html('http://fx-rate.net/'.$from.'/');
	
	$rows = $html->find('#toptencurrencies table',1);
	$tr = $rows->find('tbody tr');

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
	
echo "
	<table>
		<tr><td colspan=2><strong>Country</strong></td><td><strong>From ".$Data['from']."</strong></td><td><strong>To ".$Data['from']."</strong></td></tr>";
		foreach ($Data as $d) {
		if(empty($d['data'])){continue;}
echo "<tr><td><img src='".$d['data']['img']."'/></td><td>".$d['data']['title']."</td><td>".$d['data']['fromTo']."</td><td>".$d['data']['toFrom']."</td></tr>";
		
		}
			
		
echo "</table>";

//	echo '<xmp>';
//	print_r($Data);
//	echo '</xmp>';
