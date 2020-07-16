<?php

use Klein\Klein;

$klein = new Klein();

$klein->respond(function (\Klein\Request $request, \Klein\Response $response, \Klein\ServiceProvider $service, \Klein\App $app){
	$service->texts = require 'data/text.php';
});

$klein->respond('GET', '/', function (\Klein\Request $request, \Klein\Response $response, \Klein\ServiceProvider $service, \Klein\App $app){
	$service->title = 'GALipsum | Xerador de textos de recheo en galego';
	$service->render(__DIR__ . '/templates/app.php');
});

$klein->dispatch();

