<?php

require('../vendor/autoload.php');
require_once('../main.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));
$api = new CoingeckoApi();
$timestamp = $api->shared()->priceCharts(Api::BASE_ETH, Api::QUOTE_USD, Api::PERIOD_24HOURS, true));
// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

// Our web handlers

$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('index.twig', array("timestamp" => $timestamp));
});

$app->run();
