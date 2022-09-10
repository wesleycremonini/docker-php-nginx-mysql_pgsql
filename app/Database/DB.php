<?php

namespace App\Database;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;

class DB
{
    public static function connect(): void
    {
        $capsule = new Capsule;
        
        $capsule->addConnection([
            'driver'    => 'pgsql',
            'host'      => 'db',
            'database'  => 'db',
            'username'  => 'root',
            'password'  => 'pass',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        
        // Set the event dispatcher used by Eloquent models... (optional)
        $capsule->setEventDispatcher(new Dispatcher(new Container));

        // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();

        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();
    }
}
