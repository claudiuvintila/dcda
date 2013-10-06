<?php

namespace app\controllers;

use app\models\Servers;
use app\models\Posts;

class BaseController extends \lithium\action\Controller {

    protected function getPosts(){
        $posts                   = Posts::find(
            'all',
            array(
                'conditions' => array(),
            )
        );
        $this->_render['layout'] = 'json';
        $this->_render['type']   = 'json';

        $json_posts = array();

        foreach ($posts as $post) {
            $j_post       = array(
                'date'     => $post->date,
                'title'    => $post->title,
                'author'   => $post->author,
                'content'  => $post->content,
                'img_path' => $post->img_path
            );
            $json_posts[] = $j_post;
        }

        return $json_posts;
    }

    protected function getServers(){
        $servers                 = Servers::find(
            'all',
            array(
                'conditions' => array(),
            )
        );

        $this->_render['layout'] = 'json';
        $this->_render['type']   = 'json';

        $json_servers = array();

        foreach ($servers as $server) {
            $j_server      = array(
                'id'          => $server->id,
                'ipv4'        => $server->ipv4,
                'domain_name' => $server->domain_name,
                'is_server'   => $server->is_server,
                'latitude'    => $server->latitude,
                'longitude'   => $server->longitude
            );
            $json_servers[] = $j_server;
        }

        return $json_servers;
    }

    protected function redirectToServerOrAction($user, $returnPosts = false) {

        if (isset($_POST['latitude']) && isset($_POST['longitude'])) {
            $newServer = $this->willMigrateToServer($_POST['latitude'], $_POST['longitude']);

            if ($newServer) {
                $this->_render['layout']   = 'json';
                $this->_render['template'] = 'mobile';
                $this->_render['type']     = 'json';

                $newServerArray = array(
                    'id'          => $newServer->id,
                    'ipv4'        => $newServer->ipv4,
                    'domain_name' => $newServer->domain_name,
                    'latitude'    => $newServer->latitude,
                    'longitude'   => $newServer->longitude
                );

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
                } else {
                    if ($newServer->domain_name) {
                        $host = $newServer->domain_name;
                    } else {
                        return $this->redirect('/logout');
                    }
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

                if (isset($resultObj->data) && $resultObj->data) {
                    $user->assigned_here = 0;

                    $success = $user->save();

                    if (!$success) {
                        return array(
                            'data'   => null,
                            'errors' => 'Migration failed!'
                        );
                    }
                }

                return array(
                    'data'   => $newServerArray,
                    'errors' => null
                );
            } else {
                if ($returnPosts) {
                    return array(
                        'data'   => array('posts' => $this->getPosts()),
                        'errors' => null
                    );
                }
            }
        }

        return null;
    }

    private function willMigrateToServer($lat, $long)
    {
        $servers = Servers::find(
            'all',
            array()
        );

        $minDistance = 20000;
        $newServer   = null;

        foreach ($servers as $server) {
            $distance = $this->distance($lat, $long, $server->latitude, $server->longitude);
            if ($distance < $minDistance) {
                $minDistance = $distance;
                $newServer   = $server;
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

        $r    = 6372.797; // mean radius of Earth in km
        $dlat = $lat2 - $lat1;
        $dlng = $lng2 - $lng1;
        $a    = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
        $c    = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $km   = $r * $c;

        return $km;
    }
}