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
        echo "<h2> Fatal Error !</h2>";
        echo "<p> Uncaught exception ".get_class($exception)." </p>";
        echo "<p> Message : ".$exception->getMessage()." </p>";
        echo "<p> Stack trace ".$exception->getTraceAsString()." </p>";
        echo "<p> Thrown in ".$exception->getFile()." on line number ".$exception->getLine()." </p>";

    }

}