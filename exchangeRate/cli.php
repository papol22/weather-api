<?php

		ob_start();
		$location = 'Pampanga,Philippines';
		include('weather.api.php');
		 $location = 'Manila,Philippines';
		include('weather.api.php');
		 $location = 'Baguio,Philippines';
		include('weather.api.php');
		 $location = 'Cebu,Philippines';
		include('weather.api.php');
		 $location = 'Davao,Philippines';
		include('weather.api.php');
		$output = ob_get_clean();
		
		
		$time = time();
		$output = "$time\n$output";
		save_data( $output );
		
		
       function getDay( $weather_day ){
        $data = Array();
        $data['moonrise'] = $weather_day->astronomy[0]->moonrise;
        $data['moonset']  = $weather_day->astronomy[0]->moonset;
        $data['sunrise']  = $weather_day->astronomy[0]->sunrise;
        $data['sunset']   = $weather_day->astronomy[0]->sunset;
        $data['date']     = $weather_day->date;
        $data['maxtempC'] = $weather_day->maxtempC;
        $data['maxtempF'] = $weather_day->maxtempF;
        $data['mintempC'] = $weather_day->mintempC;
        $data['mintempF'] = $weather_day->mintempF;
        $data['hourly'][] = $weather_day;
        return $data;
      }

      function getHourly($weather_day ){
        $data_h = Array();
          $data_h['chanceoffog']      = $weather_day->hourly->chanceoffog;
          $data_h['chanceoffrost']    = $weather_day->hourly->chanceoffrost;
          $data_h['chanceofhightemp'] = $weather_day->hourly->chanceofhightemp;
          $data_h['chanceofovercast'] = $weather_day->hourly->chanceofovercast;
          $data_h['chanceofrain']     = $weather_day->hourly->chanceofrain;
          $data_h['chanceofremdry']   = $weather_day->hourly->chanceofremdry;
          $data_h['chanceofsnow']     = $weather_day->hourly->chanceofsnow;
          $data_h['chanceofsunshine'] = $weather_day->hourly->chanceofsunshine;
          $data_h['chanceofthunder']  = $weather_day->hourly->chanceofthunder;
          $data_h['chanceofwindy']    = $weather_day->hourly->chanceofwindy;
          $data_h['cloudcover']       = $weather_day->hourly->cloudcover;
          $data_h['DewPointC']        = $weather_day->hourly->DewPointC;
          $data_h['DewPointF']        = $weather_day->hourly->DewPointF;
          $data_h['FeelsLikeC']       = $weather_day->hourly->FeelsLikeC;
          $data_h['FeelsLikeF']       = $weather_day->hourly->FeelsLikeF;
          $data_h['HeatIndexC']       = $weather_day->hourly->HeatIndexC;
          $data_h['HeatIndexF']       = $weather_day->hourly->HeatIndexF;
          $data_h['humidity']         = $weather_day->hourly->humidity;
          $data_h['precipMM']         = $weather_day->hourly->precipMM;
          $data_h['pressure']         = $weather_day->hourly->pressure;
          $data_h['tempC']            = $weather_day->hourly->tempC;
          $data_h['tempF']            = $weather_day->hourly->tempF;
          $data_h['time']             = $weather_day->hourly->time;
          $data_h['visibility']       = $weather_day->hourly->visibility;
          $data_h['weatherCode']      = $weather_day->hourly->weatherCode;
          $data_h['WindChillC']       = $weather_day->hourly->WindChillC;
          $data_h['WindChillF']       = $weather_day->hourly->WindChillF;
          $data_h['winddir16Point']   = $weather_day->hourly->winddir16Point;
          $data_h['winddirDegree']    = $weather_day->hourly->winddirDegree;
          $data_h['WindGustKmph']     = $weather_day->hourly->WindGustKmph;
          $data_h['WindGustMiles']    = $weather_day->hourly->WindGustMiles;
          $data_h['windspeedKmph']    = $weather_day->hourly->windspeedKmph;
          $data_h['windspeedMiles']   = $weather_day->hourly->windspeedMiles;
          $data_h['weatherDesc']      = $weather_day->hourly->weatherDesc[0]->value;
          $data_h['weatherIconUrl']   = $weather_day->hourly->weatherIconUrl[0]->value;

        return $data_h;
      }

function save_data($somecontent)
{	  
	  
	  $filename = 'weather.info';
	  
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
