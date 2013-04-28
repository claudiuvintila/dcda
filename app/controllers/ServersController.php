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
                'conditions' => array()
            )
        );
        return array('servers' => $servers, 'title' => 'Servers');
    }

    public function addServers() {
        $this->verifyUserLoggedIn();

        $postData = $this->request->data;

        if(isset($postData['addServer'])) {
            $server = Servers::create();
            $server->ipv4 = $postData['ipv4'];
            $server->domain_name = $postData['domain_name'];
            $server->admin_key = $postData['admin_key'];
            $server->is_server = $postData['is_server'];
            $server->latitude = $postData['latitude'];
            $server->longitude = $postData['longitude'];
            $success = $server->save();

            //var_dump($server);
            //var_dump($success);die();

            if($success == true) {
               return $this->redirect('Servers::index');
            }
            else echo "Could not save user into database, please try again";
        }

        return array('title' => 'Add Servers');
    }

    private function verifyUserLoggedIn(){
        if (!Auth::check('default')) {
            return $this->redirect('Sessions::add');
        }
    }
}