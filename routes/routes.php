<?php

use App\Http\Controllers\DetallesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Router;

/** @var $router Router */

$router->get('/', [HomeController::class, 'index']);

$router->group(['prefix' => 'api'], function (Router $router) {
    $router->post('/login', [UserController::class, 'login']);
    $router->get('/logout', [UserController::class, 'logout']);
    $router->get('/home', [HomeController::class, 'home']);
    $router->get('/articulo/{id}', [DetallesController::class, 'search']);
});

$router->any('{any}', function () {
    return '404';
})->where('any', '(.*)');
