<?php

namespace App\Lib;

use Exception;

class Config
{
  private static $config;

  public static function get(string $key): ?string
  {
    if (is_null(self::$config)) {
      self::$config = require_once(__DIR__ . '/../../config/config.php');
    }

    self::CheckIfKeyExists($key);

    return self::$config[$key];
  }

  private static function CheckIfKeyExists(string $key): void
  {
    if (!isset(self::$config[$key])) {
      throw new Exception('Config key does not exists.');
    }
  }
}
