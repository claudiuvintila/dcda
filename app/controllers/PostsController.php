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
use lithium\security\Auth;
use app\controllers\BaseController;
use lithium\storage\Session;

class PostsController extends BaseController
{
    public function index()
    {
        $this->verifyUserLoggedIn();

        $posts = Posts::all(array('order' => array('date' => 'DESC')));
        return array('posts' => $posts, 'title' => 'Posts');
    }

    public function addPosts()
    {
        $path    = $_FILES['photo']['tmp_name'];
        $newPath = getcwd() . '/img/' . $_FILES['photo']['name'];
        $this->verifyUserLoggedIn();
        $postData = $this->request->data;

        if (copy($path, $newPath)) {
            unlink($path);
        }

        if (isset($postData['addPost'])) {
            $post           = Posts::create();
            $post->date     = date('Y-m-d');
            $post->title    = $postData['title'];
            $post->author   = $postData['author'];
            $post->content  = $postData['content'];
            $post->img_path = (!empty($_FILES['photo']['name']) ? '/img/' . $_FILES['photo']['name'] : "");
            $success        = $post->save();

            return $this->redirect('Posts::index');
        }

        return array('title' => 'Add Posts');
    }

    public function updatePost()
    {
        $this->verifyUserLoggedIn();;
        $postData = $this->request->data;

        $path    = $_FILES['photo']['tmp_name'];
        $newPath = getcwd() . '/img/' . $_FILES['photo']['name'];
        $this->verifyUserLoggedIn();
        $postData = $this->request->data;

        if (copy($path, $newPath)) {
            unlink($path);
        }

        if (isset($this->request->params['postId'])) {
            $postId = $this->request->params['postId'];

            if (isset($postData['update_post'])) {
                $values = array(
                    'title'    => $postData['title'],
                    'author'   => $postData['author'],
                    'content'  => $postData['content'],
                );

                if (!empty($_FILES['photo']['name'])) {
                    $values['img_path'] = '/img/' . $_FILES['photo']['name'];
                }

                $success = Posts::update(
                    $values,
                    array('id' => $postId)
                );
            } else {

                $posts = Posts::find(
                    'all',
                    array(
                        'conditions' => array('id' => $postId),
                    )
                );

                return array('post' => $posts, 'title' => 'Posts', 'img_path' => $posts->current()->img_path);
            }
        }

        return $this->redirect('Posts::index');
    }

    public function deletePost()
    {
        $this->verifyUserLoggedIn();

        $getData = $this->request->query;
        if (isset($getData['post_id'])) {
            $postId = $getData['post_id'];

            Posts::remove(array('id' => $postId));
        }
        return $this->redirect('Posts::index');
    }

    public function getJsonEvents()
    {
        $this->verifyUserLoggedIn();
        $username = Session::read('username');

        // check if we need to redirect the user to another server


        $users = Users::find(
            'all',
            array(
                'conditions' => array('username' => $username),
                'limit'      => 10
            )
        );

        if (count($users) != 1) {
            Session::delete('username');
            Auth::clear('default');

            return $this->redirect('/logout');
        }
        $user = $users->current();

        if ($user->assigned_here != 1) {
            Session::delete('username');
            Auth::clear('default');

            return $this->redirect('/logout');
        }

//        $_POST['latitude']  = 46.957761;
//        $_POST['longitude'] = 22.5;
//        $_POST['latitude']  = 45.73638444;
//        $_POST['longitude'] = 21.24562729;
        $redirect = $this->redirectToServerOrAction($user);

        if ($redirect) {
            return $redirect;
        }

        return array(
            'data'   => array('posts' => $this->getPosts()),
            'errors' => null
        );
    }

    private function verifyUserLoggedIn()
    {
        if (!Auth::check('default')) {
            return $this->redirect('Sessions::add');
        }
    }
}

?>