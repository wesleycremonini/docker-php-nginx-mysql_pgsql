<?php

require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

App\Database\DB::connect();

//create_users_table
Capsule::schema()->create('users', function ($table) {
  $table->increments('id');
  $table->string('name', 100);
  $table->timestamps();
});

//create_cars_table
Capsule::schema()->create('cars', function ($table) {
  $table->increments('id');
  $table->string('plate', 10);
  $table->bigInteger('user_id');
  $table->timestamps();
});