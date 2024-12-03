<?php
function hash_call($methodName, $nvpParams) {
    $apiEndpoint = PAYPAL_API_ENDPOINT;
    $username = PAYPAL_API_USERNAME;
    $password = PAYPAL_API_PASSWORD;
    $signature = PAYPAL_API_SIGNATURE;

    $nvpString = http_build_query($nvpParams) . "&USER=$username&PWD=$password&SIGNATURE=$signature&VERSION=204";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiEndpoint);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpString);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);

    parse_str($response, $parsedResponse);
    return $parsedResponse;
}
?>