<?php

namespace App\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class DB
{
    public static function connect(): void
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'db',
            'database'  => 'db',
            'username'  => 'root',
            'password'  => 'pass',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        $capsule->setAsGlobal();
    }
}
