<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Weather layer</title>
    <style>
     *{
        margin: 0px;
        padding: 0px;
        font: 13px/1.25 'Helvetica Neue',Helvetica,Arial,sans-serif;
      }

      body {
        background: -moz-linear-gradient(top,  rgba(0,92,173,0.65) 0%, rgba(0,92,173,0) 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,92,173,0.65)), color-stop(100%,rgba(0,92,173,0))); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top,  rgba(0,92,173,0.65) 0%,rgba(0,92,173,0) 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top,  rgba(0,92,173,0.65) 0%,rgba(0,92,173,0) 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(top,  rgba(0,92,173,0.65) 0%,rgba(0,92,173,0) 100%); /* IE10+ */
        background: linear-gradient(to bottom,  rgba(0,92,173,0.65) 0%,rgba(0,92,173,0) 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6005cad', endColorstr='#00005cad',GradientType=0 ); /* IE6-9 */
      }

      .body {
        position: relative;
        display: block;
        margin: 50px auto;
        height: auto;
        width: 800px;
        padding: 10px 10px 50px 10px;

        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
        background: -moz-linear-gradient(top,  rgba(0,0,0,0.65) 0%, rgba(0,0,0,0) 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0.65)), color-stop(100%,rgba(0,0,0,0))); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(top,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%); /* IE10+ */
        background: linear-gradient(to bottom,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6000000', endColorstr='#00000000',GradientType=0 ); /* IE6-9 */
      }

      .top {
        position: relative;
        width: 100%;
        margin-bottom: 10px;
      }

      .hourly-wrapper{
        width: 100%;
        height: 180px;
      }

      .hourly-wrapper .title{
        width: 100%;
        height: 9.5%;
        color: white;
        border-bottom: solid 1px;
        margin-bottom: 3px;

      }

      .hourly-wrapper .hw-list{
        padding: 3px;
        height: 100%;
        width: 150.8px;
        display: inline-block;

        background: -moz-linear-gradient(top,  rgba(0,0,0,0.3) 0%, rgba(1,2,2,0.2) 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0.3)), color-stop(100%,rgba(1,2,2,0.2))); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top,  rgba(0,0,0,0.3) 0%,rgba(1,2,2,0.2) 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top,  rgba(0,0,0,0.3) 0%,rgba(1,2,2,0.2) 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(top,  rgba(0,0,0,0.3) 0%,rgba(1,2,2,0.2) 100%); /* IE10+ */
        background: linear-gradient(to bottom,  rgba(0,0,0,0.3) 0%,rgba(1,2,2,0.2) 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#66000000', endColorstr='#66010202',GradientType=0 ); /* IE6-9 */
      }

    </style>
  </head>
  <body>
      
    <?php
        $numofdays = "5";
        //$url = file_get_contents("http://api.worldweatheronline.com/free/v2/weather.ashx?q=bacolor,philippines&format=json&date=today&includeLocation=yes&cc=yes&num_of_days=".$numofdays."&tp=24&showlocaltime=no&key=ba6129736b1cf027a8103fc44fc3e");
        $url = file_get_contents("http://api.worldweatheronline.com/free/v2/weather.ashx?q=Philippines&format=json&key=ba6129736b1cf027a8103fc44fc3e&tp=24");
        $json_d  = json_decode($url);

        //Getting Information
          
            //current_condition
            foreach ($json_d->data->current_condition as $cc) {
              $cc_cloudcover        = $cc->cloudcover;
              $cc_FeelsLikeC        = $cc->FeelsLikeC;
              $cc_FeelsLikeF        = $cc->FeelsLikeF;
              $cc_humidity          = $cc->humidity;
              $cc_observation_time  = $cc->observation_time;
              $cc_precipMM          = $cc->precipMM;
              $cc_pressure          = $cc->pressure;
              $cc_temp_C            = $cc->temp_C;
              $cc_temp_F            = $cc->temp_F;
              $cc_visibility        = $cc->visibility;
              $cc_weatherCode       = $cc->weatherCode;
              $cc_weatherDesc       = $cc->weatherDesc[0]->value;
              $cc_weatherIconUrl    = $cc->weatherIconUrl[0]->value;
              $cc_winddir16Point    = $cc->winddir16Point;
              $cc_winddirDegree     = $cc->winddirDegree;
              $cc_windspeedKmph     = $cc->windspeedKmph;
              $cc_windspeedMiles    = $cc->windspeedMiles;
            }

            //request
            foreach ($json_d->data->request as $req) {
              $query             = $req->query;
              $type              = $req->type;
            }

            //time-zone
          //  foreach ($json_d->data->time_zone as $tz) {
          //    $localtime        = $tz->localtime;
          //    $utcOffset        = $tz->utcOffset;
          //  }

            //weather 
            foreach ($json_d->data->weather as $weather) {
              //astromomy
              $moonrise           = $weather->astronomy[0]->moonrise;
              $moonset            = $weather->astronomy[0]->moonset;
              $sunrise            = $weather->astronomy[0]->sunrise;
              $sunset             = $weather->astronomy[0]->sunset;

              $date               = $weather->date;

              //Hourly
              $h_chanceoffog        = $weather->hourly[0]->chanceoffog;
              $h_chanceoffrost      = $weather->hourly[0]->chanceoffrost;
              $h_chanceofhightemp   = $weather->hourly[0]->chanceofhightemp;
              $h_chanceofovercast   = $weather->hourly[0]->chanceofovercast;
              $h_chanceofrain       = $weather->hourly[0]->chanceofrain;
              $h_chanceofremdry     = $weather->hourly[0]->chanceofremdry;
              $h_chanceofsnow       = $weather->hourly[0]->chanceofsnow;
              $h_chanceofsunshine   = $weather->hourly[0]->chanceofsunshine;
              $h_chanceofthunder    = $weather->hourly[0]->chanceofthunder;
              $h_chanceofwindy      = $weather->hourly[0]->chanceofwindy;
              $h_cloudcover         = $weather->hourly[0]->cloudcover;
              $h_DewPointC          = $weather->hourly[0]->DewPointC;
              $h_DewPointF          = $weather->hourly[0]->DewPointF;
              $h_FeelsLikeC         = $weather->hourly[0]->FeelsLikeC;
              $h_FeelsLikeF         = $weather->hourly[0]->FeelsLikeF;
              $h_HeatIndexC         = $weather->hourly[0]->HeatIndexC;
              $h_HeatIndexF         = $weather->hourly[0]->HeatIndexF;
              $h_humidity           = $weather->hourly[0]->humidity;
              $h_precipMM           = $weather->hourly[0]->precipMM;
              $h_pressure           = $weather->hourly[0]->pressure;
              $h_tempC              = $weather->hourly[0]->tempC;
              $h_tempF              = $weather->hourly[0]->tempF;
              $h_time               = $weather->hourly[0]->time;
              $h_visibility         = $weather->hourly[0]->visibility;
              $h_weatherCode        = $weather->hourly[0]->weatherCode;
              $h_weatherDesc        = $weather->hourly[0]->weatherDesc[0]->value;
              $h_weatherIconUrl     = $weather->hourly[0]->weatherIconUrl[0]->value;
              $h_WindChillC         = $weather->hourly[0]->WindChillC;
              $h_WindChillF         = $weather->hourly[0]->WindChillF;
              $h_winddir16Point     = $weather->hourly[0]->winddir16Point;
              $h_winddirDegree      = $weather->hourly[0]->winddirDegree;
              $h_WindGustKmph       = $weather->hourly[0]->WindGustKmph;
              $h_WindGustMiles      = $weather->hourly[0]->WindGustMiles;
              $h_windspeedKmph      = $weather->hourly[0]->windspeedKmph;
              $h_windspeedMiles     = $weather->hourly[0]->windspeedMiles;

              $maxtempC           = $weather->maxtempC;
              $maxtempF           = $weather->maxtempF;
              $mintempC           = $weather->mintempC;
              $mintempF           = $weather->mintempF;
            }
     ?>




    <div class='body'>

      <div class='top'>
        <span style='color: white; font-size:140%;'><?php echo $query ?></span>
      </div>

      <div class='hourly-wrapper'>
        <div class='title'><span>HOURLY FORECAST:<?php echo " ".$date." Sunrise: ".$sunrise." Sunset: ".$sunset ?>  </span></div>
        <?php
           foreach ($json_d->data->weather as $weather) {
             $h_weatherIconUrl     = $weather->hourly[0]->weatherIconUrl[0]->value;
             $h_tempC              = $weather->hourly[0]->tempC;
             $h_FeelsLikeC         = $weather->hourly[0]->FeelsLikeC;
             $h_weatherDesc        = $weather->hourly[0]->weatherDesc[0]->value;
             $h_humidity           = $weather->hourly[0]->humidity;

            echo<<<this
              <div class='hw-list'>
                
                <img src='$h_weatherIconUrl'/><br>
                Humidity: $h_humidity         <br>
                Feels like: $h_FeelsLikeC     <br>
                                              <br>
                $h_weatherDesc  

              </div>
this;
           }
        ?>
        </div>
      </div>
    </div>

    <footer>

    </footer>




     

  </body>
</html>