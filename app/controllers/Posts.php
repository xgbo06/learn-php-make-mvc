<?php

namespace App\Controllers;

class Posts
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function index()
    {
        echo 'Hello from the index action in the Posts controller!';
        echo "<p>query string </p> <pre>".
              htmlspecialchars(print_r($_GET,true)). "</pre>";
    }

    /**
     * Show the add new page
     *
     * @return void
     */
    public function addNew()
    {
        echo 'Hello from the addNew action in the Posts controller!';
    }
}
