<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Laura
 * Date: 24.04.2013
 * Time: 22:53
 * To change this template use File | Settings | File Templates.
 */
namespace app\models;

class Posts extends \lithium\data\Model
{
    protected $_schema = array(
        'id' => array('type' => 'integer', 'null' => true),
        'date' => array('type' => 'date', 'default' => null, 'null' => true),
        'title' => array('type' => 'string', 'default' => null, 'null' => true),
        'author' => array('type' => 'string', 'default' => null, 'null' => true),
        'content' => array('type' => 'string', 'default' => 0, 'null' => false),
        'img_path' => array('type' => 'string', 'default' => '', 'null' => true),
        'tag' => array('type' => 'string', 'default' => '', 'null' => true),
    );
}

/*
CREATE TABLE posts(
id integer(20),
date date,
title varchar(40),
author varchar(40),
content varchar(256) DEFAULT '' NOT NULL,
img_path varchar(256) default '' NOT NULL
);

*/
