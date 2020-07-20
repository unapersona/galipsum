<?php

use Klein\Klein;

$klein = new Klein();

$klein->respond(function (\Klein\Request $request, \Klein\Response $response, \Klein\ServiceProvider $service, \Klein\App $app){
	$service->texts = require 'data/text.php';
});

$klein->respond('/src/assets/[script.min.js|style.css|style.css.map|galipsum.svg:filename]', function ($request, $response, $service) {
    $mime = null;
    if(preg_match('/(css|css.map)$/', $request->filename)) {
        $mime = 'text/css';
    }
    else if(preg_match('/(js|js.map)$/', $request->filename)) {
        $mime = 'text/javascript';
    }
    else if(preg_match('/(svg)$/', $request->filename)) {
        $mime = 'image/svg+xml';
    }
    $response->file('./src/assets/' . $request->filename, $request->filename, $mime);
});

$klein->respond('/favicon.ico', function ($request, $response, $service) {
    $response->file('./favicon.ico', 'favicon.ico', 'image/vnd.microsoft.icon');
});

$klein->respond('GET', '/', function (\Klein\Request $request, \Klein\Response $response, \Klein\ServiceProvider $service, \Klein\App $app){
	$service->title = 'GALipsum | Xerador de textos de recheo en galego';
	$service->render(__DIR__ . '/templates/app.php');
});

$klein->dispatch();

