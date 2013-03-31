<?php

namespace app\models;

class Servers extends \lithium\data\Model
{
    protected $_schema = array(
        'id'          => array('type' => 'integer', 'null' => true),
        'ipv4'        => array('type' => 'string', 'default' => null, 'null' => true),
        'domain_name' => array('type' => 'string', 'default' => null, 'null' => true),
        'admin_key'   => array('type' => 'string', 'default' => null, 'null' => true),
        'is_server'   => array('type' => 'integer', 'default' => 0, 'null' => false),
    );
}