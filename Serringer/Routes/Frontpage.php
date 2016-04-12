<?php
/**
 * Created by PhpStorm.
 * User: ReginThybo
 * Date: 11-04-2016
 * Time: 18:41
 */

namespace Serringer\Routes;


use Serringer\contracts\RouteContract;

class Frontpage implements RouteContract
{
    public function index()
    {
        include_once "views/Frontpage/frontpage.php";

    }
}