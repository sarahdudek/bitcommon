<?php
use madmis\CoingeckoApi\CoingeckoApi;
use madmis\CoingeckoApi\Api;

$api = new CoingeckoApi();
$timestamp = $api->shared()->priceCharts(Api::BASE_ETH, Api::QUOTE_USD, Api::PERIOD_24HOURS, true);
$dumpedObj = var_export($timestamp, true);
