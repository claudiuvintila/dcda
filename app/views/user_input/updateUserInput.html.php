<?php
foreach($events as $event) :
    ?>
    <?=$this->form->create(null, array('action' => null)); ?>
    <?=$this->form->field('tags', array('name' => 'tags', 'value' => $event->tags)); ?>
    <?=$this->form->field('latitude', array('name' => 'latitude', 'value' => $event->latitude)); ?>
    <?=$this->form->field('longitude', array('name' => 'longitude', 'value' => $event->longitude)); ?>
    <?=$this->form->field('description', array('name' => 'description', 'value' => $event->description)); ?>
    <?=$this->form->field('author', array('name' => 'author', 'value' => $event->author)); ?>
    <?=$this->form->field('title', array('name' => 'title', 'value' => $event->title)); ?>
    <?=$this->form->field('content', array('name' => 'content', 'value' => $event->content)); ?>
    <?=$this->form->field('date', array('name' => 'date', 'value' => $event->date)); ?>
    <?=$this->form->field('img_path', array('name' => 'img_path', 'value' => $event->img_path)); ?>


    <?=$this->form->submit('Update', array('class' => 'btn','name' => 'update_event')); ?>
    <?=$this->form->end(); ?>
<?php endforeach; ?>