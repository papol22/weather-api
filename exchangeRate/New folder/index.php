<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pera Exchange Rate</title>
    <link rel="stylesheet" type="text/css" href="weather.css">
  </head>
  <body>
  	<div class='erWrapper'>
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
  	?>


  		<table>
  			<th>Base |</th><th>PHP</th><th>KRW</th><th>CNY</th><th>JPY</th><th>CAD</th><th>USD</th><th>GBP</th><th>EUR</th><th>AED</th>
  			<?php
  				function get_data()
				{
					// get contents of a file into a string
					$filename = "rate.info";
					$handle = fopen($filename, "r");
					$contents = fread($handle, filesize($filename));
					fclose($handle);
					
					list($stamp, $content) = explode("\n", $contents, 2);
					
					return $content;
				}
  			?>
  		</table>
  	</div>
  </body>
</html>