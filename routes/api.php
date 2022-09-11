<?php

use App\Http\Controllers\UserController;
use Slim\Factory\AppFactory;

$router = AppFactory::create();

$router->get('/a', [UserController::class, 'index']);
$router->get('/a/{id}', [UserController::class, 'show']);
$router->post('/a/{id}', [UserController::class, 'store']);

$router->run();



// $router = new Router();

// //api
// $router->mount('/api', function () use ($router) {

//   //users
//   $router->mount('/users', function () use ($router) {
//     $router->get('/', [new UserController, 'index']);
//     $router->post('/', [new UserController, 'store']);
//   });

// });

// $router->run();
