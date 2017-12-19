<?php

function getData() {
	// $stats = makeApiCall();
	$data = array();
	foreach ($stats as $row) {
		$obj = array();

		$obj['date'] = date('d/m/Y', int($row[0]));
		$obj["price"] = number_format($row[1], 2, '.', ',');
		$data[] = $obj;
	}
	return $data;
}

function makeApiCall() {
}