<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Weather Forecast</title>
    <link rel="stylesheet" type="text/css" href="weather.css">
  </head>
  <body>

<?php
	
	$time_start = microtime_float();
	
	$output = get_data();
	
	$time_end = microtime_float();
	$time = round($time_end - $time_start, 5);

	
	echo "<h3>Script Run Time: $time</h3>";
	echo $output;
	
	
	
	
	
   

   function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}



function get_data()
{
	// get contents of a file into a string
	$filename = "weather.info";
	$handle = fopen($filename, "r");
	$contents = fread($handle, filesize($filename));
	fclose($handle);
	
	list($stamp, $content) = explode("\n", $contents, 2);
	
	return $content;
	
	/**
	if ( $stamp < time() - 60 ) return null;
	else {
		$sec = $stamp + 60 - time();
		echo "$sec seconds left for next re-caching<br>";
		return $content;
	}
	*/

}
?>


  </body>
</html>