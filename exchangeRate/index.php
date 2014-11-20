
<html>
<head></head>
<body>
<?php
	include('simple_html_dom.php');
	$from = 'PHP';
	$html = file_get_html('http://fx-rate.net/'.$from.'/');
	
	

	$rows = $html->find('#toptencurrencies table',0);
	$rows1 = $rows->find('tbody tr');
	

	$a = Array();
	foreach ($rows1 as $row) {
		//$a[] = $row;
		echo $row->children(2)->children(0)->innertext;
		
	}

//http://fx-rate.net/PHP/USD
//http://www.bloomberg.com/quote/PHPKRW:CUR
	//function rate($a){
	//	$data = Array();
	//		$data['to'] = $a->find('td a',0)->href;
	//		$data['title'] = $a->find('td a',0)->title;
	//		$data['title'] = $a->find('td a img',0)->src;
	//		$data['toFrom'] = $a->find('td a',1)->innertext;
	//		$data['fromTo'] = $a->find('td a',2)->innertext;
	//	return $data;
	//}
	//echo $a[0]->title;

	//echo '<pre>';
	//print_r($a);
	//echo '</pre>';

//foreach ($rows as $row) {
//	foreach ($row->find('td a img') as $img) {
//		echo $img->src.'<br>';
//	}
//}   



   
?>
</body>
</html>