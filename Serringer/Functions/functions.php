<?php
/**
 * Created by PhpStorm.
 * User: ReginThybo
 * Date: 11-04-2016
 * Time: 18:30
 */

/**
 * Returns escaped text.
 *
 * @param $data
 *
 * @return string
 */
function escape($data)
{
    return htmlentities($data, ENT_QUOTES, 'UTF-8');
}

/**
 * Function to redirect to the right pages, or show the right error codes
 *
 * @param mixed $uri
 */
function redirectTo($uri = '/')
{
    if (is_numeric($uri)) {
        switch ($uri) {
            case 401:
                header('HTTP/1.0 401 Not found');
                include '';
                break;
            case 403:
                header('HTTP/1.0 403 Not found');
                include '';
                break;
            case 404:
                header('HTTP/1.0 404 Not found');
                include 'views/errors/404.php';
                break;
        }
    } else {
        header('location:' . $uri);
    }

    die();
}