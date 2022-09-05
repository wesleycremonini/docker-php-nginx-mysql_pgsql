<?php

namespace App\Lib;

use Monolog\ErrorHandler;
use Monolog\Handler\StreamHandler;

class Logger extends \Monolog\Logger
{
    private static $loggers = [];

    public function __construct(string $key = "app")
    {
        parent::__construct($key); // logger name

        $LOG_PATH = Config::get('LOG_PATH');
        
        $logFile = $LOG_PATH . "/{$key}.log";
        $logLevel = \Monolog\Level::Debug;

        $this->pushHandler(new StreamHandler($logFile, $logLevel));
    }

    public static function run(): void
    {
        $LOG_PATH = Config::get('LOG_PATH');

        // Error Log
        self::$loggers['error'] = new Logger('errors');
        self::$loggers['error']->pushHandler(new StreamHandler($LOG_PATH . "/errors.log"));
        ErrorHandler::register(self::$loggers['error']);

        // Request Log
        $data = [
            $_SERVER,
            $_REQUEST,
            trim(file_get_contents("php://input"))
        ];
        self::$loggers['request'] = new Logger('request');
        self::$loggers['request']->pushHandler(new StreamHandler($LOG_PATH .  "/request.log"));
        self::$loggers['request']->info("REQUEST", $data);
    }

    public static function get(string $key = "app"): Logger
    {
        if (empty(self::$loggers[$key])) {
            self::$loggers[$key] = new Logger($key);
        }

        return self::$loggers[$key];
    }
}
