<?php


namespace app\controllers;

use lithium\security\Auth;
use lithium\storage\Session;
use app\controllers\BaseController;
use app\models\Users;

class SessionsController extends BaseController
{
    public function add()
    {
        $this->_render['layout'] = 'login';

        if ($this->request->data && Auth::check('default', $this->request)) {
            Session::write('username', $_POST['username']);

            $users = Users::find(
                'all',
                array(
                    'conditions' => array('username' => $_POST['username']),
                    'limit'      => 10
                )
            );

            if (count($users) != 1) {
                if (isset($_POST['latitude']) && isset($_POST['longitude'])) {
                    $this->_render['layout']   = 'json';
                    $this->_render['template'] = 'mobile';
                    $this->_render['type']     = 'json';

                    return array(
                        'data'   => null,
                        'errors' => 'User not found!'
                    );
                } else {
                    Session::delete('username');
                    Auth::clear('default');

                    return $this->redirect('/logout');
                }
            }
            $user = $users->current();

            if ($user->assigned_here != 1) {
                if (isset($_POST['latitude']) && isset($_POST['longitude'])) {
                    $this->_render['layout']   = 'json';
                    $this->_render['template'] = 'mobile';
                    $this->_render['type']     = 'json';

                    return array(
                        'data'   => null,
                        'errors' => 'User is not assigned here!'
                    );
                } else {
                    Session::delete('username');
                    Auth::clear('default');

                    return $this->redirect('/logout');
                }
            }

//            $_POST['latitude'] = 46.957761;
//            $_POST['longitude'] = 22.5;

//            $_POST['latitude']  = 45.73638444;
//            $_POST['longitude'] = 21.24562729;

            $response = $this->redirectToServerOrAction($user, true);

            if ($response)
                return $response;

            return $this->redirect('/users');
        }
        // Handle failed authentication attempts
    }

    public function delete()
    {
        Session::delete('username');
        Auth::clear('default');
        return $this->redirect('/login');
    }
}

