
<html>
<head></head>
<body>
<?php
	include('simple_html_dom.php');
	$from = 'PHP';
	$html = file_get_html('http://fx-rate.net/'.$from.'/');
	
	

	$rows = $html->find('#toptencurrencies table',1);
	$rows1 = $rows->find('tbody tr');
	

	foreach ($rows1 as $row) {
			$a = Array();
			foreach ($row->find('td a') as $aa) {
				$aa['to'] = $aa->href;
				$aa['title'] = $aa->title;
			}
			$a[] = $aa;

	}
	

//http://fx-rate.net/PHP/USD
//http://www.bloomberg.com/quote/PHPKRW:CUR
	function rate($a){
		$data = Array();
			foreach ($a->find('td a',0) as $aa) {
				$data['to'] = $aa->href;
				$data['title'] = $aa->title;
				foreach ($a->find('td a img',0) as $img) {
				$data['img'] = $img->src;
					foreach ($a->find('td a',1) as $value1) {
					$data['toFrom'] = $value1->innertext;
						foreach ($a->find('td a',3) as $value2) {
						$data['fromTo'] = $value2->innertext;
						}
					}
				}
			}
			
			
		return $data;
	}
	

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