<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Laura
 * Date: 24.04.2013
 * Time: 22:43
 * To change this template use File | Settings | File Templates.
 */
namespace app\controllers;

use app\models\Posts;
use app\models\Users;
use app\models\UserInput;
use lithium\security\Auth;
use app\controllers\BaseController;
use lithium\storage\Session;

class UserInputController extends BaseController
{
    public function index()
    {
        $this->verifyUserLoggedIn();

        $events = UserInput::all(array('order' => array('id' => 'ASC')));
        return array('inputs' => $events, 'title' => 'UserInput');
    }

    public function addTrafficJam() {
        $getData = $this->request->query;
        if (isset($getData['tag']) && isset($getData['latitude']) && isset($getData['longitude'])) {
           $this->insertUserData($getData);
        }
        return $this->redirect('UserInput::index');
    }

    public function addUserInput() {
        $this->verifyUserLoggedIn();
        $postData = $this->request->data;

        if(isset($postData['add_event']) || isset($postData['tag'])) {

//            var_dump($postData);
//            die('aici');
            $success = $this->insertUserData($postData);

            if($success == true) {
                return $this->redirect('UserInput::index');
            }
            else echo "Could not save user into database, please try again";
            die();
        }
//        echo "Could not save user into database, please try again";
        return array('title' => 'Add User Events');
    }

    public function allowPost() {
        $this->verifyUserLoggedIn();
        $postData = $this->request->query;

        if(isset($postData['id'])) {
            $postId = $postData['id'];

            $posts = UserInput::find(
                'all',
                array(
                    'conditions' => array('id' => $postId),
                )
            );

            foreach($posts as $post) {
                $allowedPost  = Posts::create();
                $allowedPost->date     = $post->date;
                $allowedPost->title    = $post->title;
                $allowedPost->author   = $post->author;
                $allowedPost->content  = $post->content;
                $allowedPost->tag  = $post->tag;
                $allowedPost->img_path = $post->img_path;
                $success        = $allowedPost->save();
//                var_dump($post);
//                var_dump($allowedPost);
//                die($success);
            }

            UserInput::remove(array('id' => $postId));
        }
        return $this->redirect('UserInput::index');
    }

    public function deleteUserInput() {
        $this->verifyUserLoggedIn();

        $getData = $this->request->query;
        if (isset($getData['id'])) {
            $eventId = $getData['id'];

            UserInput::remove(array('id' => $eventId));
        }
        return $this->redirect('UserInput::index');
    }

    private function insertUserData($userData) {
        var_dump($userData);
//        die();
        $event = UserInput::create();
        $event->tag = $userData['tag']!=''?$userData['tag']:'traffic-jam';
        $event->latitude = $userData['latitude'];
        $event->longitude = $userData['longitude'];
        $event->description = $userData['description']!=''?$userData['description']:' ';
        $event->title = $userData['title'];
        $event->author = $userData['author'];
        $event->content = $userData['content'];
        $event->date = $userData['date'];
        $event->img_path = $userData['img_path'];
        $success = $event->save();
//        die($success);
        return $success;
    }

    public function updateUserInput() {
        $this->verifyUserLoggedIn();
        $postData = $this->request->data;

        if (isset($this->request->params['eventId'])) {
            $eventId = $this->request->params['eventId'];

            if (isset($postData['update_user_input'])) {

                $values = array(
                    'tag'        => $postData['tag'],
                    'latitude'    => $postData['latitude'],
                    'longitude'   => $postData['longitude'],
                    'description'   => $postData['description'],
                    'title' => $postData['title'],
                    'author' => $postData['author'],
                    'content' => $postData['content'],
                    'date' => $postData['date'],
                    'img_path' => $postData['img_path']
                    );

                $success = UserInput::update(
                    $values,
                    array('id' => $eventId)
                );
            } else {

                $events = UserInput::find(
                    'all',
                    array(
                        'conditions' => array('id' => $eventId),
                    )
                );

                return array('events' => $events, 'title' => 'User Input');
            }
        }

        return $this->redirect('UserInput::index');
    }



    private function verifyUserLoggedIn()
    {
        if (!Auth::check('default')) {
            return $this->redirect('Sessions::add');
        }
    }

}

?>