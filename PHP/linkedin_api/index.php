<?php

/*$url = 'https://www.linkedin.com/oauth/v2/accessToken';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL            , $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
curl_setopt($ch, CURLOPT_HTTPHEADER     , array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_USERAGENT      , 'User-Agent: Awesome-Octocat-App');
curl_setopt($ch, CURLOPT_XOAUTH2_BEARER , 'xxx');
$cont =  curl_exec($ch);
curl_close($ch);
$monJson = json_decode($cont);
echo(base64_decode($monJson->{'content'}));*/

$url = "https://www.linkedin.com/oauth/v2/accessToken?_format=api_json";
$header = array( "Content-Type: application/x-www-form-urlencoded" );

$data = http_build_query( array(
        "client_id" => '8603ghttzj7s15',
        "client_secret" => 'EQhrjdTfj9IeQcFM',
    "grant_type" => "client_credentials"
/*        "grant_type" => "authorization_code",
        "redirect_uri" => 'http://localhost:8080/linkedin/callback',
        "code" => 'r_emailaddress%20r_liteprofile%20w_member_social'*/

    ));

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_HEADER, 0);

    if( $header !== 0 ){
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    }

    curl_setopt($curl, CURLOPT_POST, true);

    if( $data !== 0 ){
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }

    $response = curl_exec($curl);
var_dump($response);
    curl_close($curl);

    $respo = json_decode($response);
    var_dump($respo);

echo     $accesstoken = $respo->access_token;

