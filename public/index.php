<?php

require __DIR__ . '/../vendor/autoload.php';

App\Lib\ErrorHandler::run();
App\Lib\Logger::run();
App\Routing\Api::run();