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

    public function listUsers3()
    {
        $user = array(
            'username'  => 'claudiu',
            'password'  => '12345',
            'latitude'  => 46.957761,
            'longitude' => 22.5
        );

        //open connection
        $ch = curl_init();

        $url = 'http://dcda.lan/login';
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $user);

        //execute post
        $result = curl_exec($ch);
        $result = curl_getinfo($ch);

        //close connection
        curl_close($ch);

        echo '<pre>';
        var_dump($result);
        echo '</pre>';
        die('var dumped $result from 3');
    }

    public function migrateUser()
    {
        $this->_render['layout'] = 'json';
        $this->_render['template'] = 'mobile';
        $this->_render['type'] = 'json';

        $postData                = $this->request->data;

        if (!(isset($postData['adminKey']) && isset($postData['username']))) {

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

                if ($users->count() == 1) {
                    // update existing user
                    $user = $users->current();
                } else {
                    // create new user
                    $user = Users::create();
                }

                $user->first_name    = $postData['firstName'];
                $user->last_name     = $postData['lastName'];
                $user->username      = $postData['username'];
                $user->password      = $postData['password'];
                $user->assigned_here = 1;

                $success = $user->save();

                if ($success) {
                    $response = array(
                        'ipv4'       => $server->ipv4,
                        'domainName' => $server->domain_name
                    );
                } else {
                    $response = array(
                        'error' => 'Migration failed!'
                    );
                }

                return array(
                    'data' => json_encode($response)
                );
            }

            $this->_render['layout'] = '401';

            return array();
        }

        $this->_render['layout'] = '401';

        return array();
    }


    public function listUsers()
    {
        $this->verifyUserLoggedIn();
        $users = Users::find(
            'all',
            array(
                'conditions' => array()
            )
        );

        return array('users' => $users, 'title' => 'Users');
    }

    public function addUsers()
    {
        $this->verifyUserLoggedIn();
        $postData = $this->request->data;
        if (isset($postData['addUser'])) {

            // create new user
            $user                = Users::create();
            $user->first_name    = $postData['first_name'];
            $user->last_name     = $postData['last_name'];
            $user->username      = $postData['username'];
            $user->password      = $postData['password'];
            $user->assigned_here = 1;
            $success             = $user->save();
            if ($success == true) {
                return $this->redirect('Users::listUsers');
            } else {
                echo "Could not save user into database, please try again";
            }
        }

        return array('title' => 'Add Users');
    }

    public function updateUser()
    {
        $this->verifyUserLoggedIn();

        $postData = $this->request->data;
        $getData  = $this->request->query;

        if (isset($getData['user_id'])) {
            $userId = $getData['user_id'];
            if (isset($postData['update_user'])) {
                $success = Users::update(
                //SET
                    array(
                        'username'   => $postData['username'],
                        'password'   => $postData['password'],
                        'first_name' => $postData['first_name'],
                        'last_name'  => $postData['last_name']
                    ),
                    //WHERE
                    array('id' => $userId)
                );
            } else {
                $users = Users::find(
                    'all',
                    array(
                        'conditions' => array('id' => $userId)
                    )
                );

                return array('users' => $users, 'title' => 'Users update');
            }
        }
        return $this->redirect('Users::listUsers');
    }

    public function deleteUser()
    {
        $this->verifyUserLoggedIn();

        $getData = $this->request->query;
        if (isset($getData['user_id'])) {
            $userId = $getData['user_id'];

            Users::remove(array('id' => $userId));
        }
        return $this->redirect('Users::listUsers');
    }

    private function verifyUserLoggedIn()
    {
        if (!Auth::check('default')) {
            return $this->redirect('Sessions::add');
        }
    }
}