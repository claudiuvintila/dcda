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

        if(isset($postData['add_event'])) {

            $success = $this->insertUserData($postData);

            if($success == true) {
                return $this->redirect('UserInput::index');
            }
            else echo "Could not save user into database, please try again";
        }

        return array('title' => 'Add User Events');
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
        $event = UserInput::create();
        $event->tags = $userData['tags']!=''?$userData['tags']:'traffic-jam';
        $event->latitude = $userData['latitude'];
        $event->longitude = $userData['longitude'];
        $event->description = $userData['description']!=''?$userData['description']:' ';
        $success = $event->save();

        return $success;
    }

    public function updateUserInput() {
        $this->verifyUserLoggedIn();
        $postData = $this->request->data;

        if (isset($this->request->params['eventId'])) {
            $eventId = $this->request->params['eventId'];

            if (isset($postData['update_user_input'])) {
                $values = array(
                    'tags'        => $postData['tags'],
                    'latitude'    => $postData['latitude'],
                    'longitude'   => $postData['longitude'],
                    'description'   => $postData['description'],
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