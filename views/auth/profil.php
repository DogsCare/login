<?php
/**
 * Created by PhpStorm.
 * User: ReginThybo
 * Date: 12-04-2016
 * Time: 23:55
 */
include_once "views/templates/header.php";
echo '<h1>'.$user->getFullNameOrUsername().'</h1>';
echo '<dl>';
    echo '<dt>Username</dt>';
    echo '<dd>'.$user->username.'</dd>';
    echo '<dt>Email</dt>';
    echo '<dd>'.$user->email.'</dd>';
echo '</dl>';
include_once "views/templates/footer.php";
