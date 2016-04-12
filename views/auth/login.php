<?php
/**
 * Created by PhpStorm.
 * User: ReginThybo
 * Date: 12-04-2016
 * Time: 22:44
 */
include_once "views/templates/header.php";
?>
    <form action="/Login" method="post">
        <div<?php echo (isset($errors) && $errors->has('identifier')) ? 'class="has-error' : ''; ?>>
            <label for="identifier">Brugernavn/Email</label>
            <input type="text" name="identifier" id="identifier"<?php
            echo (isset($request) && $request['identifier']) ? 'value="' . $request['identifier'] . '"' : '';
            ?>>
            <?php echo (isset($errors) && $errors->has('identifier')) ? "<span>" . $errors->first('identifier') . "</span>" : ''; ?>
        </div>
        <div<?php echo (isset($errors) && $errors->has('password')) ? 'class="has-error' : ''; ?>>
            <label for="password">Kodeord</label>
            <input type="text" name="password" id="password">
            <?php echo (isset($errors) && $errors->has('password')) ? "<span>" . $errors->first('password') . "</span>" : ''; ?>
        </div>
        <div>
            <input type="submit" value="Login"></div>
    </form>

<?php
include_once "views/templates/footer.php";
