<?php
/**
 * Created by PhpStorm.
 * User: ReginThybo
 * Date: 11-04-2016
 * Time: 20:57
 */

include 'views/templates/header.php';
?>
<form action="/register" method="post">
    <?php
        include 'views/auth/forms/register.php';
    ?>
    <input type="submit" value="Opret">
</form>

