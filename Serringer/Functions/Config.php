<?php
/**
 * Created by PhpStorm.
 * User: ReginThybo
 * Date: 11-04-2016
 * Time: 18:19
 */

namespace Serringer\Functions;


class Config
{
    public static function get($path = null)
    {
        if($path){
            $config = $GLOBALS['config'];
            $path = explode('.', $path);
            foreach ($path as $bit){
                if(isset($config[$bit])){
                    $config = $config[$bit];
                }
            }
            return $config;
        }
    }
}