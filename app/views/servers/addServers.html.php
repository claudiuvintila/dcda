<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Laura
 * Date: 25.04.2013
 * Time: 00:14
 * To change this template use File | Settings | File Templates.
 */
?>
<form action="<?php echo "/servers"; ?>" method="POST">
    <label for="title">IP v4</label>
    <input name="ipv4" type="text"/>
    <label for="author">Domain Name</label>
    <input name="domain_name" type="text"/>
    <label for="content">Admin key</label>
    <input name="admin_key" type="text"/>
    <label for="content">Is Server</label>
    <input name="is_server" type="text"/>
    <input type="submit" value="Add Server" name="addServer"/>
</form>