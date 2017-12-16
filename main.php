<?php
use madmis\CoingeckoApi\CoingeckoApi;
use madmis\CoingeckoApi\Api;

function getData() {
	$api = new CoingeckoApi();
	return $api->shared()->priceCharts(Api::BASE_BCC, Api::QUOTE_USD, Api::PERIOD_24HOURS, false);
} 
