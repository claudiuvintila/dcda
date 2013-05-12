<?php


namespace app\controllers;

use lithium\security\Auth;
use lithium\storage\Session;
use app\models\Servers;
use app\models\Users;

class SessionsController extends \lithium\action\Controller {

    public function add() {
        $this->_render['layout'] = 'login';

        if ($this->request->data && Auth::check('default', $this->request)) {
            Session::write('username', $_POST['username']);

//            $_POST['latitude'] = 46.957761;
//            $_POST['longitude'] = 22.5;
            $_POST['latitude'] = 45.73638444;
            $_POST['longitude'] = 21.24562729;
            if (isset($_POST['latitude']) && isset($_POST['longitude'])) {
                $newServer = $this->willMigrateToServer($_POST['latitude'], $_POST['longitude']);

                if ($newServer) {
                    $this->_render['layout'] = 'json';
                    $this->_render['template'] = 'mobile';
                    $this->_render['type'] = 'json';

                    $newServerArray = array(
                        'id'          => $newServer->id,
                        'ipv4'        => $newServer->ipv4,
                        'domain_name' => $newServer->domain_name,
                        'latitude'    => $newServer->latitude,
                        'longitude'   => $newServer->longitude
                    );

                    $users = Users::find(
                        'all',
                        array(
                            'conditions' => array('username' => $_POST['username']),
                            'limit'      => 10
                        )
                    );

                    if (count($users) != 1) {
                        return $this->redirect('/logout');
                    }
                    $user = $users->current();

                    $migratingUser = array(
                        'username'  => $user->username,
                        'password'  => $user->password,
                        'firstName' => $user->first_name,
                        'lastName'  => $user->last_name,
                        'adminKey'  => $newServer->admin_key
                    );

                    //open connection
                    $ch = curl_init();

                    if ($newServer->ipv4) {
                        $host = $newServer->ipv4;
                    } else if ($newServer->domain_name) {
                        $host = $newServer->domain_name;
                    } else {
                        return $this->redirect('/logout');
                    }

                    $url = 'http://' . $host . '/migrate-user';
                    //set the url, number of POST vars, POST data
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $migratingUser);

                    //execute post
                    $result = curl_exec($ch);

                    //close connection
                    curl_close($ch);

                    $resultObj = json_decode($result);
echo '<pre>'; var_dump($resultObj); echo '</pre>'; die(' var dumped $this');

                    return array('new' => json_encode($newServerArray));
                }
            }

            return $this->redirect('/users');
        }
        // Handle failed authentication attempts
    }

    public function delete() {
        Session::delete('username');
        Auth::clear('default');
        return $this->redirect('/login');
    }


    private function willMigrateToServer($lat, $long) {
        $servers = Servers::find(
            'all',
            array()
        );

        $minDistance = 20000;
        $newServer = null;

        foreach ($servers as $server) {
            $distance = $this->distance($lat, $long, $server->latitude, $server->longitude);
            if ($distance < $minDistance) {
                $minDistance = $distance;
                $newServer = $server;
            }
        }

        if ($newServer->is_server) {
            // this server is the closest
            return null;
        } else {
            return $newServer;
        }

        return null;
    }

    private function distance($lat1, $lng1, $lat2, $lng2)
    {
        $pi80 = M_PI / 180;
        $lat1 *= $pi80;
        $lng1 *= $pi80;
        $lat2 *= $pi80;
        $lng2 *= $pi80;

        $r = 6372.797; // mean radius of Earth in km
        $dlat = $lat2 - $lat1;
        $dlng = $lng2 - $lng1;
        $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $km = $r * $c;

        return $km;
    }
}