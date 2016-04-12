<?php
/**
 * Created by PhpStorm.
 * User: ReginThybo
 * Date: 11-04-2016
 * Time: 21:14
 */

namespace Serringer\Functions;


use Serringer\Models\User;
use Violin\Violin;

class Validering extends Violin
{
    protected $user;
    protected $auth;

    public function __construct()
    {
        $this->user = new User();
        if (isset($_SESSION['auth'])) {
            $this->auth = $this->user->find($_SESSION['auth']->id);
        } else {
            $this->auth = null;
        }
        $this->addFieldMessages([
            'username'        => [
                'required' => 'Du skal udfylde dit brugernavn.',

            ],
            'email'           => [
                'required' => 'En email adresse er påkrævet.',
                'email'    => 'Du skal indtaste en gyldig email adresse.',

            ],
            'password'        => [
                'min' => 'Du skal angive et minimum af {$0} tegn, for et gyldigt kodeord.',
                'max' => 'Du skal maksimum angive {$0} tegn.',
            ],
            'password_repeat' => [
                'matches' => 'Gentag venligst kodeordet.',
            ],

        ]);

        /**
         * Her tilføjer vi vores egne fejlbeskeder til de enkelte funktioner
         */
        $this->addRuleMessages([
            'matchesCurrentPassword' => 'Passer ikke sammen med det nuværende kodeord.',
            'uniqueEmail'            => 'Den email adresse er allerede i brug.',
            'uniqueUsername'         => 'Det brugernavn er allerede i brug.',
            'min'                    => 'Et minimum af {$0} er påkrævet.',
            'max'                    => 'Et maximum af {$0} er påkrævet.',
            'required'               => 'Dette felt skal udfyldes.',
            'PasswordMatch'          => 'Kodeordet og brugeren passer ikke sammen,',
        ]);

    }

    /**
     * Validates if the email is in use already
     *
     * @param $value
     * @param $input
     * @param $args
     *
     * @return bool
     */
    public function validate_uniqueEmail($value, $input, $args)
    {
        $user = $this->user->where('email', $value);

        if ($this->auth && $this->auth->email === $value) {
            return true;
        }

        return !(bool)$user->count();
    }

    public function validate_uniqueUsername($value, $input, $args)
    {
        return !(bool)$this->user->where('username', $value)->count();
    }

    public function validate_PasswordMatch($value, $input, $args)
    {
        $user = $this->user->where(function ($query) use ($value,$input, $args) {
            return $query->where('email', $input[$args[0]])
                ->orWhere('username', $input[$args[0]]);
        })->first();
        if ($user && password_verify($value, $user->password)) {
            return true;
        } else {
            return false;
        }
    }
}