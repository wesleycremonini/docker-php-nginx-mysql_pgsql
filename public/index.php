<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Lib\Config;

// path to log file
$LOG_PATH = Config::get('LOG_PATH');
var_dump($LOG_PATH) && die();