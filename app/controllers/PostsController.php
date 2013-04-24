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

class PostsController extends \lithium\action\Controller {
    public function index() {
        $posts = Posts::find(
            'all',
            array(
                'conditions' => array(),
                'limit'      => 10
            )
        );
        return array('posts' => $posts, 'title' => 'Posts');
    }

    public function addPosts() {
        return array('title' => 'Add Posts');
    }
}

?>