<?php
require '../includes/config.php';
require '../includes/functions.php';

$token = $_GET['token'];
$payerID = $_GET['PayerID'];

$nvpParams = array(
    'METHOD' => 'DoExpressCheckoutPayment',
    'TOKEN' => $token,
    'PAYERID' => $payerID,
    'PAYMENTREQUEST_0_AMT' => '10.00',
    'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD',
    'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale',
);

$response = hash_call('DoExpressCheckoutPayment', $nvpParams);
if ($response['ACK'] == 'Success') {
    echo "Payment Successful!";
} else {
    echo "Error: " . print_r($response, true);
}
?>