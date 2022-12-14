<?php

namespace App\Lib;

class ErrorHandler {
  public static function run(): void {
    $run = new \Whoops\Run;
    $handler = new \Whoops\Handler\PrettyPageHandler;
    
    $run->pushHandler($handler);
    
    $run->register();
  }
};
