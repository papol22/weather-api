<?php
ob_start();
	include('currency.php');

	$array = unserialize(get_array());

		$cur = Array('USD','EUR','KRW','JPY','CNY');

		foreach ($cur as $key1) {
			foreach ($array as $key) {
				if(empty($key['data'])){continue;}

				if ($key['data']['to'] == $key1) 
				{
				echo "<div class = '".$key1."'><div  class='code'>".$key1."</div> <div class='val'>₱ ".number_format($key['data']['toFrom'],2)."</div></div><br>"; 
				}
			}
		}
$output = ob_get_clean();


//////SAVE PAGE

$time = time();
$output = "$time\n$output";
save_data( $output );

function save_data($somecontent)
{	  
  $filename = 'currency.page'; 
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

	//echo '<pre>';
	//print_r($array);
	//echo '</pre>';
//////////////////////////////////////////LOAD DATA FUNCTION
	function get_array()
	{
		$filename = "rates";

		$handle = fopen($filename, "r");
		$contents = fread($handle, filesize($filename));
		fclose($handle);
		
		return $contents;
	}