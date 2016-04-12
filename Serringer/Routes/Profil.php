<?php
/**
 * Created by PhpStorm.
 * User: ReginThybo
 * Date: 11-04-2016
 * Time: 18:42
 */

namespace Serringer\Routes;


use Serringer\contracts\RouteContract;
use Serringer\Models\User;

/**
 * Class Profil
 * Route for showing users profile
 * @package Serringer\Routes
 */
class Profil implements RouteContract
{

    public function index()
    {
        if(isset($_SESSION['auth'])){
            $user = User::find($_SESSION['auth']);    
        } else{
            return redirectTo('/');
        }
        
        include_once "views/auth/profil.php";
    }
}