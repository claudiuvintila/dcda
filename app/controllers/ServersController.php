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
use app\models\Users;
use app\controllers\BaseController;
use lithium\storage\Session;

class ServersController extends BaseController {
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

    public function mapServers() {
        $this->verifyUserLoggedIn();
        $servers = Servers::find(
            'all',
            array(
                'conditions' => array()
            )
        );

        $this->verifyUserLoggedIn();
        $username = Session::read('username');

        // check if we need to redirect the user to another server


        $users = Users::find(
            'all',
            array(
                'conditions' => array('username' => $username),
                'limit'      => 10
            )
        );

        if (count($users) != 1) {
            Session::delete('username');
            Auth::clear('default');

            return $this->redirect('/logout');
        }
        $user = $users->current();

        if ($user->assigned_here != 1) {
            Session::delete('username');
            Auth::clear('default');

            return $this->redirect('/logout');
        }

        $redirect = $this->redirectToServerOrAction($user);

        if ($redirect) {
            return $redirect;
        }

        $servers = $this->getServers();

        $url = 'http://maps.googleapis.com/maps/api/staticmap?';
        $markers = '';

        foreach($servers as $server) {
            $color = 'blue';
            if ($server['is_server']) {
                $url .= 'center=' . $server['latitude'] . ',' . $server['longitude'];
                $color = 'green';
            }

            $markers .= '&' . 'markers=color:' . $color
                . '|label:' . $server['id']
                . '|' . $server['latitude'] . ',' . $server['longitude'];
        }

        $url .= '&size=900x700'
            . '&maptype=roadmap'
            . '&sensor=false'
            . $markers;

        return array(
            'data'   => array('mapUrl' => $url),
            'errors' => null
        );
    }

    public function updateServer() {
        $this->verifyUserLoggedIn();
        $postData = $this->request->data;

        if (isset($this->request->params['serverId'])) {
            $serverId = $this->request->params['serverId'];

            if (isset($postData['update_server'])) {
                $values = array(
                    'ipv4'        => $postData['ipv4'],
                    'domain_name' => $postData['domain_name'],
                    'admin_key'   => $postData['admin_key'],
                    'is_server'   => $postData['is_server'],
                    'latitude'    => $postData['latitude'],
                    'longitude'   => $postData['longitude'],
                );

                $success = Servers::update(
                    $values,
                    array('id' => $serverId)
                );
            } else {

                $servers = Servers::find(
                    'all',
                    array(
                        'conditions' => array('id' => $serverId),
                    )
                );

                return array('servers' => $servers, 'title' => 'Servers');
            }
        }

        return $this->redirect('Servers::index');
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

    /*
    public function deleteServer()
    {
        $this->verifyUserLoggedIn();
	
	$getData = $this->request->query;
        if (isset($getData['ipv4'])) {
            $ip = $getData['ipv4'];

            Servers::remove(array('ipv4' => $ip));
        }
	else{
	
		if (isset($getData['domain_name'])) {
		    $domainName = $getData['domain_name'];

		    Users::remove(array('domain_name' => $domainName));
           }	
	}

    return $this->redirect('Servers::index');
    }
    */
    public function deleteServer()
    {
        $this->verifyUserLoggedIn();

        $getData = $this->request->query;
        if (isset($getData['id'])) {
            $postId = $getData['id'];

            Servers::remove(array('id' => $postId));
        }
        return $this->redirect('Servers::index');
    }

}
