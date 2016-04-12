<?php
/**
 * Created by PhpStorm.
 * User: ReginThybo
 * Date: 11-04-2016
 * Time: 18:42
 */

namespace Serringer\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'username',
        'email',
        'password',
        'first_name',
        'last_name',
    ];

    public function getFullNameOrUsername()
    {
        return $this->getFullName() ?: $this->username;
    }

    public function getFullName()
    {
        if (!$this->first_name || !$this->last_name) {
            return null;
        }

        return "{$this->first_name} {$this->last_name}";
    }
}