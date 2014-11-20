
<?php
php_sapi_name();
      $key = 'ba6129736b1cf027a8103fc44fc3e';
      $days = '5';
      $format = 'json';
      $url1 = file_get_contents('http://api.worldweatheronline.com/free/v2/weather.ashx?q='.$location.'&num_of_days='.$days.'&extra=localObsTime&format='.$format.'&key='.$key);
      $json_d = json_decode($url1);
      
    // $days = $days-1;
      foreach ($json_d->data->current_condition as $cur) {

        $cur_cloudcover     = $cur->cloudcover;
        $cur_FeelsLikeC         = $cur->FeelsLikeC;    
        $cur_FeelsLikeF         = $cur->FeelsLikeF;
        $cur_humidity           = $cur->humidity;
        $cur_localObsDateTime   = $cur->localObsDateTime;
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

//	$json_d  = json_decode($url1);
//	echo'<pre>';
//	print_r($json_d);
//	echo'</pre>';

 //     $try = $weather_day[1]->hourly[1]->tempC;
 //     print_r( $try );

echo "
	<div class='body'>
    <div class='loc'>$query</div>
    <div class='wrapper'>

      <div class='infos'>
      
        <div class='c_temp'>$cur_temp_C °C | $cur_temp_F °F</div>
        
        <div class='c_time d'>$cur_localObsDateTime</div>
        <div class='c_hum d'>Humidity: $cur_humidity%</div>
        <div class='c_wind d'>Wind: $cur_winddir16Point at $cur_windspeedMiles mph/$cur_windspeedKmph km/h</div>
        <div class='c_desc d'>Current: $cur_weatherDesc </div>
        <img src='$cur_weatherIconUrl'/>
      </div>

      <div class='days-wrapper'>";

$day = 0;
error_reporting(E_ERROR | E_PARSE);
for ($day=0; $day < $days; $day++) { 
$date = strtotime($weather_day[$day]->date);
$getday = date('D', $date);
$gettime  = date("Hi", strtotime($cur_localObsDateTime));

//for ($time=0; $time < 8 ; $time++) { 
//  if($gettime >= .$weather_day[$day]->hourly[$time]->time)
//}

echo "<div class='day'>
        <div class='dateday'>$getday</div>
          <img src='".$weather_day[$day]->hourly[5]->weatherIconUrl[0]->value."'/>
          <div class='wDesc'>".$weather_day[$day]->hourly[5]->weatherDesc[0]->value."</div>
          <div class='mmC'>".$weather_day[$day]->maxtempC." °C | ".$weather_day[$day]->mintempC." °C</div>
          <div class='mmF'>".$weather_day[$day]->maxtempF." °F | ".$weather_day[$day]->mintempF." °F</div>
        </div>";
    }
echo  "</div>";
echo "</div></div><br/>
";


?>