<!DOCTYPE HTML>

<html>
	<head>

		<title></title>
		 <meta charset="UTF-8">
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="mix.css">
	</head>
	<body>
		<div id='body'>
			<div class='weather'>
				<?php
				echo get_weatherpage();
				?>
			</div>


			<div class='currency'>
				<div class='cur-top'>Exchange Rate</div>
				<?php
				echo get_currencypage();
				?>
			</div>
		</div>












<?php
	function get_currencypage()
	{
		$filename = "currency.page";

		$handle = fopen('currency/'.$filename, "r");
		$contents = fread($handle, filesize('currency/'.$filename));
		fclose($handle);

		list($stamp, $content) = explode("\n", $contents, 2);
		
		return $content;
	}

	function get_weatherpage()
	{
		$filename = "weather.page";

		$handle = fopen('weather/'.$filename, "r");
		$contents = fread($handle, filesize('weather/'.$filename));
		fclose($handle);

		list($stamp, $content) = explode("\n", $contents, 2);
		
		return $content;
	}
?>


	</body>


</html> 