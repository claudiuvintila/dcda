<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.file-input.js"></script>

<style>
    img {
        max-width:300px;
        max-height:300px;
        vertical-align: middle;
    }
</style>

<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Laura
 * Date: 04.05.2013
 * Time: 17:15
 * To change this template use File | Settings | File Templates.
 */
foreach($post as $thePost) :
?>
    <?=$this->form->create(null, array('action' => null, 'enctype' => 'multipart/form-data')); ?>
    <?=$this->form->field('title', array('name' => 'title', 'value' => $thePost->title)); ?>
    <?=$this->form->field('author', array('name' => 'author', 'value' => $thePost->author)); ?>
    <?=$this->form->field('tag', array('name' => 'tag', 'value' => $thePost->tag)); ?>
    <?=$this->form->label('content'); ?>
    <?=$this->form->textarea('content', array('name' => 'content', 'value' => $thePost->content));?>
    <br/>
    <img src="<?=$img_path ?>" />
    <br/><br/>
    <input type="file" name="photo" size=25 title="Select image">
    <br/><br/>
    <?=$this->form->submit('Update', array('class' => 'btn','name' => 'update_post')); ?>
    <?=$this->form->end(); ?>
<?php endforeach; ?>