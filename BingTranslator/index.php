
<?php

class AccessTokenAuthentication {
    /*
     * Get the access token.
     *
     * @param string $grantType    Grant type.
     * @param string $scopeUrl     Application Scope URL.
     * @param string $clientID     Application client ID.
     * @param string $clientSecret Application client ID.
     * @param string $authUrl      Oauth Url.
     *
     * @return string.
     */
    function getTokens($grantType, $scopeUrl, $clientID, $clientSecret, $authUrl){
        try {
            //Initialize the Curl Session.
            $ch = curl_init();
            //Create the request Array.
            $paramArr = array (
                 'grant_type'    => $grantType,
                 'scope'         => $scopeUrl,
                 'client_id'     => $clientID,
                 'client_secret' => $clientSecret
            );
            //Create an Http Query.//
            $paramArr = http_build_query($paramArr);
            //Set the Curl URL.
            curl_setopt($ch, CURLOPT_URL, $authUrl);
            //Set HTTP POST Request.
            curl_setopt($ch, CURLOPT_POST, TRUE);
            //Set data to POST in HTTP "POST" Operation.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $paramArr);
            //CURLOPT_RETURNTRANSFER- TRUE to return the transfer as a string of the return value of curl_exec().
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
            //CURLOPT_SSL_VERIFYPEER- Set FALSE to stop cURL from verifying the peer's certificate.
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            //Execute the  cURL session.
            $strResponse = curl_exec($ch);
            //Get the Error Code returned by Curl.
            $curlErrno = curl_errno($ch);
            if($curlErrno){
                $curlError = curl_error($ch);
                throw new Exception($curlError);
            }
            //Close the Curl Session.
            curl_close($ch);
            //Decode the returned JSON string.
           $objResponse = json_decode($strResponse);
           //
           //if ($objResponse->error){
           //    throw new Exception($objResponse->error_description);
           //}
        return $objResponse->access_token;
        } catch (Exception $e) {
            echo "Exception-".$e->getMessage();
        }
    }
}

/*
 * Class:HTTPTranslator
 * 
 * Processing the translator request.
 */
Class HTTPTranslator {
    /*
     * Create and execute the HTTP CURL request.
     *
     * @param string $url        HTTP Url.
     * @param string $authHeader Authorization Header string.
     * @param string $postData   Data to post.
     *
     * @return string.
     *
     */
    public function curlRequest($url, $authHeader, $postData=''){
        //Initialize the Curl Session.
        $chh = curl_init();
        //Set the Curl url.
        curl_setopt ($chh, CURLOPT_URL, $url);
        //Set the HTTP HEADER Fields.
        curl_setopt ($chh, CURLOPT_HTTPHEADER, array($authHeader,"Content-Type: text/xml"));
        //CURLOPT_RETURNTRANSFER- TRUE to return the transfer as a string of the return value of curl_exec().
        curl_setopt ($chh, CURLOPT_RETURNTRANSFER, TRUE);
        //CURLOPT_SSL_VERIFYPEER- Set FALSE to stop cURL from verifying the peer's certificate.
        curl_setopt ($chh, CURLOPT_SSL_VERIFYPEER, False);
        if($postData) {
            //Set HTTP POST Request.
            curl_setopt($chh, CURLOPT_POST, TRUE);
            //Set data to POST in HTTP "POST" Operation.
            curl_setopt($chh, CURLOPT_POSTFIELDS, $postData);
        }
        //Execute the  cURL session.
        $curlResponse = curl_exec($chh);
        //Get the Error Code returned by Curl.
        $curlErrno = curl_errno($chh);
        if ($curlErrno) {
            $curlError = curl_error($chh);
            throw new Exception($curlError);
        }
        //Close a cURL session.
        curl_close($chh);
        return $curlResponse;
    }

    /*
     * Create Request XML Format.
     *
     * @param string $languageCode  Language code
     *
     * @return string.
     */
    function createReqXML($languageCode) {
        //Create the Request XML.
        $requestXml = '<ArrayOfstring xmlns="http://schemas.microsoft.com/2003/10/Serialization/Arrays" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">';
        if($languageCode) {
            $requestXml .= "<string>$languageCode</string>";
        } else {
            throw new Exception('Language Code is empty.');
        }
        $requestXml .= '</ArrayOfstring>';
        return $requestXml;
    }
}

?>

<!DOCTYPE HTML>
<html>
    <head >
        <meta charset="UTF-8">
        <title>Translator</title>
    </head>
    <body>
        <?php
            //Client ID of the application.
             $clientID     = "papol22";
            //Client Secret key of the application.
             $clientSecret = "BV1OAhAhF9FJQ7UI2e2ZLOcMJ0alpnlpYvffGSraRa4=";
            //OAuth Url.
             $authUrl      = "https://datamarket.accesscontrol.windows.net/v2/OAuth2-13/";
            //Application Scope Url
              $scopeUrl    = "http://api.microsofttranslator.com";
            //Application grant type
             $grantType    = "client_credentials";

            //Create the AccessTokenAuthentication object.
             $authObj      = new AccessTokenAuthentication();
             
            //Get the Access token.
             $accessToken  = $authObj->getTokens($grantType, $scopeUrl, $clientID, $clientSecret, $authUrl);
            //Create the authorization Header string.
             $authHeader   = "Authorization: Bearer ". $accessToken;
            //Input String.
             $inputStr = '오늘 새벽1시에 출발하여 20분만에 도착하니....
우와....사람들이 정말 많습니다.
지금까지 마카티 꽈달루페 시장만 10여년을 다녔는데....
후회...';
            //HTTP Detect Method URL.
             $detectMethodUrl = "http://api.microsofttranslator.com/V2/Http.svc/Detect?text=".urlencode($inputStr);
            //Call the curlRequest.
             $translatorObj = new HTTPTranslator();

            $strResponse = $translatorObj->curlRequest($detectMethodUrl, $authHeader);
            //Interprets a string of XML into an object.
                $xmlObj = simplexml_load_string($strResponse);
                foreach((array)$xmlObj[0] as $val){
                $languageCode = $val;
                }


             echo 'Text Language: '. $languageCode;

            //Set the params.//
            $fromLanguage = $languageCode;
            $toLanguage   = 'en';
            $contentType  = 'text/plain';
            $category     = 'general';

            $params = "text=".urlencode($inputStr)."&to=".$toLanguage."&from=".$fromLanguage;
            $translateUrl = "http://api.microsofttranslator.com/v2/Http.svc/Translate?$params";
            //Create the Translator Object.
            
            //Get the curlResponse.
            $curlResponse = $translatorObj->curlRequest($translateUrl, $authHeader);

            echo "<div class='content'>Original: ".$inputStr."</div>";
            echo "<div> translated : ".$curlResponse."</div>";
        ?>
        

        <script src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
        <script type="text/javascript">

        </script>
    </body>

</html>