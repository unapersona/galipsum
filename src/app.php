<?php

use Klein\Klein;

$klein = new Klein();

$klein->respond(function ($request, $response, $service, $app){
	$service->texts = require 'data/text.php';
});

$klein->respond('GET', '/', function ($request, $response, $service, $app) {
	$service->title = 'GALipsum | Xerador de textos de recheo en galego';
	$service->render(__DIR__ . '/templates/app.php');
});

$klein->dispatch();

