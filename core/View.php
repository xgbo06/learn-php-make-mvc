<?php

namespace Core;

class View{

    /**
    * Render a view file
    * @parm string $view the view file
    */
    public static function render($view){
        $file = "../App/Views/$view";
        if(is_readable($file)){
            require $file;
        }else{
            echo "$file not found";
        }
    }

}