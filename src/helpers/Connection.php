<?php
namespace Bookstore\helpers;


use PDO;
use PDOException;



class Connection
{
        public static function getConnection(){
            // require_once "config.php";
            global $host, $dbName, $userName,$password;
            try {
                return new PDO("mysql:host=$host;dbname=$dbName", $userName, $password);
            } catch (PDOException $exception) {
                die("Database connection error: ".$exception->getMessage());
            }
        }
}