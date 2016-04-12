<?php
/**
 * Created by PhpStorm.
 * User: ReginThybo
 * Date: 11-04-2016
 * Time: 12:09
 */


use Serringer\Functions\Config;

$capsule = new Illuminate\Database\Capsule\Manager();

$capsule->addConnection([
    'driver'    => Config::get('db.driver'),
    'host'      => Config::get('db.host'),
    'database'  => Config::get('db.name'),
    'username'  => Config::get('db.user'),
    'password'  => Config::get('db.password'),
    'charset'   => Config::get('db.charset'),
    'collation' => Config::get('db.collation'),
    'prefix'    => Config::get('db.prefix'),
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();