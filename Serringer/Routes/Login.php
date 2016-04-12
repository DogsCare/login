<?php
/**
 * Created by PhpStorm.
 * User: ReginThybo
 * Date: 11-04-2016
 * Time: 18:41
 */

namespace Serringer\Routes;


use Serringer\contracts\RouteContract;
use Serringer\Functions\Validering;
use Serringer\Models\User;

class Login implements RouteContract
{

    public function index()
    {
        if (isset($_SESSION['auth'])) {
            // Already logged in, kickback to frontpage
            return redirectTo('/');
        }

        // Not logged in, switch on Method
        // (POST you have tried to login, GET you want loginform)
        switch (strtoupper($_SERVER['REQUEST_METHOD'])) {
            case 'POST':
                $identifier = $_POST['identifier'];
                $password = $_POST['password'];

                $v = new Validering();
                $v->validate([
                    'identifier' => [$identifier, 'required'],
                    'password'   => [$password, 'required|PasswordMatch(identifier)'],
                ]);
                if ($v->passes()) {
                    $_SESSION['auth'] = User::where(function ($query) use ($identifier) {
                        return $query->where('email', $identifier)
                            ->orWhere('username', $identifier);
                    })->first()->id;

                    return redirectTo('/');
                } else {
                    $errors = $v->errors();
                    $request = $_POST;
                }
            // Fallthrough as validation failed and show form again
            case 'GET':
                include_once "views/auth/login.php";
        }
    }
}