<?php

namespace Bookstore\Controllers;

use Bookstore\Models\Book;

class Admin
{

    function index(){
        require "views/admin/home.php";
    }


    // Book management
    public function bookspage()
    {
        $book = new Book();
        $bookList = $book->getAll();
        require "views/admin/books/list.php";
    }

    // display Add book page
      public function addbookpage()
    {
        
    }

    // handle the insertion of new book in the database
    public function createBook(){

    }



}