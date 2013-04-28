<?php


namespace app\controllers;

use lithium\security\Auth;
use lithium\storage\Session;

class SessionsController extends \lithium\action\Controller {

    public function add() {
        $this->_render['layout'] = 'login';
        if ($this->request->data && Auth::check('default', $this->request)) {
            Session::write('username', $_POST['username']);

            return $this->redirect('/users');
        }
        // Handle failed authentication attempts
    }

    public function delete() {
        Session::delete('username');
        Auth::clear('default');
        return $this->redirect('/login');
    }
}