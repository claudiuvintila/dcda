<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Laura
 * Date: 24.04.2013
 * Time: 23:35
 * To change this template use File | Settings | File Templates.
 */

?>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.file-input.js"></script>

<form action="<?php echo "/add-post"; ?>" method="POST" enctype="multipart/form-data">
    <label for="title">Title</label>
    <input name="title" type="text"/>
    <label for="author">Author</label>
    <input name="author" type="text"/>
    <label for="tag">Tag</label>
    <input name="tag" type="text"/>
    <label for="content">Content</label>
    <textarea name="content" type="text"> </textarea>
    <br/>
    <input type="file" name="photo" size=25 title="Select image">
    <br/><br/>
    <input class="btn" type="submit" value="Add Post" name="addPost"/>

</form>