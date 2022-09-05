<?php

namespace App\Lib;

class Config
{
  private static $config;

  public static function get(string $key)
  {
    if (is_null(self::$config)) {
      self::$config = require_once(__DIR__ . '/../../config.php');
    }
    
    return !empty(self::$config[$key]) ? self::$config[$key] : null;
  }
}
