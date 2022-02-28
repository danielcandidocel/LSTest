<?php

require_once '../app/bootstrap.php';


# Routing
$request = \Illuminate\Http\Request::capture();
$container->instance('Illuminate\Http\Request', $request);

$router = new \Illuminate\Routing\Router($events, $container);

require_once '../routes/routes.php';
$response = $router->dispatch($request);

$response->send();
