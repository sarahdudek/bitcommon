<?php
use madmis\CoingeckoApi\CoingeckoApi;
use madmis\CoingeckoApi\Api;

function getData() {
	$api = new CoingeckoApi();
	$rows = $api->shared()->priceCharts(Api::BASE_BCC, Api::QUOTE_USD, Api::PERIOD_24HOURS, false);
	$groups = array();
	foreach ($rows["stats"] as $row) {
		$price = number_format($row[1], 2, '.', ',');
		array_push($groups, $price);
	}
	// $keys = array();
	// foreach ($rows as $key => $value) {
	// 	array_push($keys, $price);
	// }
	return $groups;
} 
