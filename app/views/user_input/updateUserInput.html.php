<?php
foreach($events as $event) :
    ?>
    <?=$this->form->create(null, array('action' => null)); ?>
    <?=$this->form->field('tags', array('name' => 'tags', 'value' => $event->tags)); ?>
    <?=$this->form->field('latitude', array('name' => 'latitude', 'value' => $event->latitude)); ?>
    <?=$this->form->field('longitude', array('name' => 'longitude', 'value' => $event->longitude)); ?>
    <?=$this->form->field('description', array('name' => 'description', 'value' => $event->description)); ?>

    <?=$this->form->submit('Update', array('class' => 'btn','name' => 'update_event')); ?>
    <?=$this->form->end(); ?>
<?php endforeach; ?>