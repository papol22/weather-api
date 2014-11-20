<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Weather Forecast</title>
    <link rel="stylesheet" type="text/css" href="weather.css">
  </head>
  <body>
  	  <?php
		// Requested file
		// Could also be e.g. 'currencies.json' or 'historical/2011-01-01.json'
		$file = 'latest.json';
		$appId = 'af94a138eabd4539b6eddf79cf965254';
		
		// Open CURL session:
		$ch = curl_init("http://openexchangerates.org/api/{$file}?app_id={$appId}");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		// Get the data:
		$json = curl_exec($ch);
		curl_close($ch);
		
		// Decode JSON response:
		$exchangeRates = json_decode($json);
		
		// You can now access the rates inside the parsed object, like so:
		printf(
		    "1 %s in GBP: %s (as of %s)",
		    $exchangeRates->base,
		    $exchangeRates->rates->GBP,
		    date('H:i jS F, Y', $exchangeRates->timestamp)
		);
		// -> eg. "1 USD in GBP: 0.643749 (as of 11:01, 3rd January 2012)"
?> 
  </body>
</html>