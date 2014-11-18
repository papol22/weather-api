<?php
	$url = file_get_contents("http://api.worldweatheronline.com/free/v2/weather.ashx?q=Angeles,Philippines&format=json&key=ba6129736b1cf027a8103fc44fc3e&tp=24");
	echo "<pre>";
	print_r(json_decode($url));
    
	$url = file_get_contents("http://api.worldweatheronline.com/free/v2/weather.ashx?q=Davao,Philippines&format=json&key=ba6129736b1cf027a8103fc44fc3e&tp=24");
	echo "<pre>";
	print_r(json_decode($url));
 