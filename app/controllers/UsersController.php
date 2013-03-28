<?php


namespace app\controllers;

use app\models\UserDetails;
use lithium\core\Environment;

class UsersController extends \lithium\action\Controller {

    public function listUsers() {

        $user = UserDetails::create();
        $user->name = 'clau';
        $success = $user->save();

        return array('users' => array(
            1 => 'first',
            2 => 'second'
        ));
    }
}