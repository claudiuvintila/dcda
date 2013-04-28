<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Laura
 * Date: 25.04.2013
 * Time: 00:14
 * To change this template use File | Settings | File Templates.
 */
?>
<form action="<?php echo "/add-server"; ?>" method="POST">
    <label for="ipv4">IPv4</label>
    <input name="ipv4" id="ipv4" type="text"/>
    <label for="domain_name">Domain Name</label>
    <input name="domain_name" id="domain_name" type="text"/>
    <label for="admin_key">Admin key</label>
    <input name="admin_key" id="admin_key" type="text"/>
    <label for="is_server">Is Server</label>
    <input name="is_server" id="is_server" type="text"/>
    <label for="latitude">Latitude</label>
    <input name="latitude" id="latitude" type="text"/>
    <label for="longitude">Longitude</label>
    <input name="longitude" id="longitude" type="text"/>
    <br/>
    <input class="btn" type="submit" value="Add Server" name="addServer"/>
</form>