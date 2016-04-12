<?php
/**
 * Created by PhpStorm.
 * User: ReginThybo
 * Date: 11-04-2016
 * Time: 21:01
 */
?>

<div <?php echo (isset($errors) && $errors->has('username')) ? 'class="has-error"' : ''; ?>>
    <label for="username">Brugernavn</label>
    <input type="text" name="username" id="username"
            <?php
            if (isset($request['username'])) {
                echo 'value="' . $request['username'] . '"';
            }
            ?>
    >
    <?php echo (isset($errors) && $errors->has('username')) ? "<span>" . $errors->first('username') . "</span>" : ''; ?>
</div>
<div <?php echo (isset($errors) && $errors->has('email')) ? 'class="has-error"' : ''; ?>>
    <label for="email">Email</label>
    <input type="email" name="email" id="email"
            <?php
            if (isset($request['email'])) {
                echo 'value="' . $request['email'] . '"';
            }
            ?>
    >
    <?php echo (isset($errors) && $errors->has('email')) ? "<span>" . $errors->first('email') . "</span>" : ''; ?>
</div>
<div <?php echo (isset($errors) && $errors->has('password')) ? 'class="has-error"' : ''; ?>>
    <label for="password">Kodeord</label>
    <input type="password" name="password" id="password">
    <?php echo (isset($errors) && $errors->has('password')) ? "<span>" . $errors->first('password') . "</span>" : ''; ?>
</div>
<div <?php echo (isset($errors) && $errors->has('password_repeat')) ? 'class="has-error"' : ''; ?>>
    <label for="password_repeat">Kodeordet igen</label>
    <input type="password" name="password_repeat" id="password_repeat">
    <?php echo (isset($errors) && $errors->has('password_repeat')) ? "<span>" . $errors->first('password_repeat') . "</span>" : ''; ?>
</div>