<?php

namespace Bookstore\Controllers;

use Bookstore\Models\Book;

class Admin
{


    function __construct()
    {
        global $baseUrl;
        if (!isset($_SESSION["user"])) {
            header("location:$baseUrl/auth");
        }else{
        if ($_SESSION["user"]['role']!="Admin") {
        header("location:$baseUrl/home");
        }
        }
    }
    
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
        require "views/admin/books/addbook.php";
    }

 // display Edit book page
      public function editbookpage($id)
    {
        $book = new Book();
        $newbook = $book->getOneById($id);
       
        require "views/admin/books/editbook.php";
    }

    // handle the insertion of new book in the database
    public function createBook(){
        include_once "src/helpers/functions.php";
        global $baseUrl;
        
        // get elements from the form
        if (isset($_POST['add'])) {
            $user_id = $_SESSION['user']['id'];
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);
            $author = htmlspecialchars($_POST['author']);
            $editionDate = htmlspecialchars($_POST['date']);
            if (empty($_FILES['picture']['name'])) {
                $picture = "";
                }else{
                    $picture = uploadFile('picture', "uploads/images/");
            } 
            
            if (empty($_FILES['filePath']['name'])) {
                $filePath = "";
            }else{
                $filePath = uploadFile('filePath',"uploads/pdf/");
            }

            $book = new Book($title, $author, $editionDate,$description,$picture, $filePath,$user_id);
            if ($book->insert()) {
                $_SESSION['success'] = "Book Added Successfully";
                header("location:$baseUrl/admin/bookspage");
            }else{
                $_SESSION['error'] = "Book Insertion  error";
                header("location:$baseUrl/admin/addbookpage");
        }
        }

    } 
    
    
    
    
    // handle the update of new book in the database
    public function updateBook(){
        include_once "src/helpers/functions.php";
        global $baseUrl;
        
        // get elements from the form
        if (isset($_POST['edit'])) {
            $user_id = $_SESSION['user']['id'];
            $id = htmlspecialchars($_POST['id']);
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);
            $author = htmlspecialchars($_POST['author']);
            $editionDate = htmlspecialchars($_POST['date']);
            if (empty($_FILES['picture']['name'])) {
                $picture = htmlspecialchars($_POST['oldPicture']);
                }else{
                    $picture = uploadFile('picture', "uploads/images/");
            } 
            
            if (empty($_FILES['filePath']['name'])) {
                $filePath = htmlspecialchars($_POST['oldFilePath']);
            }else{
                $filePath = uploadFile('filePath',"uploads/pdf/");
            }

            $book = new Book($title, $author, $editionDate,$description,$picture, $filePath,$user_id);
            $book->setId($id);
            if ($book->update()) {
                $_SESSION['success'] = "Book Edited Successfully";
                header("location:$baseUrl/admin/bookspage");
            }else{
                $_SESSION['error'] = "Book Updating  error";
                header("location:$baseUrl/admin/editbookpage/$id");
        }
        }

    }


    function deleteBook($id){
        global $baseUrl;
        $book = new Book();
        if ($book->delete($id)) {
            $_SESSION['success'] = "Book Deleted Successfully";
            header("location:$baseUrl/admin/bookspage");
        }else{
            $_SESSION['error'] = "Book Deleting  error";
            header("location:$baseUrl/admin/bookspage");
        }
    }
}