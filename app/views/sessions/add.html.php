<?=$this->form->create(null); ?>
    <?=$this->form->field('username'); ?>
    <?=$this->form->field('password', array('type' => 'password')); ?>
    <?=$this->form->submit('Log in', array('class' => 'btn')); ?>
<?=$this->form->end(); ?>
