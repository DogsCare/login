<?php
/**
 * Created by PhpStorm.
 * User: ReginThybo
 * Date: 11-04-2016
 * Time: 18:41
 */

namespace Serringer\Routes;


use Serringer\contracts\RouteContract;

class Logout implements RouteContract
{

    public function index()
    {
        if (isset($_SESSION['auth'])) {
            unset($_SESSION['auth']);
        } else {
            return redirectTo('/');
        }

        return redirectTo('/');
    }
}