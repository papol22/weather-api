<html>
    <head>
        <title>Translator</title>
        <meta charset='utf-8'></meta>
        <style type="text/css">
            .content{
                width: 400px;
                height: auto;
            }
            .translate{
                width: 400px;
                height: 0;
            }
        </style>
    </head>
    <body>

        <div class='content'>the best machine translation technology cannot always provide translations tailored to a site or users like a human</div>
        <div class='translate'></div>
        <button class='transBtn'>Translate</button>
        <script src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
        <script type="text/javascript">
            //var txtcontent = $('.content').

            $('.transBtn').hide();
            $('.transBtn').on('click', function(){

            });
        </script>
    </body>
</html>

<?php

    require_once('bingApi.php');

    //Client ID of the application.
     $clientID     = "papol22";
    //Client Secret key of the application.
     $clientSecret = "BV1OAhAhF9FJQ7UI2e2ZLOcMJ0alpnlpYvffGSraRa4=";
    //OAuth Url.
     $authUrl      = "https://datamarket.accesscontrol.windows.net/v2/OAuth2-13/";
    //Application Scope Url
     $scopeUrl     = "http://api.microsofttranslator.com";
    //Application grant type
     $grantType    = "client_credentials";

    $nc = new AccessTokenAuthentication();

    $nc1 = $nc->detectLan($inputStr='ako sino siya tayo pano',$grantType, $scopeUrl, $clientID, $clientSecret, $authUrl);

    echo $nc1;

    

//echo '<br>';
//echo 'Lan: '.$languageCode.'<br>';
//echo 'Orig Lan: '.$inputStr.'<br>';
//echo 'Translated lan: '.$translatedStr; 

?>