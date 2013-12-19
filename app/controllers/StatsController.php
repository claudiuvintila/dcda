<?php

namespace app\controllers;

use app\models\Mau_stats;
use app\models\Servers;
use lithium\storage\Session;
use lithium\template\View;
use lithium\security\Auth;
use lithium\security\Password;

class StatsController extends \lithium\action\Controller
{
    public function listStats()
    {
        $this->verifyUserLoggedIn();
        $stats = Mau_stats::find(
            'all',
            array(
                'conditions' => array()
            )
        );
	$servers = Servers::find(
            'all',
            array(
                'conditions' => array()
            )
        );

        return array('stats' => $stats, 'title' => 'Stats', 'servers'=> $servers);
    }

    private function verifyUserLoggedIn()
    {
        if (!Auth::check('default')) {
            return $this->redirect('Sessions::add');
        }
    }
}
