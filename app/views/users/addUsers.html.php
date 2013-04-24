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
    <label for="first_name">First Name</label>
    <input name="first_name" id="first_name" type="text"/>
    <label for="last_name">Last name</label>
    <input name="last_name" id="last_name" type="text"/>
    <label for="consumer_key">Consumer key</label>
    <input name="consumer_key" id="consumer_key" type="text"/>
    <input type="submit" value="Add User" name="addUser"/>
</form>