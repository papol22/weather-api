<?php
	ob_start();
	$from = 'PHP';
	include('rate.dom.php');
	$output = ob_get_clean();


	$array = serialize($Data);


	save_array($array);

	function save_array($somecontent)
	{	  
	  $filename = 'rates'; 
    
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
	//print_r($Data);
	//echo '</pre>';