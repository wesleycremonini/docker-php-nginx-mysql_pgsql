<?php

use App\Http\Controllers\CpfController;
use App\Http\Controllers\UserController;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;

$router = AppFactory::create();
$router->addBodyParsingMiddleware();

//api
$router->group('/api', function (RouteCollectorProxy $group) {
  
  // users
  $group->group('/users', function (RouteCollectorProxy $group) {
    $group->get('', [UserController::class, 'index']);
    $group->post('', [UserController::class, 'store']);
    $group->put('/{id}', [UserController::class, 'update']);
    $group->get('/{id}', [UserController::class, 'show']);
    $group->delete('/{id}', [UserController::class, 'destroy']);

    // cpf
    $group->get('/{id}/cpf', [CpfController::class, 'show']);
    $group->post('/{id}/cpf', [CpfController::class, 'store']);
    $group->patch('/{id}/cpf', [CpfController::class, 'update']);
  });
});

$router->run();
