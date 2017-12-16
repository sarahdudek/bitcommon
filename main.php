<?php
use madmis\CoingeckoApi\CoingeckoApi;
use madmis\CoingeckoApi\Api;

function getPriceData() {
	$api = new CoingeckoApi();
	$rows = $api->shared()->priceCharts(Api::BASE_BCC, Api::QUOTE_USD, Api::PERIOD_24HOURS, false);
	$prices = array();

	foreach ($rows["stats"] as $row) {
		$price = number_format($row[1], 2, '.', ',');
		array_push($prices, $price);
	}
	return $prices;
} 

function getDateData() {
	$api = new CoingeckoApi();
	$rows = $api->shared()->priceCharts(Api::BASE_BCC, Api::QUOTE_USD, Api::PERIOD_24HOURS, false);
	$dates = array();

	foreach ($rows["stats"] as $row) {
		$date = $row[0];
		array_push($dates, $date);
	}
	return $dates;
} 
