<?php

namespace Core;

class Error{

    /**
     * Convert all errors to exception by throwing an ErrorException
     * @param int $level level of error
     * @param string $message error message
     * @param string $file where error was raised
     * @param int $line line number in the file
     */
    public static function errorHandler($level, $message, $file, $line){

        if(error_reporting() !== 0){
            throw new \ErrorException($message, 0, $level, $file, $line);
        }

    }

    public static function exceptionHandler($exception){

        $code = $exception->getCode();
        if($code != 404){
            $code = 500;
        }
        http_response_code($code);

        if(\App\Config::SHOW_ERRORS){
            echo "<h2> Fatal Error !</h2>";
            echo "<p> Uncaught exception ".get_class($exception)." </p>";
            echo "<p> Message : ".$exception->getMessage()." </p>";
            echo "<p> Stack trace ".$exception->getTraceAsString()." </p>";
            echo "<p> Thrown in ".$exception->getFile()." on line number ".$exception->getLine()." </p>";
        }else{
            $log = dirname(__DIR__).'\\logs\\'.date('Y-m-d').'.txt';
            echo $log;
            ini_set('error_log',$log);


            $message = "<p> Uncaught exception ".get_class($exception)." </p>";
            $message .= "<p> Message : ".$exception->getMessage()." </p>";
            $message .= "<p> Stack trace ".$exception->getTraceAsString()." </p>";
            $message .= "<p> Thrown in ".$exception->getFile()." on line number ".$exception->getLine()." </p>";
            
            error_log($message);

            if($code == 404){
                echo "<h2>Page not found</h2>";
            }else{
                echo "<h2>An error occured</h2>";
            }

        }

    }

}