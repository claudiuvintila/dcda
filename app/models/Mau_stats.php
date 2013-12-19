<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Laura
 * Date: 24.04.2013
 * Time: 22:53
 * To change this template use File | Settings | File Templates.
 */
namespace app\models;

class Mau_stats extends \lithium\data\Model
{
    protected $_schema = array(
	'id' => array('type' => 'integer', 'null' => true),
        'timestamp' => array('type' => 'integer', 'null' => false),
        'mau' => array('type' => 'integer', 'null' => false),
        'wau' => array('type' => 'integer', 'null' => false),
        'dau' => array('type' => 'integer', 'null' => false),
    );
}
