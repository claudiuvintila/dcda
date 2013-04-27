<?php


namespace app\controllers;

use app\models\Users;
use app\models\Servers;
use lithium\storage\Session;
use lithium\template\View;
use lithium\util\String;
use lithium\security\Auth;
use lithium\security\Password;

class UsersController extends \lithium\action\Controller
{

    public function listUsers2()
    {
        $this->verifyUserLoggedIn();

        $this->willMigrateToServer(Session::read('username'), 45.73638444, 21.24562729);

        $user = array(
            'adminKey'    => 'adminadminadmin',
            'consumerKey' => '123451234512345',
            'username'    => 'claudiu',
            'password'    => 'secret',
            'firstName'   => 'Claudiu',
            'lastName'    => 'Vintila',
            'serverId'    => 1
        );

        //open connection
        $ch = curl_init();

        $url = 'http://dcda.lan/migrate-user';
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $user);

        //execute post
        $result = curl_exec($ch);
        $result = curl_getinfo($ch);

        //close connection
        curl_close($ch);

        echo($result);
        die(' var dumped $result');


        $this->_render['layout'] = 'blank';
        return array('users' => $result);
    }

    public function migrateUser()
    {
        $this->_render['layout'] = 'blank';
        $postData                = $this->request->data;

        if (! (isset($postData['adminKey']) && isset($postData['username'])) ) {

            $this->_render['layout'] = '401';

            return array();
        }

        // verify admin key
        $servers = Servers::find(
            'all',
            array(
                'conditions' => array('is_server' => 1),
                'limit'      => 10
            )
        );

        if ($servers->count() == 1) {
            $server = $servers->current();

            if ($server->admin_key == $postData['adminKey']) {

                $users = Users::find(
                    'all',
                    array(
                        'conditions' => array('username' => $postData['username']),
                        'limit'      => 10
                    )
                );

                $bits = String::random(8); // 64 bits
                $newConsumerKey = bin2hex($bits); // [0-9a-f]+

                if ($users->count() == 1) {
                    // update existing user
                    $user = $users->current();

                    $user->consumer_key = $newConsumerKey;
                    $success            = $user->save();
                } else {
                    // create new user
                    $user               = Users::create();
                    $user->first_name   = $postData['firstName'];
                    $user->last_name    = $postData['lastName'];
                    $user->username     = $postData['username'];
                    $user->consumer_key = $newConsumerKey;
                    $success            = $user->save();
                }

                $respone = array(
                    'consumerkey' => $user->consumer_key,
                    'ipv4'        => $server->ipv4,
                    'domainName'  => $server->domain_name
                );

                return array(
                    'data' => json_encode($respone)
                );
            }

            $this->_render['layout'] = '401';

            return array();
        }

        $this->_render['layout'] = '401';

        return array();
    }

    public function listUsers() {
        $this->verifyUserLoggedIn();
        $users = Users::find(
            'all',
            array(
                'conditions' => array(),
                'limit'      => 50
            )
        );

        return array('users' => $users, 'title' => 'Users');
    }

    public function addUsers() {
        $this->verifyUserLoggedIn();
        return array('title' => 'Add Users');
    }

    private function willMigrateToServer($user, $lat, $long) {
        echo '<pre>'; var_dump(array($lat, $long)); echo '</pre>'; die(' var dumped array($lat, $long)');


    }
    private function verifyUserLoggedIn() {
        if (!Auth::check('default')) {
            return $this->redirect('Sessions::add');
        }
    }
}