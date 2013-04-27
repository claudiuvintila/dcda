<?php

namespace app\models;

class Users extends \lithium\data\Model
{

    protected $_schema = array(
        'id'            => array('type' => 'integer', 'null' => false),
        'username'      => array('type' => 'string', 'default' => 'john.doe', 'null' => false),
        'password'      => array('type' => 'string', 'default' => '', 'null' => false),
        'first_name'    => array('type' => 'string', 'default' => 'John', 'null' => true),
        'last_name'     => array('type' => 'string', 'default' => 'Doe', 'null' => true),
        'assigned_here' => array('type' => 'integer', 'default' => 0, 'null' => false),
    );

}