<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Traits\JsonResponseTrait;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class UserController
{
  use JsonResponseTrait;

  private $service;

  public function __construct()
  {
    $this->service = new UserService();
  }

  public function index(Request $request, Response $response): Response
  {
    $serviceResponse = $this->service->index();

    return $this->success([
      $serviceResponse
    ], 200, $response);
  }

  public function store(Request $request, Response $response): Response
  {
    $serviceResponse = $this->service->store($request->getParsedBody());

    return $this->success([
      $serviceResponse
    ], 201, $response);
  }

  public function show(Request $request, Response $response, array $params): Response
  {
    $serviceResponse = $this->service->show($params['id']);

    return $this->success([
      $serviceResponse
    ], 200, $response);
  }

  public function update(Request $request, Response $response, array $params): Response
  {
    $serviceResponse = $this->service->update($request->getParsedBody(), $params['id']);

    return $this->success([
      $serviceResponse
    ], 200, $response);
  }

  public function destroy(Request $request, Response $response, array $params): Response
  {
    $this->service->destroy($params['id']);
    return $this->success([], 204, $response);
  }
}
