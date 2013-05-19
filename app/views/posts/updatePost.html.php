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
    <?=$this->form->create(null, array('action' => null)); ?>
    <?=$this->form->field('title', array('name' => 'title', 'value' => $thePost->title)); ?>
    <?=$this->form->field('author', array('name' => 'author', 'value' => $thePost->author)); ?>
    <?=$this->form->label('content'); ?>
    <?=$this->form->textarea('content', array('name' => 'content', 'value' => $thePost->content));?>
    <br />
    <?=$this->form->submit('Update', array('class' => 'btn','name' => 'update_post')); ?>
    <?=$this->form->end(); ?>
<?php endforeach; ?>