<?php
use madmis\CoingeckoApi\CoingeckoApi;
use madmis\CoingeckoApi\Api;

$api = new CoingeckoApi();
$timestamp = $api->shared()->priceCharts(Api::BASE_BCC, Api::QUOTE_USD, Api::PERIOD_24HOURS, false);

function printPricePoint($datePriceObject) {
	$array = $datePriceObject[0];
	var_dump($array["stats"], true);
} 

$dumperino = printPricePoint($timestamp);
