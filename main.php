<?php

require 'vendor/autoload.php';
require 'app/GetApi.php';
require 'app/Currency.php';

use app\GetApi;

$client = new GetApi();

$amount = (float)readline('Enter the sum you want to convert: ');
$currency = readline('Enter the currency ID you want to convert TO: ');

$result = $client->convert($amount, $currency);
var_dump($result);
echo "You just converted $amount of Euros to $result $currency" . PHP_EOL;