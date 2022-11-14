<?php

namespace Bookstore\Controllers;

use Bookstore\Models\Book;

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

        function getcard(){
            $book = new Book();
            $bookList = $book->getAll();
            require "views/books.php";
        }
        function viewBook($id){
            $book = new Book();
            $singlebook = $book->getOneById($id);
            require "views/singlebook.php";
        }

        public static function  notfoundpage(){
            echo "404 Not found";
        }


}