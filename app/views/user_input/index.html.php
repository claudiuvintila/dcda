<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Laura
 * Date: 25.04.2013
 * Time: 00:10
 * To change this template use File | Settings | File Templates.
 */
echo "<table>";
echo "<thead><tr><th>ID</th><th>UserID</th><th>Tags</th><th>Latitude</th><th>Longitude</th><th>Author</th><th>Title</th><th>Content</th><th>Date</th><th>Img path</th><th>Edit event</th><th>Delete</th><th>Allow/reject</th></tr></thead>";
foreach ($inputs as $event) {
    echo"<tr>";
    echo "<td>$event->id</td><td>$event->user_id</td>".
        "<td>$event->tag</td>".
        "<td>$event->latitude</td>".
        "<td>$event->longitude</td>".
        "<td>$event->author</td>".
        "<td>$event->title</td>".
        "<td>$event->content</td>".
        "<td>$event->date</td>".
        "<td>$event->img_path</td>".
        "<td><a href='/update-event/"."$event->id'>Edit</a></td>".
        "<td><a href='/delete-event?id="."$event->id'>Delete</a></td>".
        "<td><a href='/allow-post?id="."$event->id'>Allow post</a></td>";
    echo"</tr>";

}
echo "</table>";



echo "<a class='btn' href='/add-user-input/'>Add User Input</a>";
?>
