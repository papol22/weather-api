<?php 
		ob_start();
		$from = 'PHP';
		include('rate1.php');
		$output = ob_get_clean();
		
		
		$time = time();
		$output = "$time\n$output";
		save_data( $output );


	function save_data($somecontent)
	{	  
	  
	  $filename = 'rate.info'; 
    
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