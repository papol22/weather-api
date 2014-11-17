<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Weather Forecast</title>
    <link rel="stylesheet" type="text/css" href="weather.css">
  </head>
  <body>
<?php
   include('weather.api.php');

 //     $try = $weather_day[1]->hourly[1]->tempC;
 //     print_r( $try );

echo "
    
    <div class='wrapper'>

      <div class='infos'>
        <div>$query</div>
        <div>$cur_temp_C °C | $cur_temp_F °F</div>
        <div>$cur_weatherDesc </div>
        <div>Wind: $cur_winddir16Point at $cur_windspeedMiles mph/$cur_windspeedKmph km/h</div>
        <div>Humidity: $cur_humidity%</div>
      </div>

      <div class='days-wrapper'>
      
       ";
$day = 0;
for ($day=0; $day < $days; $day++) { 
       
echo "<div class='day'>
        <div>".$weather_day[$day]->date."</div>
          <img src='".$weather_day[$day]->hourly[0]->weatherIconUrl[0]->value."'/>
          <div>".$weather_day[$day]->maxtempC." °C | ".$weather_day[$day]->mintempC." °C</div>
          <div>".$weather_day[$day]->maxtempF." °F | ".$weather_day[$day]->mintempF." °F</div>
        </div>";
    }
echo  "</div>";


echo "</div>";
?>
  </body>
</html>