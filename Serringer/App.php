<?php
/**
 * Created by PhpStorm.
 * User: ReginThybo
 * Date: 11-04-2016
 * Time: 19:12
 */

use Serringer\Models\User;

// Debugging code
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// PSR-4 autoloader via composer
require_once __DIR__ . "/../vendor/autoload.php";
// Configuration values for DB access
require_once __DIR__ . "/conf_values.php";
// Eloquent database setup for usage in non Laravel enviroment
require_once __DIR__ . "/Database.php";

// if logged in set $auth to the user model
if (isset($_SESSION['auth'])) {
    $auth = User::find($_SESSION['auth']['id']);
}

// Parse the Url to the controllers
$urlParser = new \Serringer\UrlParser($_SERVER['REQUEST_URI']);
// get the controller
$route = $urlParser->getController();
// instanciate the controller with the arguments
$route_controller = new $route($urlParser->getArgs());
// get the method on the controller called for, and then call the method.
$method = $urlParser->getMethod();
$route_controller->$method();
