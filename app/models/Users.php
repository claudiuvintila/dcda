<?php

namespace app\models;

class Users extends \lithium\data\Model
{

    protected $_schema = array(
        'id'          => array('type' => 'integer', 'null' => false),
        'username'    => array('type' => 'string', 'default' => 'john.doe', 'null' => false),
        'first_name'   => array('type' => 'string', 'default' => 'John', 'null' => true),
        'last_name'    => array('type' => 'string', 'default' => 'Doe', 'null' => true),
        'consumer_key' => array('type' => 'string', 'default' => '', 'null' => true),
    );

}