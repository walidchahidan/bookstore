<?php

namespace Bookstore\Controllers;

class Home
{
        function __construct()
        {
           
        }

        function index(){
            $this->homepage(); 
        }

        function homepage(){
            include_once "views/welcome.php";
        }

        public static function  notfoundpage(){
            echo "404 Not found";
        }


}