<?php

namespace App\Traits;

trait JsonResponseTrait
{
  protected function success(array $data, int $statusCode)
  {
    http_response_code($statusCode);
    echo json_encode([
      "status" => "success",
      "data" => $data
    ]);
  }

  protected function fail(array $data, int $statusCode)
  {
    http_response_code($statusCode);
    echo json_encode([
      "status" => "fail",
      "data" => $data
    ]);
  }

  protected function error(array $data, int $statusCode)
  {
    http_response_code($statusCode);
    echo json_encode([
      "status" => "error",
      "data" => $data
    ]);
  }
}
