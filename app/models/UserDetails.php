<?php

namespace app\models;

class UserDetails extends \lithium\data\Model {

    protected $_schema = array(
        'id'  => array('type' => 'id'), // required for Mongo
        'name' => array('type' => 'string', 'default' => 'Moe', 'null' => false),
        'username' => array('type' => 'string', 'default' => 'bar', 'null' => false),
        'age'  => array('type' => 'integer', 'default' => 0, 'null' => false)
    );

}