<?php

      $key = 'ba6129736b1cf027a8103fc44fc3e';
      $days = '5';
      $location = 'Angeles,Philippines';
      $format = 'json';
      $url1 = file_get_contents('http://api.worldweatheronline.com/free/v2/weather.ashx?q='.$location.'&num_of_days='.$days.'&format='.$format.'&key='.$key);
      $json_d = json_decode($url1);
    // $days = $days-1;
      foreach ($json_d->data->current_condition as $cur) {

        $cur_cloudcover     = $cur->cloudcover;
        $cur_FeelsLikeC         = $cur->FeelsLikeC;    
        $cur_FeelsLikeF         = $cur->FeelsLikeF;
        $cur_humidity           = $cur->humidity;
        $cur_observation_time   = $cur->observation_time;
        $cur_precipMM           = $cur->precipMM;
        $cur_pressure           = $cur->pressure;
        $cur_temp_C             = $cur->temp_C;
        $cur_temp_F             = $cur->temp_F;
        $cur_visibility         = $cur->visibility;
        $cur_weatherCode        = $cur->weatherCode;
        $cur_weatherDesc        = $cur->weatherDesc[0]->value;
        $cur_weatherIconUrl     = $cur->weatherIconUrl[0]->value;
        $cur_winddir16Point     = $cur->winddir16Point;
        $cur_winddirDegree      = $cur->winddirDegree;
        $cur_windspeedKmph      = $cur->windspeedKmph;
        $cur_windspeedMiles     = $cur->windspeedMiles;

      }

      foreach ($json_d->data->request as $req) {
        $query              = $req->query;
        $type               = $req->type;
      }


      $weather_day = Array();
      foreach ($json_d->data->weather as $w) {
        $weather_day[] = $w;      
      }


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


//	$json_d  = json_decode($url1);
//	echo'<pre>';
//	print_r($json_d);
//	echo'</pre>';



?>