<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Laura
 * Date: 05.05.2013
 * Time: 16:21
 * To change this template use File | Settings | File Templates.
 */
foreach($users as $user) :
?>
    <?=$this->form->create(null, array('action' => null)); ?>
    <?=$this->form->field('username', array('name' => 'username', 'value' => $user->username)); ?>
    <?=$this->form->field('password', array('name' => 'password', 'value' => '')); ?>
    <?=$this->form->field('first_name', array('name' => 'first_name', 'value' => $user->first_name)); ?>
    <?=$this->form->field('last_name', array('name' => 'last_name', 'value' => $user->last_name)); ?>
    <?=$this->form->field('assigned_here', array('name' => 'assigned_here', 'value' => $user->assigned_here)); ?>

    <?=$this->form->submit('Update', array('class' => 'btn','name' => 'update_user')); ?>
    <?=$this->form->end(); ?>
<?php endforeach; ?>
