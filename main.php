<?php
use madmis\CoingeckoApi\CoingeckoApi;
use madmis\CoingeckoApi\Api;

$api = new CoingeckoApi();
$timestamp = $api->shared()->priceCharts(Api::BASE_BCC, Api::QUOTE_USD, Api::PERIOD_24HOURS, false);
$dumpedObj = var_dump($timestamp, true);

// make a simple object that stores/enumerates through the data
// Number one function:
	// Function to take that return value, make it pretty

function printPricePoint($datePriceObject) {
	$array = $datePriceObject[0][0];
	return $array["stats"];
} 

$dumperino = printPricePoint($timestamp);
