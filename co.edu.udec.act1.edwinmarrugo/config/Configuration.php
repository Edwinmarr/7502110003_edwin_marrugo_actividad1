<?php

require '../vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;
 
$capsule = new Capsule;

$capsule->addConnection([
  'driver' => 'mysql',
  'host'   => 'localhost',
  'database' => 'act1_grades',
  'username' => 'root',
  'password' => '',
  'charset' => 'utf8',
  'collation' => 'utf8_bin',
  'prefix' => '',
]);

$capsule->bootEloquent();

