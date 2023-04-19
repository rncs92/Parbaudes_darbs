<?php

require 'vendor/autoload.php';
use app\GetApi;

$client = new GetApi();

$amount = (float)readline('Enter the sum you want to convert: ');
$currency = strtoupper(readline('Enter the currency ID you want to convert TO: '));

$result = $client->convert($amount, $currency);

echo "You just converted $amount Euros to $result $currency" . PHP_EOL;