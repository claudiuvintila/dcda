<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Laura
 * Date: 25.04.2013
 * Time: 00:22
 * To change this template use File | Settings | File Templates.
 */

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
?>
