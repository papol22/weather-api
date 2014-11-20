<?php

ob_start();
	include('ratesApi.php');
$output = ob_get_clean();
		
$time = time();
$output = "$time\n$output";
save_data( $output );
		
function save_data($somecontent)
{	  
	  
	 $filename = 'rate.info';
	  
    // In our example we're opening $filename in append mode.
    // The file pointer is at the bottom of the file hence
    // that's where $somecontent will go when we fwrite() it.
    if (!$handle = fopen($filename, 'w')) {
         echo "Cannot open file ($filename)";
         exit;
    }

    // Write $somecontent to our opened file.
    if (fwrite($handle, $somecontent) === FALSE) {
        echo "Cannot write to file ($filename)";
        exit;
    }

	fclose($handle);
	

}