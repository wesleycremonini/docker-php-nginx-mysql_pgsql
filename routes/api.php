<?php

use App\Http\Controllers\UserController;
use Bramus\Router\Router;

header('Content-Type: application/json; charset=utf-8');

$router = new Router();

//api
$router->mount('/api', function () use ($router) {

  //users
  $router->mount('/users', function () use ($router) {
    $router->get('/', [new UserController, 'index']);
    $router->post('/', [new UserController, 'store']);
  });

});

$router->run();
