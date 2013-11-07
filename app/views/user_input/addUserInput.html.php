
    <?=$this->form->create(null, array('action' => null)); ?>
    <?=$this->form->field('tags', array('name' => 'tags', 'value' => '')); ?>
    <?=$this->form->field('latitude', array('name' => 'latitude', 'value' => '')); ?>
    <?=$this->form->field('longitude', array('name' => 'longitude', 'value' => '')); ?>
    <?=$this->form->field('description', array('name' => 'description', 'value' => '')); ?>

    <?=$this->form->submit('Add event', array('class' => 'btn','name' => 'add_event')); ?>
    <?=$this->form->end(); ?>
