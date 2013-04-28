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
use lithium\security\Auth;
use lithium\action\Request;
use lithium\storage\Session;

class PostsController extends \lithium\action\Controller {
    public function index() {
        $this->verifyUserLoggedIn();
        $posts = Posts::find(
            'all',
            array(
                'conditions' => array(),
            )
        );
        return array('posts' => $posts, 'title' => 'Posts');
    }

    public function addPosts() {
        //var_dump($this->request->data);
        $postData = $this->request->data;

        if(isset($postData['addPost'])){
            $post = Posts::create();
            $post->date = date('Y-m-d');
            $post->title = $postData['title'];
            $post->author = $postData['author'];
            $post->content = $postData['content'];
            $success = $post->save();

            return $this->redirect('Posts::index');
        }

        return array('title' => 'Add Posts');
    }

    public function getJsonEvents(){
        $this->verifyUserLoggedIn();
        $posts = Posts::find(
            'all',
            array(
                'conditions' => array(),
            )
        );
        $this->_render['layout'] = 'json';
        $json_posts = array();
        //echo "<pre>";
        foreach ($posts as $post){
            $j_post = array('date' => $post->date, 'title' => $post->title, 'author' => $post->author, 'content' => $post->content);
            $json_posts[]=$j_post;
        }
        return array('posts' => json_encode($json_posts), 'title' => 'Posts');
    }

    private function verifyUserLoggedIn(){
        if (!Auth::check('default')) {
            return $this->redirect('Sessions::add');
        }
    }
}

?>