<?php

namespace App\Routing;

class Api
{
  public static function run(): void
  {

    Router::get('/', function () {
      echo 'Hello World';
    });

    Router::get('/post/([0-9]*)', function (Request $req, Response $res) {
      $res->toJSON([
        'post' =>  ['id' => $req->params[0]],
        'status' => 'ok'
      ]);
    });

  }
}
