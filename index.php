<?php

// use Bookstore\Controllers\Auth;
session_start();
use Bookstore\Controllers\Home;
use Bookstore\Models\Book;
use Bookstore\Models\Comment;
use Bookstore\Models\CommentReply;
use Bookstore\Models\Setting;
use Bookstore\Models\User;

    require "./vendor/autoload.php";
    // require "./views/admin/home.php";

    /**
     * function to create database tables
     *  To be execute once
     * @return void
     */
    function execRequest()
    {
        User::createTable();
        Book::createTable();
        Comment::createTable();
        CommentReply::createTable();
        Setting::createTable();
    }

    // execRequest();
  

    // Mini routeur pour la gestion des controlleurs
    if (isset($_GET['p'])) {
        $params = explode("/",$_GET['p']); 
        $controllerName = ucfirst($params[0]);
        // echo $controllerName;
        // recupération dynamique de la classe grâce à l'espace de nom
        try {
           
       
         $class = '\Bookstore\Controllers\\'.$controllerName ;
        //  creation d'un objet de la classe
         $controller = new $class();
            // appel d'une methode de la classe
            if (isset($params[1])) {
                try {
                    $methode =$params[1];
                    $controller->$methode();
                } catch (Error $e) {
                        echo $e->getMessage()."<br>";
                    Home::notfoundpage();
                }
               
            }else{
                
              $controller->index();
            }
            
        } catch (Error $e) {
            $home = new Home();
            $home->index();
        }
    }else{
        // dans le cas ou il n'y a pas de paramètre
        $home = new Home();
        $home->index();
    }
    