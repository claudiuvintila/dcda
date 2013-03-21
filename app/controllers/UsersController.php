<?php


namespace app\controllers;


class UsersController extends \lithium\action\Controller {
    public function listUsers() {
        return array('users' => array(
            1 => 'first',
            2 => 'second'
        ));
    }
}