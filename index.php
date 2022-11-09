<?php

use Bookstore\Models\Book;
use Bookstore\Models\Comment;
use Bookstore\Models\CommentReply;
use Bookstore\Models\Setting;
use Bookstore\Models\User;

    require "./vendor/autoload.php";
    // require "./views/admin/home.php";

    function execRequest()
    {
        User::createTable();
        Book::createTable();
        Comment::createTable();
        CommentReply::createTable();
        Setting::createTable();
    }

    // execRequest();
  