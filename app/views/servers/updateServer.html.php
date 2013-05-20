<?php
foreach($servers as $server) :
    ?>
    <?=$this->form->create(null, array('action' => null)); ?>
    <?=$this->form->field('ipv4', array('name' => 'ipv4', 'value' => $server->ipv4)); ?>
    <?=$this->form->field('domain_name', array('name' => 'domain_name', 'value' => $server->domain_name)); ?>
    <?=$this->form->field('admin_key', array('name' => 'admin_key', 'value' => $server->admin_key)); ?>
    <?=$this->form->field('is_server', array('name' => 'is_server', 'value' => $server->is_server)); ?>
    <?=$this->form->field('latitude', array('name' => 'latitude', 'value' => $server->latitude)); ?>
    <?=$this->form->field('longitude', array('name' => 'longitude', 'value' => $server->longitude)); ?>

    <?=$this->form->submit('Update', array('class' => 'btn','name' => 'update_server')); ?>
    <?=$this->form->end(); ?>
<?php endforeach; ?>
