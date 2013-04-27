<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Laura
 * Date: 25.04.2013
 * Time: 00:25
 * To change this template use File | Settings | File Templates.

 */
?>

<form action="<?php echo "/users"; ?>" method="POST">
    <label for="username">Username</label>
    <input name="username" id="username" type="text"/>
    <label for="password">Password</label>
    <input name="username" id="password" type="password"/>
    <label for="first_name">First Name</label>
    <input name="first_name" id="first_name" type="text"/>
    <label for="last_name">Last name</label>
    <input name="last_name" id="last_name" type="text"/><br />
    <input class="btn" type="submit" value="Add User" name="addUser"/>
</form>