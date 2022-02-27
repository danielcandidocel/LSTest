<?php

use App\Http\Controllers\DetallesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TotalesController;
use Illuminate\Routing\Router;

/** @var $router Router */

$router->get('/', [HomeController::class, 'index']);

$router->group(['prefix' => 'api'], function (Router $router) {
    $router->get('/totales', [TotalesController::class, 'index']);
    $router->get('/articulo/{id}', [DetallesController::class, 'search']);
});

$router->any('{any}', function () {
    return '404';
})->where('any', '(.*)');