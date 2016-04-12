<?php
/**
 * Created by PhpStorm.
 * User: ReginThybo
 * Date: 11-04-2016
 * Time: 19:46
 */

namespace Serringer\Models;


use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'is_admin',
    ];

}