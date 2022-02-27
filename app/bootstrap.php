<?php

require_once '../vendor/autoload.php';

$container = new \Illuminate\Container\Container;
$events = new \Illuminate\Events\Dispatcher($container);

# Eloquent
$capsule = new Illuminate\Database\Capsule\Manager();

$capsule->addConnection([
                            'driver'    => 'mysql',
                            'host'      => 'db',
                            'database'  => 'ls',
                            'username'  => 'root',
                            'password'  => 'root',
                            'charset'   => 'utf8',
                            'collation' => 'utf8_unicode_ci',
                            'prefix'    => '',
                        ]);

$capsule->setEventDispatcher($events);

$capsule->setAsGlobal();

$capsule->bootEloquent();
