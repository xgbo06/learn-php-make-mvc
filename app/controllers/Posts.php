<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Post;

class Posts extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        // echo 'Hello from the index action in the Posts controller!';
        // echo "<p>query string </p> <pre>".
        //       htmlspecialchars(print_r($_GET,true)). "</pre>";
        $posts = Post::getAll();
        View::renderTwig("posts/index.html",[
            "posts" => $posts
        ]);
    }

    /**
     * Show the add new page
     *
     * @return void
     */
    public function addNewAction()
    {
        echo 'Hello from the addNew action in the Posts controller!';
    }

    public function editAction()
    {
        echo 'Hello from the index action in the Posts controller!';
        echo "<p>query string </p> <pre>".
              htmlspecialchars(print_r($this->route_params,true)). "</pre>";
    }
}
