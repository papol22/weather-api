
<html>
<head></head>
<body>
<?php
	include('simple_html_dom.php');
	$from = 'PHP';
	$to   = 'KRW';
	$html = file_get_html('http://www.bloomberg.com/quote/'.$from.''.$to.':CUR');
	
	
	echo  $html->find('.price',0)->innertext;
	

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