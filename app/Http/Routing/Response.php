<?php

namespace App\Http\Routing;

class Response
{
  private $status = 200;

  public function status(int $code): Response
  {
    $this->status = $code;
    return $this;
  }

  public function toJSON(array $data = []): void
  {
    http_response_code($this->status);
    header('Content-Type: application/json');
    echo json_encode($data);
  }
}
