<?php

namespace App\Http\Controllers;

use App\Services\CpfService;
use App\Traits\JsonResponseTrait;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class CpfController
{
  use JsonResponseTrait;

  private $service;

  public function __construct()
  {
    $this->service = new CpfService();
  }

  public function store(Request $request, Response $response): Response
  {
    $serviceResponse = $this->service->store($request->getParsedBody());

    return $this->success([
      'cpf' => $serviceResponse
    ], 201, $response);
  }

  public function show(Request $request, Response $response, array $params): Response
  {
    $serviceResponse = $this->service->show($params['id']);

    return $this->success([
      'cpf' => $serviceResponse
    ], 200, $response);
  }

  public function update(Request $request, Response $response, array $params): Response
  {
    $serviceResponse = $this->service->update($request->getParsedBody(), $params['id']);

    return $this->success([
      'cpf' => $serviceResponse
    ], 200, $response);
  }
}
