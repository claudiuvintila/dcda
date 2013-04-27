<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Laura
 * Date: 25.04.2013
 * Time: 00:10
 * To change this template use File | Settings | File Templates.
 */
echo "<table>";
echo "<thead><tr><th>IP V4</th><th>Domain Name</th><th>Admin key</th><th>Is_server</th><th>Latitude</th><th>Longitude</th></tr></thead>";
foreach ($servers as $server) {
    echo"<tr>";
    echo "<td>$server->ipv4</td><td>$server->domain_name</td>".
    "<td>$server->admin_key</td><td>$server->is_server</td>".
        "<td>$server->latitude</td><td>$server->longitude</td>";
    echo"</tr>";

}
echo "</table>";

echo "<a class='btn' href='/servers/addServers'>Add Server</a>";
?>