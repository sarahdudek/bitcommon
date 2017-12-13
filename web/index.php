<?php

require('../vendor/autoload.php');
// require_once('../main.php');
use madmis\CoingeckoApi;


$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
	'monolog.logfile' => 'php://stderr',
	));

// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => __DIR__.'/views',
	));

	$api = new CoingeckoApi();
	$timestamp = $api->shared()->getExchangeRates(true);
// Our web handlers

$app->get('/', function() use($app) {
	$app['monolog']->addDebug('logging output.');
	return $app['twig']->render('index.twig', array("timestamp" => $timestamp));
});

$app->run();
