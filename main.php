<?php
use madmis\CoingeckoApi\CoingeckoApi;

$api = new CoingeckoApi();
$timestamp = $api->shared()->priceCharts(Api::BASE_ETH, Api::QUOTE_USD, Api::PERIOD_24HOURS, true);