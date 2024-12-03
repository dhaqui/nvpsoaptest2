<?php
require '../includes/config.php';
require '../includes/functions.php';

$paymentAmount = '10.00';
$returnURL = 'https://your-vercel-domain.vercel.app/public/success.html';
$cancelURL = 'https://your-vercel-domain.vercel.app/public/cancel.html';

$nvpParams = array(
    'METHOD' => 'SetExpressCheckout',
    'RETURNURL' => $returnURL,
    'CANCELURL' => $cancelURL,
    'PAYMENTREQUEST_0_AMT' => $paymentAmount,
    'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD',
    'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale',
);

$response = hash_call('SetExpressCheckout', $nvpParams);
if ($response['ACK'] == 'Success') {
    $token = $response['TOKEN'];
    header("Location: https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=$token");
    exit;
} else {
    echo "Error: " . print_r($response, true);
}
?>