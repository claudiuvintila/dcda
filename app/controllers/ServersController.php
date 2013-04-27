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
use lithium\security\Auth;

class ServersController extends \lithium\action\Controller {
    public function index() {
        $this->verifyUserLoggedIn();
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
        $this->verifyUserLoggedIn();
        return array('title' => 'Add Servers');
    }

    private function verifyUserLoggedIn(){
        if (!Auth::check('default')) {
            return $this->redirect('Sessions::add');
        }
    }
}