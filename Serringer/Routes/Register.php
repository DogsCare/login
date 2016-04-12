<?php
/**
 * Created by PhpStorm.
 * User: ReginThybo
 * Date: 11-04-2016
 * Time: 18:42
 */

namespace Serringer\Routes;


use Serringer\contracts\RouteContract;
use Serringer\Functions\Validering;
use Serringer\Models\User;

/**
 * Class Register
 * Route for registering a user.
 *
 * @package Serringer\Routes
 */
class Register implements RouteContract
{
    public function index()
    {
        if (isset($_SESSION['auth'])) {
            // logged in, kick to frontpage
            return redirectTo('/');
        }

        switch (strtoupper($_SERVER['REQUEST_METHOD'])) {
            // routes after which Method recieved in the header
            // Either POST or GET
            case 'POST':
                // Get post data
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password_repeat = $_POST['password_repeat'];
                $firstname = $_POST['first_name'];
                $lastname = $_POST['last_name'];

                // Validation class
                $v = new Validering();

                // Validation
                $v->validate([
                    'username'        => [$username, 'required|alnumDash|max(20)|uniqueUsername'],
                    'email'           => [$email, 'required|email|uniqueEmail'],
                    'password'        => [$password, 'required|min(6)'],
                    'password_repeat' => [$password_repeat, 'required|matches(password)'],
                    'first_name'      => [$firstname, 'alpha'],
                    'last_name'       => [$lastname, 'alpha'],
                ]);

                // Validation check
                if ($v->passes()) {
                    // validated, create user.
                    $user = User::create([
                        'username'   => $username,
                        'email'      => $email,
                        'password'   => password_hash($password, PASSWORD_DEFAULT),
                        'first_name' => $firstname,
                        'last_name'  => $lastname,
                    ]);

                    return redirectTo('/');
                } else {
                    // Validation failed, show form again with errors
                    $errors = $v->errors();
                    $request = $_POST;

                }
            // fallthrough as there's errors
            case 'GET':
                // show form
                include 'views/auth/register.php';
                break;
        }
    }
}