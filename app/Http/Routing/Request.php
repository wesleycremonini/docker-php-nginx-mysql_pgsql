<?php

namespace App\Http\Routing;

class Request
{
  public $params;
  public $reqMethod;
  public $contentType;

  public function __construct(array $params = [])
  {
    $this->params = $params;
    $this->reqMethod = trim($_SERVER['REQUEST_METHOD']);
    $this->contentType = !empty($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
  }

  public function getBody(): array
  {
    $body = [];

    if ($this->reqMethod == 'POST') {

      foreach ($_POST as $key => $value) {
        $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
      }
      
    }

    return $body;
  }

  public function getJSON(): array
  {
    if (
      $this->reqMethod != 'POST' ||
      strtolower($this->contentType) != 'application/json'
    ) return [];

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content);

    return $decoded;
  }
}
