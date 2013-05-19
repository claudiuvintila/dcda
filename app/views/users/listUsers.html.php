<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Laura
 * Date: 25.04.2013
 * Time: 00:22
 * To change this template use File | Settings | File Templates.
 */

echo "<table>";
echo "<thead><tr><th>Username</th><th>First Name</th><th>Last Name</th><th>Assigned here</th><th>Update</th><th>Delete</th></tr></thead>";
foreach ($users as $user) {
    echo"<tr>";
    echo "<td>$user->username</td>"
        ."<td>$user->first_name</td>"
        ."<td>$user->last_name</td>"
        ."<td>$user->assigned_here</td>"
        ."<td><a href='/update-user/".$user->id."'>Update</a></td>"
        ."<td><a href='/delete-user?user_id=".$user->id."'>Delete</a></td>";
    echo"</tr>";

}
echo "</table>";

echo "<a class='btn' href='/add-user'>Add User</a>";
?>