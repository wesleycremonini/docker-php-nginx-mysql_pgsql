<?php

namespace App\Http\Routing;

class Router
{
  public static function get(string $route, callable $callback): void
  {
    if ($_SERVER['REQUEST_METHOD'] != 'GET') return;

    self::on($route, $callback);
  }

  public static function post(string $route, callable $callback): void
  {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') return;

    self::on($route, $callback);
  }

  public static function on(string $route, callable $callback): void
  {
    $uri = $_SERVER['REQUEST_URI'];
    $params = (stripos($uri, "/") !== 0) ? "/" . $uri : $uri;
    $regex = str_replace('/', '\/', $route);
    $is_match = preg_match('/^' . ($regex) . '$/', $params, $matches, PREG_OFFSET_CAPTURE);

    if ($is_match) {
      array_shift($matches); // first value is normally the route, lets remove it

      $params = array_map(function ($param) { // Get the matches as parameters
        return $param[0];
      }, $matches);

      $callback(new Request($params), new Response());
    }
  }
}
