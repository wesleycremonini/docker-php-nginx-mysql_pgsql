<?php

namespace App\Lib;

class Config
{
  private static $config;

  public static function get(string $key): ?bool
  {
    self::$config = require_once(__DIR__ . '/../../config.php');
    var_dump(self::$config);
    return !empty(self::$config[$key]) ? self::$config[$key] : null;
  }
}
