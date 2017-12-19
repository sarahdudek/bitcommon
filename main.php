<?php
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
require('credentials.php');

class Repository {
	function getClient($apiKey, $apiSecret) {
		$configuration = Configuration::apiKey($apiKey, $apiSecret);
		$client = Client::create($configuration);
	}

	function getData() {
		$client = getClient(Credentials::API_KEY, Credentials::API_SECRET);

		$data = array();
		// foreach ($stats as $row) {
		// 	$obj = array();

		// 	$obj['date'] = date('d/m/Y', int($row[0]));
		// 	$obj["price"] = number_format($row[1], 2, '.', ',');
		// 	$data[] = $obj;
		// }
		return $data;
	}
}