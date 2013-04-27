<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Laura
 * Date: 24.04.2013
 * Time: 23:35
 * To change this template use File | Settings | File Templates.
 */

?>

<form action="<?php echo "http://dcda/posts/"; ?>" method="POST">
    <label for="title">Title</label>
    <input name="title" type="text"/>
    <label for="author">Author</label>
    <input name="author" type="text"/>
    <label for="content">Content</label>
    <textarea name="content" type="text"> </textarea>
    <br/>
    <input class="btn" type="submit" value="Add Post" name="addPost"/>

</form>