<?php

namespace App\Controllers;

use \Core\View;

class Home extends \Core\Controller{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        // echo "(before) ";
        //return false;
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
        // echo " (after)";
    }

    public function indexAction(){
        // echo "I am Home-Controllers index";
        // View::render("Home/index.php", [
        //     "name" => "Ravi",
        //     "number" => [3,5,17]
        // ]);

        /** Lets use twig */
        View::renderTwig("Home/index.html",[
            "name" => "Ravi",
            "number" => [3,5,17]
        ]);
    }

}