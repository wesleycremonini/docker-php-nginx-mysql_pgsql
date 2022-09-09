<?php

namespace App\Http\Controllers;

use App\Traits\JsonResponseTrait;

class UserController
{
  use JsonResponseTrait;

  public function index()
  {
    return $this->success([
      'test' => 'test'
    ], 200);
  }

  public function store()
  {
    return $this->success([
      'test' => $_POST['test']
    ], 201);
  }
}
