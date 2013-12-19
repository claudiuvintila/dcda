
    <?=$this->form->create(null, array('action' => null)); ?>
    <?=$this->form->field('tag', array('name' => 'tag', 'value' => '')); ?>
    <?=$this->form->field('latitude', array('name' => 'latitude', 'value' => '')); ?>
    <?=$this->form->field('longitude', array('name' => 'longitude', 'value' => '')); ?>
    <?=$this->form->field('description', array('name' => 'description', 'value' => '')); ?>
    <?=$this->form->field('author', array('name' => 'author', 'value' => '')); ?>
    <?=$this->form->field('title', array('name' => 'title', 'value' => '')); ?>
    <?=$this->form->field('content', array('name' => 'content', 'value' => '')); ?>
    <?=$this->form->field('date', array('name' => 'date', 'value' => '')); ?>
    <?=$this->form->field('img_path', array('name' => 'img_path', 'value' => '')); ?>

    <?=$this->form->submit('Add event', array('class' => 'btn','name' => 'add_event')); ?>
    <?=$this->form->end(); ?>
