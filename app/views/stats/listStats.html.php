<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Laura
 * Date: 25.04.2013
 * Time: 00:22
 * To change this template use File | Settings | File Templates.
 */
/*
echo "<table>";
echo "<thead><tr>
	<th>Time</th>	
	<th>MAU</th>
	<th>WAU</th>
	<th>DAU</th>
	</tr></thead>";

foreach ($stats as $stat) {
    echo"<tr>";
    $readableDate = date('m/d/Y, H::i', $stat->timestamp);
    echo "<td>$readableDate</td>"
        ."<td>$stat->mau</td>"
        ."<td>$stat->wau</td>"
        ."<td>$stat->dau</td>";
    echo"</tr>";
}

echo "</table>";
*/

foreach ($servers as $server) {
    //if(!$server->is_server)
    echo "<img src=\"img/mau_img.php?ip=".$server->ipv4."&isglobal=0"."\"><br>";
}

$link = mysqli_connect('localhost', 'root', 'awppassword','global_mau');
if (mysqli_connect_errno()) 
	die('Could not connect to localhost: ' . mysql_error());
$query = 'SELECT global_ip FROM global_mau_ip';
$result = mysqli_query($link,$query);
$globalip='';
while($row = mysqli_fetch_array($result)) {
	$globalip=$row['global_ip'];	
	break;
}
echo "<img src=\"img/mau_img.php?ip=".$globalip."&isglobal=1"."\"><br>";
?>
