<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Laura
 * Date: 24.04.2013
 * Time: 22:48
 * To change this template use File | Settings | File Templates.
 */

//var_dump($posts);
echo "<table>";
echo "<thead><tr><th>Date</th><th>Title</th><th>Author</th><th>Content</th><th>Edit</th><th>Delete</th></tr></thead>";
foreach ($posts as $post) {

    echo"<tr>";
        echo "<td>$post->date</td><td>$post->title</td><td>$post->author</td><td>$post->content</td><td><a href='/update-post?post_id="."$post->id' >Edit</a></td><td><a href='/delete-post?post_id="."$post->id'>Delete</a></td>";
    echo"</tr>";

}
echo "</table>";

echo "<a class='btn' href='http://dcda/posts/addPosts'>Add Post</a>";
?>
