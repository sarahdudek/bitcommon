<?php

require('../vendor/autoload.php');
require('../main.php');

$app = new Silex\Application();
$app['debug'] = true;

$repo = new Repository();

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
	'monolog.logfile' => 'php://stderr',
	));

// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => __DIR__.'/views',
	));

// Our web handlers
$app->get('/', function() use($app) {
	$app['monolog']->addDebug('logging output.');
	// $data = $repo->getData();
	// $data['date'] = date('r', $data["date"])
	return $app['twig']->render('index.twig', array("data" => $data));
});

$app->run();
