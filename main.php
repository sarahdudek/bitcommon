<?php
use madmis\CoingeckoApi\CoingeckoApi;
use madmis\CoingeckoApi\Api;

function getData($crypto = Api::BASE_BCC, $currency = Api::QUOTE_USD, $period = Api::PERIOD_24HOURS, $mapping = false) {
	$stats = makeApiCall($crypto, $currency, $period, $mapping);
	$data = array();
	foreach ($stats as $row) {
		$obj = array();
		echo $row[0];
		$obj['date'] = date('d/m/Y', $row[0]);
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