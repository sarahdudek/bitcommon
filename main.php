<?php
use madmis\CoingeckoApi\CoingeckoApi;
use madmis\CoingeckoApi\Api;

function getData($crypto = Api::BASE_BCC, $currency = Api::QUOTE_USD, $period = Api::PERIOD_24HOURS, $mapping = false) {
	$stats = makeApiCall($crypto, $currency, $period, $mapping);
	$data = array();
	foreach ($stats as $row) {
		$obj = array();
		$dt = new DateTime($row[0]);
		$obj["date"] = $dt->format('Y-m-d H:i:s');
		$obj["price"] = number_format($row[1], 2, '.', ',');
		$data[] = $obj;
	}
	return $data;
}

function makeApiCall($crypto = Api::BASE_BCC, $currency = Api::QUOTE_USD, $period = Api::PERIOD_24HOURS, $mapping = false) {
	$api = new CoingeckoApi();
	$result = $api->shared()->priceCharts($crypto, $currency, $period, $mapping);
	return $result["stats"];
}