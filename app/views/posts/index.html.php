
<style>
    img {
        max-width:300px;
        max-height:300px;
        vertical-align: middle;
    }
</style>

<?php

echo "<table>";
echo "<thead><tr><th>Date</th><th>Title</th><th>Author</th><th>Content</th><th>Image</th><th>Edit</th><th>Delete</th></tr></thead>";
foreach ($posts as $post) {

    echo"<tr>";
        echo "<td>$post->date</td>
              <td>$post->title</td>
              <td>$post->author</td>
              <td>$post->content</td>
              <td><img src=\"$post->img_path\" /></td>
              <td>$post->tag</td>
              <td><a href='/update-post/"."$post->id' >Edit</a></td>
              <td><a href='/delete-post?post_id="."$post->id'>Delete</a></td>";
    echo"</tr>";

}
echo "</table>";

echo "<a class='btn' href='/add-post'>Add Post</a>";
?>
