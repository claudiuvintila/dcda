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

/*
CREATE TABLE users(
id integer(20) NOT NULL,
username varchar(256) DEFAULT 'john.doe' NOT NULL,
password varchar(20) DEFAULT '' NOT NULL,
first_name varchar(20) DEFAULT 'John',
last_name varchar(20) DEFAULT 'Doe',
assigned_here integer(1) DEFAULT 0 NOT NULL
);

INSERT INTO users 
(id,username,password,assigned_here)
values (1,'mike','mikepass',1);
*/
