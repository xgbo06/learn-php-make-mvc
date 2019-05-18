<?php

namespace Core;

use PDO;
use App\Config;

abstract class Model
{

    /**
     * Get the PDO database connection
     *
     * @return mixed
     */
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
            // $host = 'localhost';
            // $dbname = 'mvc';
            // $username = 'root';
            // $password = '';
    
            try {
                $dbs = "mysql:host=".Config::DB_HOST.";dbname=".Config::DB_NAME.";charset=utf8";
                $db = new PDO( $dbs, Config::DB_USER, Config::DB_PASSWORD);

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return $db;
    }
}
