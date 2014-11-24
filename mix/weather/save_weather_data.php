<?php
	ob_start();
	$location = 'Manila,Philippines';
	include('weather_collect_data.php');
	

	

  	error_reporting(E_ERROR | E_PARSE);
	$gettime  = date("h:i A", strtotime($cur_localObsDateTime));

	echo "
		<div class='w-top'>
			<div class='w-location'>". $query ."</div>
			<img src='" .  $cur_weatherIconUrl ."'/>
			<div class='c_time'>". $gettime ."</div>
			<div class='c_temp'>". $cur_temp_C." °C</div>
			
		</div>
			
			<div class='c_fl d'>Feels like: ". $cur_FeelsLikeC ."°C</div>
        	<div class='c_hum d'>Humidity: ". $cur_humidity ."%</div>
        	<div class='c_wind d'>Wind: ". $cur_winddir16Point." ".$cur_windspeedMiles ."mph</div>
        	<div class='c_desc d'>". $cur_weatherDesc ."</div>
	";





	$output = ob_get_clean();

	$time = time();
	$output = "$time\n$output";
	save_data( $output );

	function save_data($somecontent)
	{	  
	  
	  $filename = 'weather.page';
	  
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