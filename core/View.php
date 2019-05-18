<?php

namespace Core;

class View{

    /**
    * Render a view file
    * @parm string $view the view file
    */
    public static function render($view, $args = []){
        $file = "../App/Views/$view";

        extract($args, EXTR_SKIP);

        if(is_readable($file)){
            require $file;
        }else{
            // echo "$file not found";
            throw new \Exception("$file not found");
        }
    }

    /**
     * This will render template using twing
     */
    public static function renderTwig($template, $args = []){
        static $twig  = null;
        if($twig === null){
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__).'/app/views');
            $twig = new \Twig\Environment($loader);
        }

        echo $twig->render($template, $args); 
    }

}