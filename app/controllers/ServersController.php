<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Laura
 * Date: 25.04.2013
 * Time: 00:06
 * To change this template use File | Settings | File Templates.
 */
namespace app\controllers;

use app\models\Servers;

class ServersController extends \lithium\action\Controller {
    public function index() {
        $servers = Servers::find(
            'all',
            array(
                'conditions' => array(),
                'limit'      => 10
            )
        );
        return array('servers' => $servers, 'title' => 'Servers');
    }

    public function addServers() {
        return array('title' => 'Add Servers');
    }
}