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
        'latitude'    => array('type' => 'double', 'default' => 0.0, 'null' => true),
        'longitude'   => array('type' => 'double', 'default' => 0.0, 'null' => true),
    );
}

/*
CREATE TABLE servers(
id integer(20),
ipv4 varchar(256),
domain_name varchar(256),
admin_key varchar(256),
is_server integer(1) DEFAULT 0 NOT NULL,
latitude decimal(5,2) DEFAULT 0.0,
longitude decimal(5,2) DEFAULT 0.0
);
*/
