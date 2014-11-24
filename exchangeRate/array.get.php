<?php
	

$from = $_GET['from'];
$to = $_GET['to'];
$amount = $_GET['amount'];

$array = unserialize(get_array());
		
	//echo '<pre>';
	//print_r(unserialize($array));
	//echo '</pre>';

	foreach ($array as $data) {
		if(empty($data['data'])){continue;}

		if( $data['data']['to'] == $from ){
			$val = $data['data']['toFrom'];
		}
		
		if( $data['data']['to'] == $to ){
			$val1 = $data['data']['toFrom'];	
		}
	}

	$amount = number_format(($val/$val1)*$amount, 2);
	echo 'Value: '.$amount;

	function get_array()
	{
		// get contents of a file into a string
		$filename = "rate.array";

		$handle = fopen($filename, "r");
		$contents = fread($handle, filesize($filename));
		fclose($handle);
		
		return $contents;
	}

