<?php

namespace Bookstore\helpers;

use PDO;
use PDOException;

class Connection
{
        public function getConnection(){
            try {
                return new PDO("mysql:host=localhost;dbname=bookstore_db", "root", "");
            } catch (PDOException $exception) {
                die("Database connection error: ".$exception->getMessage());
            }
        }
}