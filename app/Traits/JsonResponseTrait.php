<?php

namespace App\Traits;

use Slim\Psr7\Response;

trait JsonResponseTrait
{
  protected function success(array $data, int $statusCode, Response $response): Response
  {
    $payload = json_encode([
      "status" => "success",
      "data" => $data
    ]);

    $response->getBody()->write($payload);

    return $response
      ->withHeader('Content-Type', 'application/json')
      ->withStatus($statusCode);
  }

  protected function fail(array $data, int $statusCode, Response $response): Response
  {
    $payload = json_encode([
      "status" => "fail",
      "data" => $data
    ]);

    $response->getBody()->write($payload);

    return $response
      ->withHeader('Content-Type', 'application/json')
      ->withStatus($statusCode);
  }

  protected function error(array $data, int $statusCode, Response $response): Response
  {
    $payload = json_encode([
      "status" => "error",
      "data" => $data
    ]);

    $response->getBody()->write($payload);

    return $response
      ->withHeader('Content-Type', 'application/json')
      ->withStatus($statusCode);
  }
}
