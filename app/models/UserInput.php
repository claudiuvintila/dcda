<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Laura
 * Date: 07.11.2013
 * Time: 00:45
 * To change this template use File | Settings | File Templates.
 */
namespace app\models;

class UserInput extends \lithium\data\Model
{

    protected $_schema = array(
        'id'            => array('type' => 'integer', 'null' => false),
        'user_id'      => array('type' => 'integer','default' => 1, 'null' => false),
        'tag'      => array('type' => 'string', 'default' => 'traffic-jam', 'null' => true),
        'latitude'    => array('type' => 'double', 'null' => true),
        'longitude'     => array('type' => 'double', 'null' => true),
        'description' => array('type' => 'string', 'default' => '', 'null' => true),
        'title'=>array('type' => 'string', 'default' => '', 'null' => true),
        'content'=>array('type' => 'string', 'default' => '', 'null' => true),
        'author'=>array('type' => 'string', 'default' => '', 'null' => true),
        'date'=>array('type' => 'string', 'default' => '', 'null' => true),
        'img_path'=>array('type' => 'string', 'default' => '', 'null' => true),
    );

}